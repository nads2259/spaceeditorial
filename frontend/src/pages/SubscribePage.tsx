import { Helmet } from 'react-helmet-async';
import { useNewsletterSubscription } from '../hooks/useNewsletterSubscription';

function SubscribePage() {
  const { email, setEmail, status, message, handleSubmit } = useNewsletterSubscription();

  return (
    <>
      <Helmet>
        <title>Subscribe | Space Editorial</title>
      </Helmet>
      <section className="my-12 grid gap-10 lg:grid-cols-2">
        <div className="rounded-3xl bg-white px-8 py-10 shadow-sm ring-1 ring-slate-100">
          <div className="space-y-6">
            <div>
              <h1 className="text-3xl font-semibold text-slate-900">Subscribe to the orbital briefing</h1>
              <p className="mt-2 text-sm text-slate-500">
                Receive curated launch intelligence, mission recaps, and deep-space analyses. Manage cadence, topics, and segments later from the
                admin console.
              </p>
            </div>

            <form onSubmit={handleSubmit} className="space-y-4">
              <div>
                <label htmlFor="subscription-email" className="block text-sm font-medium text-slate-700">
                  Email address
                </label>
                <input
                  id="subscription-email"
                  type="email"
                  required
                  value={email}
                  onChange={(event) => setEmail(event.target.value)}
                  placeholder="you@example.com"
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                  disabled={status === 'submitting'}
                />
              </div>

              <button
                type="submit"
                disabled={status === 'submitting'}
                className="inline-flex w-full items-center justify-center rounded-xl bg-brand-base px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-base/90 disabled:opacity-60"
              >
                {status === 'submitting' ? 'Subscribing…' : 'Subscribe'}
              </button>
            </form>

            {message && (
              <p className={`rounded-xl px-4 py-3 text-sm ${status === 'success' ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-600'}`}>
                {message}
              </p>
            )}

            <p className="text-xs text-slate-400">We respect your privacy. Control your alert cadence and unsubscribe anytime.</p>
          </div>
        </div>

        <aside className="rounded-3xl border border-slate-200 bg-gradient-to-br from-white via-brand-light/30 to-white px-8 py-10 shadow-inner">
          <div className="space-y-5 text-slate-700">
            <h2 className="text-2xl font-semibold text-slate-900">What subscribers receive</h2>
            <p className="text-sm">
              Tailored mission spotlights, intelligence on payload deployments, and exclusive analysis across launch systems and orbital services.
              Replace these paragraphs with dynamic CMS-driven content later.
            </p>
            <div className="space-y-2 rounded-2xl bg-white/80 p-4 text-sm shadow-sm">
              <p className="font-semibold text-slate-800">Weekly cadence</p>
              <p className="text-slate-600">Launch manifests, mission scrubs, and regulatory shifts delivered every Monday.</p>
              <p className="font-semibold text-slate-800">Deep-dive features</p>
              <p className="text-slate-600">Long-form editorials on propulsion advances and spacecraft design patterns.</p>
            </div>
          </div>
        </aside>
      </section>
    </>
  );
}

export default SubscribePage;
