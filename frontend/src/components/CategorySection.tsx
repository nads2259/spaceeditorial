import { Link } from 'react-router-dom';
import PostCard from './PostCard';
import type { Category, Subcategory } from '../types';

interface CategorySectionProps {
  category: Category;
  showSubcategories?: boolean;
}

function SubcategoryGrid({ subcategories }: { subcategories: Subcategory[] }) {
  if (!subcategories.length) return null;

  return (
    <div className="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
      {subcategories.map((subcategory) => (
        <div key={subcategory.slug} className="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
          <div className="mb-3 flex items-center justify-between">
            <h3 className="text-lg font-semibold text-slate-900">{subcategory.name}</h3>
            <Link
              to={`/category/${subcategory.categorySlug ?? ''}/${subcategory.slug}`}
              className="text-sm font-medium text-brand-base hover:underline"
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

function CategorySection({ category, showSubcategories = false }: CategorySectionProps) {
  return (
    <section className="py-8">
      <div className="rounded-3xl bg-white px-6 py-6 shadow-sm">
        <div className="flex items-center justify-between">
          <h2 className="text-xl font-bold text-slate-900">{category.name}</h2>
          <Link
            to={`/category/${category.slug}`}
            className="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 hover:border-brand-base hover:text-brand-base"
          >
            Discover stories →
          </Link>
        </div>
        <div className="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
          {(category.posts ?? []).map((post) => (
            <PostCard key={post.slug} post={post} />
          ))}
        </div>
        {showSubcategories && category.subcategories && (
          <div className="mt-8 border-t border-slate-200 pt-6">
            <SubcategoryGrid subcategories={category.subcategories} />
          </div>
        )}
      </div>
    </section>
  );
}

export default CategorySection;
