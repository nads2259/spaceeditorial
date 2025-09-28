import { useEffect, useMemo, useState } from 'react';
import { Link } from 'react-router-dom';
import PostCard from './PostCard';
import type { Category, Post, Subcategory } from '../types';

interface CategorySectionProps {
  category: Category;
  showSubcategories?: boolean;
  showHeader?: boolean;
  paginated?: boolean;
  perPage?: number;
}

const sortPosts = (posts: Post[] = []): Post[] =>
  [...posts].sort((a, b) => {
    const dateA = a.publishedAt ? new Date(a.publishedAt).getTime() : 0;
    const dateB = b.publishedAt ? new Date(b.publishedAt).getTime() : 0;
    return dateB - dateA;
  });

function SubcategoryGrid({ subcategories }: { subcategories: Subcategory[] }) {
  if (!subcategories.length) return null;

  const normalised = useMemo(
    () =>
      subcategories.map((subcategory) => ({
        ...subcategory,
        posts: sortPosts(subcategory.posts ?? []),
      })),
    [subcategories]
  );

  return (
    <div className="subcategory-grid mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
      {normalised.map((subcategory) => (
        <div key={subcategory.slug} className="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
          <div className="mb-3 flex items-center justify-between">
            <h3 className="text-lg font-semibold text-slate-900">{subcategory.name}</h3>
            <Link
              to={`/category/${subcategory.categorySlug ?? ''}/${subcategory.slug}`}
              className="text-sm font-medium text-brand-base hover:text-brand-base/80"
            >
              View all
            </Link>
          </div>
          <div className="grid gap-4">
            {(subcategory.posts ?? []).map((post) => (
              <PostCard key={post.slug} post={post} />
            ))}
          </div>
        </div>
      ))}
    </div>
  );
}

function CategorySection({
  category,
  showSubcategories = false,
  showHeader = true,
  paginated = false,
  perPage = 8,
}: CategorySectionProps) {
  const sortedPosts = useMemo(() => sortPosts(category.posts ?? []), [category.posts]);
  const [page, setPage] = useState(1);

  useEffect(() => {
    setPage(1);
  }, [category.slug]);

  const totalPages = paginated ? Math.max(1, Math.ceil(sortedPosts.length / perPage)) : 1;
  const visiblePosts = useMemo(() => {
    if (!paginated) {
      return sortedPosts;
    }
    const start = (page - 1) * perPage;
    return sortedPosts.slice(start, start + perPage);
  }, [paginated, sortedPosts, page, perPage]);

  if (!visiblePosts.length && !showSubcategories) {
    return null;
  }

  return (
    <section className="py-8">
      <div className="rounded-3xl bg-white px-6 py-6 shadow-sm">
        {showHeader ? (
          <Link
            to={`/category/${category.slug}`}
            className="group block rounded-2xl border border-slate-100 bg-gradient-to-r from-brand-base/10 to-white px-6 py-5 shadow-sm transition hover:border-brand-base/60 hover:shadow-lg"
          >
            <div className="flex items-center justify-between gap-4">
              <div>
                <h2 className="text-xl font-semibold text-slate-900 group-hover:text-brand-base">{category.name}</h2>
                {category.description && (
                  <p className="mt-1 text-sm text-slate-500 line-clamp-2">{category.description}</p>
                )}
              </div>
              <span className="inline-flex shrink-0 items-center rounded-full bg-brand-base px-3 py-1 text-xs font-semibold uppercase tracking-wide text-white/90 group-hover:bg-brand-base/90">
                Browse →
              </span>
            </div>
          </Link>
        ) : null}

        <div className={`category-grid mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4 ${showHeader ? '' : 'pt-2'}`}>
          {visiblePosts.map((post) => (
            <PostCard key={post.slug} post={post} />
          ))}
        </div>

        {paginated && totalPages > 1 && (
          <div className="mt-6 flex items-center justify-between">
            <button
              type="button"
              onClick={() => setPage((prev) => Math.max(prev - 1, 1))}
              disabled={page === 1}
              className="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 disabled:opacity-40"
            >
              Previous
            </button>
            <span className="text-sm text-slate-500">
              Page {page} of {totalPages}
            </span>
            <button
              type="button"
              onClick={() => setPage((prev) => Math.min(prev + 1, totalPages))}
              disabled={page >= totalPages}
              className="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 disabled:opacity-40"
            >
              Next
            </button>
          </div>
        )}

        {showSubcategories && category.subcategories && category.subcategories.length > 0 && (
          <div className="mt-8 border-t border-slate-200 pt-6">
            <SubcategoryGrid subcategories={category.subcategories} />
          </div>
        )}
      </div>
    </section>
  );
}

export default CategorySection;
