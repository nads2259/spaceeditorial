import axios from 'axios';
import type { Category, Post, SearchResponse, Settings, Subcategory } from '../types';

const apiToken = import.meta.env.VITE_API_TOKEN;

const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL ?? 'http://127.0.0.1:8001',
  headers: apiToken
    ? {
        Authorization: `Bearer ${apiToken}`,
      }
    : undefined,
});

const hasFullContent = (post: Post) => {
  const metaFlag = Boolean(post.meta && (post.meta as Record<string, unknown>)['has_full_content'] === true);
  const hasBody = typeof post.body === 'string' && post.body.trim().length > 0;
  return metaFlag && hasBody;
};

const filterPosts = (posts?: Post[]) => posts?.filter(hasFullContent) ?? [];

const sortPosts = (posts: Post[]) =>
  [...posts].sort((a, b) => {
    const dateA = a.publishedAt ? new Date(a.publishedAt).getTime() : 0;
    const dateB = b.publishedAt ? new Date(b.publishedAt).getTime() : 0;
    return dateB - dateA;
  });

export async function fetchSettings(): Promise<Settings> {
  const { data } = await api.get<Settings>('/api/settings');
  return data;
}

export type CategoryWithContent = Category & {
  posts: Post[];
  subcategories: (Subcategory & { posts?: Post[] })[];
};

export async function fetchCategories(): Promise<CategoryWithContent[]> {
  const { data } = await api.get<{ data: Category[] }>('/api/categories');
  return data.data.map((category) => ({
    ...category,
    posts: sortPosts(filterPosts(category.posts)),
    subcategories:
      category.subcategories?.map((subcategory) => ({
        ...subcategory,
        posts: sortPosts(filterPosts(subcategory.posts)),
        categorySlug: category.slug,
      })) ?? [],
  }));
}

export async function fetchCategory(slug: string): Promise<Category> {
  const { data } = await api.get<{ data: Category }>(`/api/categories/${slug}`);
  return {
    ...data.data,
    posts: sortPosts(filterPosts(data.data.posts)),
    subcategories:
      data.data.subcategories?.map((subcategory) => ({
        ...subcategory,
        posts: sortPosts(filterPosts(subcategory.posts)),
        categorySlug: data.data.slug,
      })) ?? [],
  };
}

export async function fetchSubcategory(categorySlug: string, subcategorySlug: string): Promise<Subcategory> {
  const { data } = await api.get<{ data: Subcategory }>(`/api/categories/${categorySlug}/subcategories/${subcategorySlug}`);
  return {
    ...data.data,
    posts: sortPosts(filterPosts(data.data.posts)),
    categorySlug,
  };
}

export async function fetchPost(slug: string): Promise<Post> {
  const { data } = await api.get<{ data: Post }>(`/api/posts/${slug}`);
  return data.data;
}

export async function searchPosts(query: string, page = 1, perPage = 12): Promise<SearchResponse> {
  const { data } = await api.get<SearchResponse>('/api/search', {
    params: { q: query, page, per_page: perPage },
  });

  return {
    ...data,
    data: data.data.filter(hasFullContent),
  };
}
