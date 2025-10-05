import {
  createContext,
  useCallback,
  useContext,
  useEffect,
  useMemo,
  useState,
  type ReactNode,
} from 'react';
import type { FrontendUser } from '../types/auth';
import {
  fetchFrontendUser,
  loginFrontendUser,
  logoutFrontendUser,
  registerFrontendUser,
  type LoginPayload,
  type RegisterPayload,
} from '../services/frontendAuth';

const STORAGE_KEY = 'frontendAuthToken';

interface AuthContextValue {
  user: FrontendUser | null;
  token: string | null;
  isLoading: boolean;
  login(credentials: LoginPayload): Promise<void>; // eslint-disable-line no-unused-vars
  register(details: RegisterPayload): Promise<void>; // eslint-disable-line no-unused-vars
  logout(): Promise<void>;
  refresh(): Promise<void>;
}

const AuthContext = createContext<AuthContextValue | undefined>(undefined);

function setWindowFrontendUser(user: FrontendUser | null) {
  if (typeof window === 'undefined') {
    return;
  }

  if (user && typeof user.id === 'number') {
    window.__frontendUserId = user.id;
  } else {
    window.__frontendUserId = null;
  }
}

export function AuthProvider({ children }: { children: ReactNode }) {
  const [user, setUser] = useState<FrontendUser | null>(null);
  const [token, setToken] = useState<string | null>(null);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    const storedToken = typeof window !== 'undefined' ? window.localStorage.getItem(STORAGE_KEY) : null;

    if (!storedToken) {
      setIsLoading(false);
      setWindowFrontendUser(null);
      return;
    }

    setToken(storedToken);

    fetchFrontendUser(storedToken)
      .then((response) => {
        setUser(response.user);
        setWindowFrontendUser(response.user ?? null);
      })
      .catch(() => {
        if (typeof window !== 'undefined') {
          window.localStorage.removeItem(STORAGE_KEY);
        }
        setToken(null);
        setUser(null);
        setWindowFrontendUser(null);
      })
      .finally(() => {
        setIsLoading(false);
      });
  }, []);

  useEffect(() => {
    setWindowFrontendUser(user);
  }, [user]);

  const persistToken = useCallback((value: string | null) => {
    if (typeof window === 'undefined') {
      return;
    }

    if (value) {
      window.localStorage.setItem(STORAGE_KEY, value);
    } else {
      window.localStorage.removeItem(STORAGE_KEY);
    }
  }, []);

  const login = useCallback(async (payload: LoginPayload) => {
    const result = await loginFrontendUser(payload);
    setUser(result.user);
    setToken(result.token);
    persistToken(result.token);
  }, [persistToken]);

  const register = useCallback(async (payload: RegisterPayload) => {
    const result = await registerFrontendUser(payload);
    setUser(result.user);
    setToken(result.token);
    persistToken(result.token);
  }, [persistToken]);

  const logout = useCallback(async () => {
    if (token) {
      try {
        await logoutFrontendUser(token);
      } catch (error) {
        console.error(error);
      }
    }

    setUser(null);
    setToken(null);
    persistToken(null);
    setWindowFrontendUser(null);
  }, [persistToken, token]);

  const refresh = useCallback(async () => {
    if (!token) {
      setUser(null);
      setWindowFrontendUser(null);
      return;
    }

    const response = await fetchFrontendUser(token);
    setUser(response.user);
    setWindowFrontendUser(response.user ?? null);
  }, [token]);

  const value = useMemo<AuthContextValue>(
    () => ({
      user,
      token,
      isLoading,
      login,
      register,
      logout,
      refresh,
    }),
    [isLoading, login, logout, refresh, register, token, user]
  );

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
}

export function useAuth(): AuthContextValue {
  const context = useContext(AuthContext);
  if (!context) {
    throw new Error('useAuth must be used within an AuthProvider');
  }
  return context;
}
