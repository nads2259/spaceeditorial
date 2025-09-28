import { useParams } from 'react-router-dom';
import { Helmet } from 'react-helmet-async';
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
    const baseUrl = import.meta.env.VITE_SITE_BASE_URL ?? window.location.origin;
    const canonical = `${baseUrl}/category/${subcategory.categorySlug ?? categorySlug}/${subcategory.slug}`;
    return (
      <>
        <Helmet>
          <title>{`${subcategory.name} | Space Editorial`}</title>
          <meta
            name="description"
            content={
              subcategory.description
                ? `${subcategory.description}`
                : `Latest intelligence from the ${subcategory.name} desk.`
            }
          />
          <meta name="robots" content="index,follow" />
          <link rel="canonical" href={canonical} />
          <meta property="og:type" content="article" />
          <meta property="og:title" content={`${subcategory.name} | Space Editorial`} />
          {subcategory.description && <meta property="og:description" content={subcategory.description} />}
          <script type="application/ld+json">
            {JSON.stringify({
              '@context': 'https://schema.org',
              '@type': 'CollectionPage',
              name: `${subcategory.name} | Space Editorial`,
              url: canonical,
              description:
                subcategory.description ?? `Latest intelligence from the ${subcategory.name} desk.`,
            })}
          </script>
        </Helmet>
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
      </>
    );
  }

  const category = query.data;
  const baseUrl = import.meta.env.VITE_SITE_BASE_URL ?? window.location.origin;
  const canonical = `${baseUrl}/category/${category.slug}`;

  return (
    <>
      <Helmet>
        <title>{`${category.name} | Space Editorial`}</title>
        <meta
          name="description"
          content={
            category.description
              ? `${category.description}`
              : `Latest reporting and analysis from the ${category.name} desk.`
          }
        />
        <meta name="robots" content="index,follow" />
        <link rel="canonical" href={canonical} />
        <meta property="og:type" content="website" />
        <meta property="og:title" content={`${category.name} | Space Editorial`} />
        {category.description && <meta property="og:description" content={category.description} />}
        <script type="application/ld+json">
          {JSON.stringify({
            '@context': 'https://schema.org',
            '@type': 'CollectionPage',
            name: `${category.name} | Space Editorial`,
            url: canonical,
            description:
              category.description ?? `Latest reporting and analysis from the ${category.name} desk.`,
          })}
        </script>
      </Helmet>
      <div className="space-y-6 py-6">
        <CategorySection category={category} showSubcategories paginated perPage={12} showHeader={false} />
      </div>
    </>
  );
}

export default CategoryPage;
