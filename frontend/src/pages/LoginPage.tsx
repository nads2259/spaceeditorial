import { FormEvent, useState } from 'react';
import { Helmet } from 'react-helmet-async';
import { Link, Navigate, useLocation, useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

function LoginPage() {
  const { user, login, isLoading } = useAuth();
  const navigate = useNavigate();
  const location = useLocation();
  const redirectTo = (location.state as { from?: string } | null)?.from ?? '/';
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState<string | null>(null);
  const [submitting, setSubmitting] = useState(false);

  if (!isLoading && user) {
    return <Navigate to={redirectTo} replace />;
  }

  const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setSubmitting(true);
    setError(null);

    try {
      await login({ email, password });
      navigate(redirectTo, { replace: true });
    } catch (authError) {
      setError(authError instanceof Error ? authError.message : 'Unable to login.');
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <>
      <Helmet>
        <title>Login | Space Editorial</title>
      </Helmet>
      <section className="my-12 grid gap-10 lg:grid-cols-2">
        <div className="rounded-3xl bg-white px-8 py-10 shadow-sm ring-1 ring-slate-100">
          <div className="space-y-8">
            <div>
              <h1 className="text-3xl font-semibold text-slate-900">Sign in to Space Editorial</h1>
              <p className="mt-2 text-sm text-slate-500">Access personalised watchlists, mission alerts, and reading history.</p>
            </div>

            <form onSubmit={handleSubmit} className="space-y-5">
              <div>
                <label htmlFor="email" className="block text-sm font-medium text-slate-700">
                  Email address
                </label>
                <input
                  id="email"
                  type="email"
                  autoComplete="email"
                  required
                  value={email}
                  onChange={(event) => setEmail(event.target.value)}
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                />
              </div>
              <div>
                <label htmlFor="password" className="block text-sm font-medium text-slate-700">
                  Password
                </label>
                <input
                  id="password"
                  type="password"
                  autoComplete="current-password"
                  required
                  value={password}
                  onChange={(event) => setPassword(event.target.value)}
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                />
              </div>

              {error && <p className="rounded-xl bg-rose-50 px-4 py-2 text-sm text-rose-600">{error}</p>}

              <button
                type="submit"
                disabled={submitting}
                className="inline-flex w-full items-center justify-center rounded-xl bg-brand-base px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-base/90 disabled:opacity-60"
              >
                {submitting ? 'Signing in…' : 'Sign in'}
              </button>
            </form>

            <p className="text-sm text-slate-500">
              New to Space Editorial?{' '}
              <Link to="/register" className="font-semibold text-brand-base hover:underline">
                Create an account
              </Link>
            </p>
          </div>
        </div>

        <aside className="rounded-3xl border border-slate-200 bg-gradient-to-br from-white via-brand-light/40 to-white px-8 py-10 shadow-inner">
          <div className="space-y-5 text-slate-700">
            <h2 className="text-2xl font-semibold text-slate-900">Mission control intel</h2>
            <p className="text-sm">
              Log in to unlock tailored briefings, revisit saved orbital dossiers, and follow the launch cadence that matters to your team.
            </p>
            <p className="text-sm">
              These copy blocks are placeholders that your admin team can later manage via the CMS. Use them to surface value props, onboarding
              hints, or promote premium features mapped to this experience.
            </p>
            <p className="rounded-2xl bg-white/80 p-4 text-sm shadow-sm">
              “Space Editorial keeps our analysts aligned with mission-critical updates across launch systems and deep-space operations.”
            </p>
          </div>
        </aside>
      </section>
    </>
  );
}

export default LoginPage;
