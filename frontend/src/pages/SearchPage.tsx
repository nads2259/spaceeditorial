import { useEffect, useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import { useSearchParams } from 'react-router-dom';
import PostCard from '../components/PostCard';
import { searchPosts } from '../services/api';
import type { SearchResponse } from '../types';

function SearchPage() {
  const [searchParams, setSearchParams] = useSearchParams();
  const [page, setPage] = useState(Number(searchParams.get('page') ?? 1));
  const query = searchParams.get('q') ?? '';

  const { data, isPending } = useQuery<SearchResponse>({
    queryKey: ['search', query, page],
    queryFn: () => searchPosts(query, page),
    enabled: query.trim().length > 0,
  });

  useEffect(() => {
    setPage(Number(searchParams.get('page') ?? 1));
  }, [searchParams]);

  useEffect(() => {
    setSearchParams((params) => {
      if (page <= 1) {
        params.delete('page');
      } else {
        params.set('page', page.toString());
      }
      return params;
    });
  }, [page, setSearchParams]);

  if (!query.trim()) {
    return (
      <div className="py-20 text-center text-slate-500">
        Start typing to scan the Space Editorial knowledge base.
      </div>
    );
  }

  return (
    <div className="space-y-10 py-12">
      <section className="rounded-3xl border border-slate-100 bg-white p-8 shadow-sm">
        <h1 className="text-2xl font-semibold text-slate-900">Search results for “{query}”</h1>
        {isPending && <p className="mt-3 text-sm text-slate-500">Searching…</p>}
        {data && <p className="mt-3 text-sm text-slate-500">{data.search.total} articles</p>}
      </section>

      {data && (
        <>
          <div className="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            {data.data.map((post) => (
              <PostCard key={post.slug} post={post} />
            ))}
          </div>
          {data.meta.last_page > 1 && (
            <div className="flex items-center justify-center gap-3">
              <button
                type="button"
                disabled={page === 1}
                onClick={() => setPage((prev) => Math.max(prev - 1, 1))}
                className="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-600 shadow-sm disabled:opacity-40"
              >
                Previous
              </button>
              <span className="text-sm text-slate-500">Page {data.meta.current_page} of {data.meta.last_page}</span>
              <button
                type="button"
                disabled={page >= data.meta.last_page}
                onClick={() => setPage((prev) => Math.min(prev + 1, data.meta.last_page))}
                className="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-600 shadow-sm disabled:opacity-40"
              >
                Next
              </button>
            </div>
          )}
        </>
      )}
    </div>
  );
}

export default SearchPage;
