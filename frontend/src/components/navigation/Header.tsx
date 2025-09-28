import { useEffect, useMemo, useState, type ChangeEvent, type FormEvent } from 'react';
import { Link, NavLink, useLocation, useNavigate, useSearchParams } from 'react-router-dom';
import { useQuery } from '@tanstack/react-query';
import clsx from 'clsx';
import { fetchCategories, fetchSettings } from '../../services/api';

function Header() {
  const navigate = useNavigate();
  const [searchParams] = useSearchParams();
  const [query, setQuery] = useState(searchParams.get('q') ?? '');
  const location = useLocation();

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

  const handleSubscribe = () => {
    const scrollToNewsletter = () => {
      const element = document.getElementById('newsletter');
      element?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    };

    if (location.pathname === '/') {
      if (window.location.hash !== '#newsletter') {
        window.location.hash = 'newsletter';
      }
      setTimeout(scrollToNewsletter, 100);
      return;
    }

    navigate('/#newsletter');
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
        <div className="flex flex-col gap-3 py-3 lg:flex-row lg:items-center lg:justify-between">
          <div className="flex items-center gap-4">
            <Link to="/" className="text-2xl font-bold tracking-tight leading-tight" style={{ color: theme.accentColor }}>
              {settings?.logoText ?? 'Space Editorial'}
            </Link>
          </div>

          <form
            onSubmit={handleSubmit}
            className="header-form flex w-full max-w-3xl items-center gap-3 rounded-2xl border bg-white px-5 py-2.5 shadow-sm focus-within:shadow-md"
            style={{ borderColor: theme.accentColor }}
          >
            <input
              className="flex-1 bg-transparent text-sm text-slate-700 outline-none placeholder:text-slate-400 sm:text-base"
              type="search"
              placeholder="Search the orbital archive"
              value={query}
              onChange={(event) => setQuery(event.target.value)}
            />
            <button
              type="submit"
              className="inline-flex items-center rounded-full px-4 py-1.5 text-sm font-semibold text-white shadow-sm transition"
              style={{ backgroundColor: theme.accentColor }}
            >
              Search
            </button>
          </form>
          <button
            type="button"
            onClick={handleSubscribe}
            className="inline-flex items-center justify-center rounded-full border px-4 py-2 text-sm font-semibold transition hover:bg-brand-base/10"
            style={{ borderColor: theme.accentColor, color: theme.accentColor }}
          >
            Subscribe
          </button>
          <div className="mt-4 lg:hidden">
            <select
              onChange={handleMobileSelect}
              className="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-600"
              defaultValue=""
            >
              <option value="" disabled>
                Browse categories
              </option>
              {categories
                ?.filter((category) => (category.posts?.length ?? 0) > 0)
                .map((category) => (
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

        {categories?.length ? (
          <nav className="header-nav mt-4 flex flex-wrap items-center gap-x-4 gap-y-2 pb-3">
            {categories
              ?.filter((category) => (category.posts?.length ?? 0) > 0)
              .map((category) => (
                <div key={category.slug} className="group relative">
                <NavLink
                  to={`/category/${category.slug}`}
                  className={({ isActive }) =>
                    clsx(
                      'rounded-full px-3 py-2 text-sm font-medium transition-colors',
                      isActive
                        ? 'text-white shadow-sm'
                        : 'text-slate-600 hover:bg-brand-base/10 hover:text-brand-base'
                    )
                  }
                  style={({ isActive }) =>
                    isActive
                      ? {
                          backgroundColor: theme.accentColor,
                        }
                      : undefined
                  }
                >
                  {category.name}
                </NavLink>
                {category.subcategories?.length ? (
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
                ) : null}
              </div>
            ))}
          </nav>
        ) : null}
      </div>
    </header>
  );
}

export default Header;
