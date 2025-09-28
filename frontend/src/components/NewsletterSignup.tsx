import { FormEvent, useState } from 'react';

function resolveNewsletterEndpoint(): string | null {
  const base = import.meta.env.VITE_API_BASE_URL as string | undefined;

  if (base) {
    return `${base.replace(/\/$/, '')}/newsletter/subscribe`;
  }

  if (typeof window !== 'undefined') {
    return `${window.location.origin.replace(/\/$/, '')}/newsletter/subscribe`;
  }

  return null;
}

function NewsletterSignup() {
  const [email, setEmail] = useState('');
  const [status, setStatus] = useState<'idle' | 'submitting' | 'success' | 'error'>('idle');
  const [message, setMessage] = useState<string>('');

  const endpoint = resolveNewsletterEndpoint();

  const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    if (!endpoint) {
      setStatus('error');
      setMessage('Subscription endpoint is not configured.');
      return;
    }

    setStatus('submitting');
    setMessage('');

    try {
      const response = await fetch(endpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email }),
        credentials: 'include',
      });

      const body = await response.json();

      if (!response.ok) {
        const errorMessage = typeof body?.message === 'string' ? body.message : 'Unable to subscribe. Please try again later.';
        setStatus('error');
        setMessage(errorMessage);
        return;
      }

      setStatus('success');
      setMessage(body?.message ?? 'Thanks! You are subscribed.');
      setEmail('');
    } catch (error) {
      console.error(error);
      setStatus('error');
      setMessage('Network error. Please try again.');
    }
  };

  return (
    <section id="newsletter" className="mt-12 rounded-3xl bg-white px-6 py-8 shadow-sm">
      <div className="mx-auto flex max-w-3xl flex-col gap-6 text-center">
        <div>
          <h2 className="text-2xl font-semibold text-slate-900">Stay ahead of the orbit</h2>
          <p className="mt-2 text-sm text-slate-500">
            Join the Space Editorial briefing to receive curated mission updates, launch intel, and deep-space analysis straight to your inbox.
          </p>
        </div>

        <form onSubmit={handleSubmit} className="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-center">
          <input
            type="email"
            required
            value={email}
            onChange={(event) => setEmail(event.target.value)}
            placeholder="you@example.com"
            className="w-full max-w-md rounded-full border border-slate-200 px-4 py-3 text-sm text-slate-700 focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/30"
            disabled={status === 'submitting'}
          />
          <button
            type="submit"
            disabled={status === 'submitting'}
            className="inline-flex items-center justify-center rounded-full bg-brand-base px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-base/90 disabled:opacity-50"
          >
            {status === 'submitting' ? 'Subscribing…' : 'Subscribe'}
          </button>
        </form>

        {message && (
          <div
            className={`rounded-full px-4 py-2 text-sm ${status === 'success' ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-600'}`}
          >
            {message}
          </div>
        )}

        <p className="text-xs text-slate-400">
          We respect your privacy. You can unsubscribe at any time.
        </p>
      </div>
    </section>
  );
}

export default NewsletterSignup;
