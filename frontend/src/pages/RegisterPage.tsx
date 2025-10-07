import { FormEvent, useState } from 'react';
import { Helmet } from 'react-helmet-async';
import { Link, Navigate, useLocation, useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

function RegisterPage() {
  const { user, register, isLoading } = useAuth();
  const navigate = useNavigate();
  const location = useLocation();
  const redirectTo = (location.state as { from?: string } | null)?.from ?? '/';

  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');
  const [error, setError] = useState<string | null>(null);
  const [submitting, setSubmitting] = useState(false);

  if (!isLoading && user) {
    return <Navigate to={redirectTo} replace />;
  }

  const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    if (password !== confirmPassword) {
      setError('Passwords do not match.');
      return;
    }

    setSubmitting(true);
    setError(null);

    try {
      await register({ name, email, password });
      navigate(redirectTo, { replace: true });
    } catch (authError) {
      setError(authError instanceof Error ? authError.message : 'Unable to register.');
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <>
      <Helmet>
        <title>Create Account | Space Editorial</title>
      </Helmet>
      <section className="my-12 grid gap-10 lg:grid-cols-2">
        <div className="rounded-3xl bg-white px-8 py-10 shadow-sm ring-1 ring-slate-100">
          <div className="space-y-8">
            <div>
              <h1 className="text-3xl font-semibold text-slate-900">Join Space Editorial</h1>
              <p className="mt-2 text-sm text-slate-500">Create an account to personalise briefings and bookmark the intelligence that matters.</p>
            </div>

            <form onSubmit={handleSubmit} className="space-y-5">
              <div>
                <label htmlFor="name" className="block text-sm font-medium text-slate-700">
                  Full name
                </label>
                <input
                  id="name"
                  type="text"
                  required
                  value={name}
                  onChange={(event) => setName(event.target.value)}
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                />
              </div>
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
                  autoComplete="new-password"
                  required
                  value={password}
                  onChange={(event) => setPassword(event.target.value)}
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                />
              </div>
              <div>
                <label htmlFor="confirmPassword" className="block text-sm font-medium text-slate-700">
                  Confirm password
                </label>
                <input
                  id="confirmPassword"
                  type="password"
                  required
                  value={confirmPassword}
                  onChange={(event) => setConfirmPassword(event.target.value)}
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                />
              </div>

              {error && <p className="rounded-xl bg-rose-50 px-4 py-2 text-sm text-rose-600">{error}</p>}

              <button
                type="submit"
                disabled={submitting}
                className="inline-flex w-full items-center justify-center rounded-xl bg-brand-base px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-base/90 disabled:opacity-60"
              >
                {submitting ? 'Creating account…' : 'Create account'}
              </button>
            </form>

            <p className="text-sm text-slate-500">
              Already have an account?{' '}
              <Link to="/signin" className="font-semibold text-brand-base hover:underline">
                Sign in
              </Link>
            </p>
          </div>
        </div>

        <aside className="rounded-3xl border border-slate-200 bg-gradient-to-br from-brand-light/40 via-white to-white px-8 py-10 shadow-inner">
          <div className="space-y-5 text-slate-700">
            <h2 className="text-2xl font-semibold text-slate-900">Why register?</h2>
            <p className="text-sm">
              Create collections, prioritise the launch manifests that matter, and surface analytics tailored to your role. These placeholder
              narratives can be replaced with CMS-managed content via the admin console.
            </p>
            <p className="text-sm">
              Highlight premium features, onboarding guides, or cross-promote newsletters from this supporting column to guide new readers into
              your ecosystem.
            </p>
            <ul className="space-y-2 rounded-2xl bg-white/80 p-4 text-sm shadow-sm">
              <li>• Track visited articles for compliance-ready reporting</li>
              <li>• Measure click patterns across mission-critical categories</li>
              <li>• Receive curated orbital briefings in your inbox</li>
            </ul>
          </div>
        </aside>
      </section>
    </>
  );
}

export default RegisterPage;
