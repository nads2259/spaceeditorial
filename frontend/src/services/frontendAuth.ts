import type { AuthResponse, FrontendUser } from '../types/auth';
import { getVisitorMetadata } from '../utils/visitor';

const rawBase = (import.meta.env.VITE_API_BASE_URL as string | undefined) ?? (typeof window !== 'undefined' ? window.location.origin : '');
const API_BASE = rawBase.replace(/\/$/, '');

type FetchOptions = Parameters<typeof fetch>[1];

async function request<T>(path: string, options: FetchOptions = {}): Promise<T> {
  const headers = new Headers((options && options.headers) || {});
  if (!headers.has('Content-Type')) {
    headers.set('Content-Type', 'application/json');
  }

  const response = await fetch(`${API_BASE}/api/${path}`, {
    ...options,
    headers,
    credentials: 'include',
  });

  const data = await response.json().catch(() => ({}));

  if (!response.ok) {
    const message = typeof data?.message === 'string' ? data.message : 'Request failed. Please try again';
    throw new Error(message);
  }

  return data as T;
}

export interface RegisterPayload {
  name: string;
  email: string;
  password: string;
}

export interface LoginPayload {
  email: string;
  password: string;
}

export async function registerFrontendUser(payload: RegisterPayload): Promise<AuthResponse> {
  const visitor = getVisitorMetadata();

  return request<AuthResponse>('frontend/register', {
    method: 'POST',
    body: JSON.stringify({ ...payload, ...visitor }),
  });
}

export async function loginFrontendUser(payload: LoginPayload): Promise<AuthResponse> {
  const visitor = getVisitorMetadata();

  return request<AuthResponse>('frontend/login', {
    method: 'POST',
    body: JSON.stringify({ ...payload, ...visitor }),
  });
}

export async function fetchFrontendUser(token: string): Promise<{ user: FrontendUser | null }> {
  return request<{ user: FrontendUser | null }>('frontend/me', {
    method: 'GET',
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });
}

export async function logoutFrontendUser(token: string): Promise<void> {
  await request('frontend/logout', {
    method: 'POST',
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });
}

export async function submitContactMessage(
  payload: { name: string; email: string; subject?: string; message: string },
  token?: string | null
): Promise<{ message: string; id: number }> {
  return request<{ message: string; id: number }>('contact', {
    method: 'POST',
    headers: token
      ? {
          Authorization: `Bearer ${token}`,
        }
      : undefined,
    body: JSON.stringify(payload),
  });
}

export async function submitPostComment(
  slug: string,
  body: string,
  token: string
): Promise<{ message: string; status?: string }> {
  return request<{ message: string; status?: string }>(`posts/${slug}/comments`, {
    method: 'POST',
    headers: {
      Authorization: `Bearer ${token}`,
    },
    body: JSON.stringify({ body }),
  });
}

