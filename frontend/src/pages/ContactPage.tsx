import { FormEvent, useEffect, useState } from 'react';
import { Helmet } from 'react-helmet-async';
import { submitContactMessage } from '../services/frontendAuth';
import { useAuth } from '../context/AuthContext';

function ContactPage() {
  const { user, token } = useAuth();
  const [name, setName] = useState(user?.name ?? '');
  const [email, setEmail] = useState(user?.email ?? '');
  const [subject, setSubject] = useState('');
  const [message, setMessage] = useState('');
  const [status, setStatus] = useState<'idle' | 'loading' | 'success' | 'error'>('idle');
  const [feedback, setFeedback] = useState('');

  useEffect(() => {
    if (user) {
      setName((current) => current || user.name);
      setEmail((current) => current || user.email);
    }
  }, [user]);

  const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setStatus('loading');
    setFeedback('');

    try {
      const response = await submitContactMessage({ name, email, subject, message }, token);
      setStatus('success');
      setFeedback(response.message ?? 'Thanks! We will reach out soon.');
      setSubject('');
      setMessage('');
    } catch (error) {
      setStatus('error');
      setFeedback(error instanceof Error ? error.message : 'Unable to submit your query. Please try again later.');
    }
  };

  return (
    <>
      <Helmet>
        <title>Contact | Space Editorial</title>
      </Helmet>
      <section className="my-12 grid gap-10 lg:grid-cols-[1.1fr_0.9fr]">
        <div className="rounded-3xl bg-white px-8 py-10 shadow-sm ring-1 ring-slate-100">
          <div className="space-y-6">
            <div>
              <h1 className="text-3xl font-semibold text-slate-900">Contact our editorial desk</h1>
              <p className="mt-2 text-sm text-slate-500">
                Submit mission questions, media enquiries, or product feedback. Registered users are automatically mapped so the analytics desk can
                review visit and click history alongside each request.
              </p>
            </div>

            <form onSubmit={handleSubmit} className="space-y-5">
              <div className="grid gap-4 sm:grid-cols-2">
                <div>
                  <label htmlFor="contact-name" className="block text-sm font-medium text-slate-700">
                    Name
                  </label>
                  <input
                    id="contact-name"
                    type="text"
                    required
                    value={name}
                    onChange={(event) => setName(event.target.value)}
                    className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                  />
                </div>
                <div>
                  <label htmlFor="contact-email" className="block text-sm font-medium text-slate-700">
                    Email
                  </label>
                  <input
                    id="contact-email"
                    type="email"
                    required
                    value={email}
                    onChange={(event) => setEmail(event.target.value)}
                    className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                  />
                </div>
              </div>

              <div>
                <label htmlFor="contact-subject" className="block text-sm font-medium text-slate-700">
                  Subject
                </label>
                <input
                  id="contact-subject"
                  type="text"
                  value={subject}
                  onChange={(event) => setSubject(event.target.value)}
                  placeholder="e.g. Launch coverage partnership"
                  className="mt-1 block w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                />
              </div>

              <div>
                <label htmlFor="contact-message" className="block text-sm font-medium text-slate-700">
                  Message
                </label>
                <textarea
                  id="contact-message"
                  required
                  rows={5}
                  value={message}
                  onChange={(event) => setMessage(event.target.value)}
                  className="mt-1 block w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-brand-base focus:outline-none focus:ring-2 focus:ring-brand-base/20"
                  placeholder="Share mission details, preferred contact windows, or additional context."
                />
              </div>

              {feedback && (
                <p className={`rounded-xl px-4 py-3 text-sm ${status === 'success' ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-600'}`}>
                  {feedback}
                </p>
              )}

              <button
                type="submit"
                disabled={status === 'loading'}
                className="inline-flex items-center justify-center rounded-xl bg-brand-base px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-base/90 disabled:opacity-60"
              >
                {status === 'loading' ? 'Sending…' : 'Submit query'}
              </button>
            </form>
          </div>
        </div>

        <aside className="flex flex-col gap-6 rounded-3xl border border-slate-200 bg-white/70 p-6 shadow-inner">
          <div className="space-y-3">
            <h2 className="text-2xl font-semibold text-slate-900">Mission support hub</h2>
            <p className="text-sm text-slate-600">
              Our analysts operate from UTC 06:00 to 20:00. Use this channel for mission support, syndication requests, or to flag an operational
              anomaly that needs rapid coverage.
            </p>
          </div>
          <div className="h-64 overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">
            <div className="flex h-full items-center justify-center bg-[url('https://maps.gstatic.com/tactile/pane/default.png')] bg-cover bg-center">
              <span className="rounded-full bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-600">Map Placeholder</span>
            </div>
          </div>
          <div className="space-y-2 text-sm text-slate-600">
            <p className="font-semibold text-slate-800">Space Editorial HQ</p>
            <p>400 Launch Lane, Suite 1200</p>
            <p>Cape Canaveral, FL 32920, USA</p>
            <p className="text-xs text-slate-400">These location details are placeholder content that can later be replaced via the admin CMS.</p>
          </div>
        </aside>
      </section>
    </>
  );
}

export default ContactPage;
