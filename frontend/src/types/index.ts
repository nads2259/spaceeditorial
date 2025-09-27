export interface Category {
  id: number;
  name: string;
  slug: string;
  description?: string | null;
  image?: string | null;
  posts?: Post[];
  subcategories?: Subcategory[];
}

export interface Subcategory {
  id: number;
  name: string;
  slug: string;
  description?: string | null;
  image?: string | null;
  categorySlug?: string;
  posts?: Post[];
}

export interface Post {
  id: number;
  title: string;
  slug: string;
  excerpt?: string | null;
  body?: string | null;
  image?: string | null;
  isPublished: boolean;
  publishedAt?: string | null;
  readingTime: number;
  originalUrl?: string | null;
  category?: SimpleCategory;
  subcategory?: SimpleCategory;
  meta?: Record<string, unknown> | null;
}

export interface SimpleCategory {
  id: number;
  name: string;
  slug: string;
  image?: string | null;
}

export interface Settings {
  logoText: string;
  accentColor: string;
  backgroundColor: string;
}

export interface SearchResponse {
  data: Post[];
  meta: {
    current_page: number;
    per_page: number;
    total: number;
    last_page: number;
  };
  links: Array<{ url: string | null; label: string; active: boolean }>;
  search: {
    query: string;
    total: number;
  };
}
