import { Link } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import CategorySection from '../components/CategorySection';
import { fetchCategories } from '../services/api';
import { formatDate } from '../utils/dates';

function HomePage() {
  const { data: categories, isPending, isError } = useQuery({ queryKey: ['home-categories'], queryFn: fetchCategories });

  if (isPending) {
    return <div className="py-24 text-center text-slate-500">Loading categories…</div>;
  }

  if (isError || !categories) {
    return <div className="py-24 text-center text-red-500">Failed to load categories.</div>;
  }

  const allPosts = categories.flatMap((category) =>
    (category.posts ?? []).map((post) => ({
      ...post,
      categorySlug: category.slug,
      categoryName: category.name,
    }))
  );

  const highlightPost = [...allPosts].sort((a, b) => {
    const dateA = a.publishedAt ? new Date(a.publishedAt).getTime() : 0;
    const dateB = b.publishedAt ? new Date(b.publishedAt).getTime() : 0;
    return dateB - dateA;
  })[0];

  return (
    <div className="space-y-12">
      <section className="mt-10 overflow-hidden rounded-3xl bg-white/85 px-8 py-9 shadow-xl shadow-slate-900/5">
        <div className="grid gap-10 lg:grid-cols-[1.15fr_0.85fr]">
          <div className="flex flex-col justify-between gap-8">
            <div>
              <span className="inline-flex rounded-full bg-slate-900 px-4 py-1 text-xs font-semibold tracking-[0.4em] text-white/80">
                SPACE INSIGHTS
              </span>
              <h1 className="mt-6 text-4xl font-bold text-slate-900 sm:text-5xl">
                {highlightPost ? highlightPost.title : 'Space intelligence, decoded for strategic editorial coverage.'}
              </h1>
              {highlightPost?.excerpt ? (
                <p className="mt-4 max-w-xl text-base text-slate-600 line-clamp-3">{highlightPost.excerpt}</p>
              ) : (
                <p className="mt-4 max-w-xl text-base text-slate-600">
                  Orbit the latest coverage on launches, payloads, and deep-space missions with Space Editorial’s curated intelligence.
                </p>
              )}
            </div>
            <div className="flex flex-wrap items-center gap-3 text-sm text-slate-500">
              <span className="font-semibold text-slate-600">Trending:</span>
              {categories.slice(0, 5).map((category) => (
                <span key={category.slug} className="rounded-full border border-slate-200 bg-white px-3 py-1">
                  #{category.slug}
                </span>
              ))}
            </div>
          </div>
          {highlightPost && (
            <Link to={`/blog/${highlightPost.slug}`} className="card-sheen relative block overflow-hidden rounded-3xl">
              {highlightPost.image ? (
                <img src={highlightPost.image} alt={highlightPost.title} className="h-full w-full object-cover" />
              ) : (
                <div className="placeholder-panel flex h-full min-h-[320px] items-center justify-center text-5xl font-bold">
                  {highlightPost.categoryName?.charAt(0) ?? 'S'}
                </div>
              )}
              <div className="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/30 to-transparent" />
              <div className="absolute bottom-0 left-0 right-0 p-8 text-white">
                <p className="text-sm font-semibold uppercase tracking-[0.4em] text-white/70">
                  {highlightPost.categoryName ?? 'Featured'}
                </p>
                <h2 className="mt-3 text-2xl font-bold leading-tight">{highlightPost.title}</h2>
                {highlightPost.excerpt && <p className="mt-3 line-clamp-2 text-sm text-white/70">{highlightPost.excerpt}</p>}
                <div className="mt-4 flex items-center gap-4 text-xs font-medium text-white/70">
                  <span>{formatDate(highlightPost.publishedAt)}</span>
                  <span>{highlightPost.readingTime} min read</span>
                </div>
              </div>
            </Link>
          )}
        </div>
      </section>

      <div className="space-y-8">
        {categories.map((category) => (
          <CategorySection key={category.slug} category={category} />
        ))}
      </div>
    </div>
  );
}

export default HomePage;
