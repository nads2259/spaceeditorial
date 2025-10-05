const VISITOR_STORAGE_KEY = 'se_visitor_id';
const SESSION_STORAGE_KEY = 'se_session_id';

export function getVisitorId(): string | null {
  try {
    return localStorage.getItem(VISITOR_STORAGE_KEY);
  } catch (error) {
    return null;
  }
}

export function getSessionId(): string | null {
  try {
    return sessionStorage.getItem(SESSION_STORAGE_KEY);
  } catch (error) {
    return null;
  }
}

export function getVisitorMetadata() {
  return {
    visitor_id: getVisitorId(),
    session_id: getSessionId(),
  };
}
