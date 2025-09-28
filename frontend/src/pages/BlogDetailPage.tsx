import { Helmet } from 'react-helmet-async';
import { useParams } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import { fetchPost } from '../services/api';
import { formatDate } from '../utils/dates';
import type { Post } from '../types';

function BlogDetailPage() {
  const { slug } = useParams();

  const { data: post, isPending, isError } = useQuery<Post>({
    queryKey: ['post', slug],
    queryFn: () => fetchPost(slug ?? ''),
    enabled: Boolean(slug),
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
        {/*
        {post.originalUrl && !post.meta?.fetched_from_original && (
          <div className="border-t border-slate-200 px-8 pb-8 pt-4 sm:px-12">
            <a
              href={post.originalUrl}
              target="_blank"
              rel="noreferrer"
              className="inline-flex items-center gap-2 text-sm font-semibold text-brand-base hover:underline"
            >
              View original source
            </a>
          </div>
        )}
        */}
      </div>
    </article>
  );
}

export default BlogDetailPage;
