import { FormEvent, useState } from 'react';
import { Helmet } from 'react-helmet-async';
import { Link, useLocation, useParams } from 'react-router-dom';
import { useMutation, useQuery, useQueryClient } from '@tanstack/react-query';
import { fetchPost, fetchPostComments } from '../services/api';
import { submitPostComment } from '../services/frontendAuth';
import { formatDate } from '../utils/dates';
import { useAuth } from '../context/AuthContext';
import type { Post, PostComment } from '../types';

function BlogDetailPage() {
  const { slug } = useParams();
  const location = useLocation();
  const { user, token } = useAuth();
  const queryClient = useQueryClient();

  const { data: post, isPending, isError } = useQuery<Post>({
    queryKey: ['post', slug],
    queryFn: () => fetchPost(slug ?? ''),
    enabled: Boolean(slug),
  });

  const {
    data: comments = [],
    isPending: commentsLoading,
    isError: commentsError,
  } = useQuery<PostComment[]>({
    queryKey: ['post-comments', slug],
    queryFn: () => fetchPostComments(slug ?? ''),
    enabled: Boolean(slug),
  });

  const [commentBody, setCommentBody] = useState('');
  const [commentError, setCommentError] = useState<string | null>(null);
  const [successMessage, setSuccessMessage] = useState<string | null>(null);

  const commentMutation = useMutation<{ message: string; status?: string }, unknown, string>({
    mutationFn: async (body: string) => {
      if (!slug || !token) {
        throw new Error('You must be logged in to comment.');
      }

      return submitPostComment(slug, body, token);
    },
    onSuccess: async (result) => {
      setCommentBody('');
      setCommentError(null);
      const message = result?.message ?? 'Comment submitted.';
      setSuccessMessage(message);
      await queryClient.invalidateQueries({ queryKey: ['post-comments', slug] });
    },
    onError: (error) => {
      setSuccessMessage(null);
      if (error instanceof Error) {
        setCommentError(error.message);
      } else if (typeof error === 'object' && error && 'message' in error && typeof (error as { message: unknown }).message === 'string') {
        setCommentError((error as { message: string }).message);
      } else {
        setCommentError('Unable to post comment. Please try again.');
      }
    },
  });

  if (isPending) {
    return <div className="mx-auto max-w-3xl px-4 py-20 text-center text-slate-500">Loading article…</div>;
  }

  if (isError || !post) {
    return <div className="mx-auto max-w-3xl px-4 py-20 text-center text-red-500">Article not found.</div>;
  }

  const categoryName = post.category?.name ?? post.subcategory?.name ?? 'General';
  const sourceName = (post.meta?.source_name as string | undefined) ?? (post.meta?.source as string | undefined);
  const baseUrl = import.meta.env.VITE_SITE_BASE_URL ?? window.location.origin;
  const canonical = `${baseUrl}/blog/${post.slug}`;
  const description = post.excerpt ? post.excerpt.replace(/\s+/g, ' ').trim() : `${post.title} – ${categoryName}`;
  const jsonLd = {
    '@context': 'https://schema.org',
    '@type': 'Article',
    headline: post.title,
    description,
    author: post.meta?.author ? { '@type': 'Person', name: String(post.meta.author) } : undefined,
    publisher: {
      '@type': 'Organization',
      name: 'Space Editorial',
      logo: {
        '@type': 'ImageObject',
        url: `${baseUrl}/assets/logo.png`,
      },
    },
    mainEntityOfPage: canonical,
    datePublished: post.publishedAt ?? post.createdAt ?? undefined,
    dateModified: post.updatedAt ?? post.publishedAt ?? undefined,
    image: post.image ?? undefined,
  };

  const commentCountLabel = comments.length === 1 ? '1 Comment' : `${comments.length} Comments`;

  const handleCommentSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    if (!user || !token) {
      setCommentError('Please sign in to leave a comment.');
      return;
    }

    const trimmed = commentBody.trim();
    if (!trimmed) {
      setCommentError('Comment cannot be empty.');
      return;
    }

    setCommentError(null);
    setSuccessMessage(null);
    await commentMutation.mutateAsync(trimmed);
  };

  return (
    <article className="py-12">
      <Helmet>
        <title>{`${post.title} | Space Editorial`}</title>
        <meta name="description" content={description} />
        <link rel="canonical" href={canonical} />
        <meta property="og:type" content="article" />
        <meta property="og:title" content={post.title} />
        <meta property="og:description" content={description} />
        {post.image && <meta property="og:image" content={post.image} />}
        <meta name="twitter:card" content="summary_large_image" />
        <script type="application/ld+json">{JSON.stringify(jsonLd)}</script>
      </Helmet>
      <div className="overflow-hidden rounded-3xl bg-white shadow-sm">
        <div className="relative">
          {post.image ? (
            <img src={post.image} alt={post.title} className="h-[420px] w-full object-cover" />
          ) : (
            <div className="placeholder-panel flex h-[320px] items-center justify-center">
              <span className="sr-only">{categoryName}</span>
            </div>
          )}
          <div className="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/20 to-transparent" />
          <div className="absolute bottom-0 left-0 right-0 p-10 text-white">
            <p className="text-xs font-semibold uppercase tracking-[0.4em] text-white/70">{categoryName}</p>
            <h1 className="mt-4 text-4xl font-bold leading-tight sm:text-5xl">{post.title}</h1>
            <div className="mt-6 flex flex-wrap items-center gap-4 text-xs font-medium text-white/75">
              <span>{formatDate(post.publishedAt)}</span>
              {post.meta?.author && <span>By {String(post.meta.author)}</span>}
              {sourceName && <span>{sourceName}</span>}
              <span>{post.readingTime} min read</span>
            </div>
          </div>
        </div>
        {post.body && (
          <div className="post-gradient-backdrop prose prose-lg max-w-none px-8 py-12 sm:px-12" dangerouslySetInnerHTML={{ __html: post.body }} />
        )}
      </div>

      <section id="comments" className="mt-10 rounded-3xl bg-white px-8 py-10 shadow-sm sm:px-10">
        <div className="flex items-center justify-between gap-3">
          <h2 className="text-2xl font-semibold text-slate-900">Comments</h2>
          <span className="text-sm text-slate-500">{commentCountLabel}</span>
        </div>

        <div className="mt-6 space-y-4">
          {commentsLoading && <p className="text-sm text-slate-500">Loading comments…</p>}
          {commentsError && !commentsLoading && (
            <p className="text-sm text-red-500">Unable to load comments right now.</p>
          )}
          {!commentsLoading && !commentsError && comments.length === 0 && (
            <p className="rounded-2xl bg-slate-50 px-4 py-4 text-sm text-slate-500">Be the first to start the conversation.</p>
          )}
          {!commentsLoading && !commentsError &&
            comments.map((comment) => (
              <div key={comment.id} className="rounded-2xl border border-slate-100 bg-slate-50 px-5 py-4">
                <div className="flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-wide text-slate-500">
                  <span>{comment.author?.name ?? 'Reader'}</span>
                  {comment.createdAt && <span className="text-slate-400">•</span>}
                  {comment.createdAt && <span className="text-slate-400">{formatDate(comment.createdAt)}</span>}
                </div>
                <p className="mt-3 whitespace-pre-wrap text-sm text-slate-700">{comment.body}</p>
              </div>
            ))}
        </div>

        <div className="mt-10 border-t border-slate-200 pt-6">
          {user ? (
            <form onSubmit={handleCommentSubmit} className="space-y-4">
              <div>
                <label htmlFor="comment" className="block text-sm font-medium text-slate-700">
                  Join the discussion
                </label>
                <textarea
                  id="comment"
                  name="comment"
                  rows={4}
                  value={commentBody}
                  onChange={(event) => {
                    setCommentBody(event.target.value);
                    if (commentError) {
                      setCommentError(null);
                    }
                    if (successMessage) {
                      setSuccessMessage(null);
                    }
                  }}
                  placeholder="Share your thoughts about this mission…"
                  className="mt-2 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                  disabled={commentMutation.isPending}
                  maxLength={2000}
                />
              </div>
              {commentError && <p className="rounded-xl bg-rose-50 px-4 py-2 text-sm text-rose-600">{commentError}</p>}
              {successMessage && <p className="rounded-xl bg-emerald-50 px-4 py-2 text-sm text-emerald-700">{successMessage}</p>}
              <div className="flex items-center justify-between gap-3">
                <p className="text-xs text-slate-400">Comments appear once approved by our moderators.</p>
                <button
                  type="submit"
                  disabled={commentMutation.isPending}
                  className="inline-flex items-center justify-center rounded-full bg-brand-base px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-base/90 disabled:opacity-60"
                >
                  {commentMutation.isPending ? 'Posting…' : 'Post Comment'}
                </button>
              </div>
            </form>
          ) : (
            <div className="flex flex-col gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-5 text-sm text-slate-600 sm:flex-row sm:items-center sm:justify-between">
              <p className="font-semibold text-slate-700">Sign in to add your voice to the mission log.</p>
              <div className="flex gap-2">
                <Link
                  to="/signin"
                  state={{ from: `${location.pathname}#comments` }}
                  className="inline-flex items-center justify-center rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                  Login
                </Link>
                <Link
                  to="/register"
                  state={{ from: `${location.pathname}#comments` }}
                  className="inline-flex items-center justify-center rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800"
                >
                  Register
                </Link>
              </div>
            </div>
          )}
        </div>
      </section>
    </article>
  );
}

export default BlogDetailPage;
