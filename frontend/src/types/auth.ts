export type FrontendUserStatus = 'active' | 'inactive' | 'suspended';

export interface FrontendUser {
  id: number;
  name: string;
  email: string;
  status: FrontendUserStatus;
  last_login_at?: string | null;
}

export interface AuthResponse {
  token: string;
  user: FrontendUser;
}
