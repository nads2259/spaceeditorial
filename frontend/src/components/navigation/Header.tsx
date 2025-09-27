import { useEffect, useMemo, useState, type ChangeEvent, type FormEvent } from 'react';
import { Link, NavLink, useNavigate, useSearchParams } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import clsx from 'clsx';
import { fetchCategories, fetchSettings } from '../../services/api';

function Header() {
  const navigate = useNavigate();
  const [searchParams] = useSearchParams();
  const [query, setQuery] = useState(searchParams.get('q') ?? '');

  const { data: settings } = useQuery({ queryKey: ['settings'], queryFn: fetchSettings });
  const { data: categories } = useQuery({ queryKey: ['nav-categories'], queryFn: fetchCategories });

  useEffect(() => {
    setQuery(searchParams.get('q') ?? '');
  }, [searchParams]);

  const theme = useMemo(
    () => ({
      backgroundColor: '#ffffff',
      accentColor: settings?.accentColor ?? '#ff6b35',
    }),
    [settings]
  );

  const handleSubmit = (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    if (!query.trim()) return;
    navigate(`/search?q=${encodeURIComponent(query.trim())}`);
  };

  const handleMobileSelect = (event: ChangeEvent<HTMLSelectElement>) => {
    if (event.target.value) {
      navigate(event.target.value);
      event.target.value = '';
    }
  };

  return (
    <header className="sticky top-0 z-50 border-b border-slate-200 bg-white/95 shadow-sm shadow-slate-200/70">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="flex flex-wrap items-center justify-between gap-6 py-4">
          <div className="flex items-center gap-6">
            <Link to="/" className="text-2xl font-bold tracking-tight" style={{ color: theme.accentColor }}>
              {settings?.logoText ?? 'Space Editorial'}
            </Link>
            <nav className="hidden lg:flex items-center gap-4">
              {categories?.map((category) => (
                <div key={category.slug} className="group relative">
                  <NavLink
                    to={`/category/${category.slug}`}
                    className={({ isActive }) =>
                      clsx('px-3 py-2 text-sm font-medium rounded-full transition-colors', {
                        'text-white shadow-sm': isActive,
                        'text-slate-600 hover:text-brand-base': !isActive,
                      })
                    }
                    style={({ isActive }) => ({ backgroundColor: isActive ? theme.accentColor : 'transparent' })}
                  >
                    {category.name}
                  </NavLink>
                  {category.subcategories?.length > 0 && (
                    <div className="absolute left-0 mt-2 hidden min-w-[220px] rounded-xl bg-white shadow-lg ring-1 ring-slate-200 group-hover:block">
                      <ul className="py-2">
                        {category.subcategories.map((subcategory) => (
                          <li key={subcategory.slug}>
                            <Link
                              to={`/category/${category.slug}/${subcategory.slug}`}
                              className="block px-4 py-2 text-sm text-slate-600 hover:bg-brand-light hover:text-brand-base"
                            >
                              {subcategory.name}
                            </Link>
                          </li>
                        ))}
                      </ul>
                    </div>
                  )}
                </div>
              ))}
            </nav>
          </div>
          <form onSubmit={handleSubmit} className="flex w-full max-w-md items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 shadow-sm">
            <input
              className="flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400"
              type="search"
              placeholder="Search articles"
              value={query}
              onChange={(event) => setQuery(event.target.value)}
            />
            <button type="submit" className="text-sm font-semibold text-brand-base">
              Search
            </button>
          </form>
          <div className="w-full lg:hidden">
            <select
              onChange={handleMobileSelect}
              className="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-600"
              defaultValue=""
            >
              <option value="" disabled>
                Browse categories
              </option>
              {categories?.map((category) => (
                <optgroup key={category.slug} label={category.name}>
                  <option value={`/category/${category.slug}`}>All {category.name}</option>
                  {category.subcategories?.map((subcategory) => (
                    <option key={subcategory.slug} value={`/category/${category.slug}/${subcategory.slug}`}>
                      {subcategory.name}
                    </option>
                  ))}
                </optgroup>
              ))}
            </select>
          </div>
        </div>
      </div>
    </header>
  );
}

export default Header;
