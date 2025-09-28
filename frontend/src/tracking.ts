const TRACKING_SCRIPT_ATTRIBUTE = 'data-visitor-tracker';

function normalizeBaseUrl(url: string): string {
  return url.endsWith('/') ? url.slice(0, -1) : url;
}

function loadTrackingScript(scriptUrl: string, endpoint: string) {
  if (typeof document === 'undefined') {
    return;
  }

  if (document.querySelector(`script[${TRACKING_SCRIPT_ATTRIBUTE}]`)) {
    return;
  }

  const script = document.createElement('script');
  script.src = scriptUrl;
  script.async = true;
  script.setAttribute(TRACKING_SCRIPT_ATTRIBUTE, 'visit-log');
  script.setAttribute('data-tracking-endpoint', endpoint);
  document.head.appendChild(script);
}

function resolveTrackingConfig(): { scriptUrl: string; endpoint: string } | null {
  const explicitBase = import.meta.env.VITE_TRACKING_BASE_URL as string | undefined;
  const apiBase = import.meta.env.VITE_API_BASE_URL as string | undefined;

  const base = explicitBase || apiBase;

  if (!base) {
    return null;
  }

  const normalized = normalizeBaseUrl(base);

  return {
    scriptUrl: `${normalized}/js/visit-tracker.js`,
    endpoint: `${normalized}/tracking/visit`,
  };
}

const config = resolveTrackingConfig();

if (config) {
  loadTrackingScript(config.scriptUrl, config.endpoint);
} else if (typeof console !== 'undefined') {
  console.warn('Visitor analytics script skipped: set VITE_TRACKING_BASE_URL or VITE_API_BASE_URL.');
}
