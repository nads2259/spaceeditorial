import { FormEvent, useState } from 'react';

function normalizeBase(url: string | undefined): string | null {
  if (!url) return null;
  return url.replace(/\/$/, '');
}

export function resolveNewsletterEndpoint(): string | null {
  const base = normalizeBase(import.meta.env.VITE_API_BASE_URL as string | undefined);

  if (base) {
    return `${base}/newsletter/subscribe`;
  }

  if (typeof window !== 'undefined') {
    return `${window.location.origin.replace(/\/$/, '')}/newsletter/subscribe`;
  }

  return null;
}

type Status = 'idle' | 'submitting' | 'success' | 'error';

export function useNewsletterSubscription() {
  const [email, setEmail] = useState('');
  const [status, setStatus] = useState<Status>('idle');
  const [message, setMessage] = useState('');

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

  return {
    email,
    setEmail,
    status,
    message,
    handleSubmit,
  };
}
