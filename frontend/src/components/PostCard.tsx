import { Link } from 'react-router-dom';
import { formatDate } from '../utils/dates';
import type { Post } from '../types';

interface PostCardProps {
  post: Post;
}

function PostCard({ post }: PostCardProps) {
  const categoryName = post.category?.name ?? post.subcategory?.name ?? 'General';
  const sourceName = (post.meta?.source_name as string | undefined) ?? (post.meta?.source as string | undefined);
  const fallbackInitial = categoryName.charAt(0).toUpperCase();
  const hasImage = Boolean(post.image);

  return (
    <Link
      to={`/blog/${post.slug}`}
      className="card-sheen group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-100/70 bg-white/95 shadow-lg shadow-slate-900/5 transition duration-300 hover:-translate-y-1"
    >
      <div className="relative h-56 overflow-hidden">
        {hasImage ? (
          <img src={post.image ?? ''} alt={post.title} className="h-full w-full object-cover" loading="lazy" />
        ) : (
          <div className="placeholder-panel flex h-full items-center justify-center text-4xl font-bold">
            {fallbackInitial}
          </div>
        )}
        <div className="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-900/60 via-slate-900/10 to-transparent" />
        <span className="absolute bottom-3 left-3 inline-flex items-center rounded-full bg-white/85 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-700">
          {categoryName}
        </span>
      </div>
      <div className="flex flex-1 flex-col gap-3 px-6 pb-6 pt-5">
        <h3 className="line-clamp-2 text-lg font-semibold text-slate-900">{post.title}</h3>
        {post.excerpt && <p className="line-clamp-2 text-sm text-slate-600">{post.excerpt}</p>}
        <div className="mt-auto flex items-center justify-between text-xs font-medium text-slate-500">
          <span>{formatDate(post.publishedAt)}</span>
          <div className="flex items-center gap-2">
            {sourceName && <span className="text-slate-400">{sourceName}</span>}
            <span>{post.readingTime} min read</span>
          </div>
        </div>
      </div>
    </Link>
  );
}

export default PostCard;
