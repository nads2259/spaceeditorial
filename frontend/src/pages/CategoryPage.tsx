import { useParams } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import CategorySection from '../components/CategorySection';
import PostCard from '../components/PostCard';
import { fetchCategory, fetchSubcategory } from '../services/api';
import type { Category, Subcategory } from '../types';

function isSubcategory(entity: Category | Subcategory): entity is Subcategory {
  return (entity as Subcategory).categorySlug !== undefined;
}

function CategoryPage() {
  const { categorySlug, subcategorySlug } = useParams();

  const query = useQuery<Category | Subcategory>({
    queryKey: subcategorySlug ? ['subcategory', categorySlug, subcategorySlug] : ['category', categorySlug],
    queryFn: () =>
      subcategorySlug && categorySlug
        ? fetchSubcategory(categorySlug, subcategorySlug)
        : fetchCategory(categorySlug ?? ''),
    enabled: Boolean(categorySlug),
  });

  if (query.isPending) {
    return <div className="mx-auto max-w-7xl px-4 py-20 text-center text-slate-500">Loading…</div>;
  }

  if (query.isError || !query.data) {
    return <div className="mx-auto max-w-7xl px-4 py-20 text-center text-red-500">Category not found.</div>;
  }

  if (isSubcategory(query.data)) {
    const subcategory = query.data;
    return (
      <div className="space-y-10 py-10">
        <section>
          <h1 className="text-3xl font-bold text-slate-900 sm:text-4xl">{subcategory.name}</h1>
          {subcategory.description && <p className="mt-4 max-w-2xl text-base text-slate-600">{subcategory.description}</p>}
        </section>
        <div className="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
          {(subcategory.posts ?? []).map((post) => (
            <PostCard key={post.slug} post={post} />
          ))}
        </div>
      </div>
    );
  }

  const category = query.data;

  return (
    <div className="space-y-10 py-10">
      <section>
        <h1 className="text-3xl font-bold text-slate-900 sm:text-4xl">{category.name}</h1>
        {category.description && <p className="mt-4 max-w-2xl text-base text-slate-600">{category.description}</p>}
      </section>
      <CategorySection category={category} showSubcategories />
    </div>
  );
}

export default CategoryPage;
