(function () {
    function resolveEndpointDetails() {
        try {
            const script = document.currentScript;
            if (script && script.src) {
                const baseEndpoint = script.getAttribute('data-tracking-endpoint');
                const clickEndpoint = script.getAttribute('data-click-endpoint');

                if (baseEndpoint) {
                    return {
                        visit: baseEndpoint,
                        click: clickEndpoint || baseEndpoint.replace(/visit$/, 'click'),
                    };
                }

                const url = new URL(script.src);
                url.search = '';
                url.hash = '';
                const visitPath = (script.getAttribute('data-tracking-path') || '/tracking/visit').replace(/^\/+/, '/');
                const clickPath = (script.getAttribute('data-tracking-click-path') || '/tracking/click').replace(/^\/+/, '/');

                const visitUrl = new URL(url.toString());
                visitUrl.pathname = visitPath;

                const clickUrl = new URL(url.toString());
                clickUrl.pathname = clickPath;

                return {
                    visit: visitUrl.toString(),
                    click: clickUrl.toString(),
                };
            }
        } catch (error) {
            // fall back below
        }

        const origin = window.location.origin.replace(/\/$/, '');
        return {
            visit: `${origin}/tracking/visit`,
            click: `${origin}/tracking/click`,
        };
    }

    const endpoints = resolveEndpointDetails();
    const storageKey = 'se_visitor_id';
    const sessionKey = 'se_session_id';

    function uuid() {
        if (window.crypto && window.crypto.randomUUID) {
            return window.crypto.randomUUID();
        }
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            const r = (Math.random() * 16) | 0;
            const v = c === 'x' ? r : (r & 0x3) | 0x8;
            return v.toString(16);
        });
    }

    function getVisitorId() {
        try {
            let id = localStorage.getItem(storageKey);
            if (!id) {
                id = uuid();
                localStorage.setItem(storageKey, id);
            }
            return id;
        } catch (error) {
            return uuid();
        }
    }

    function getSessionId() {
        try {
            let id = sessionStorage.getItem(sessionKey);
            if (!id) {
                id = uuid();
                sessionStorage.setItem(sessionKey, id);
            }
            return id;
        } catch (error) {
            return null;
        }
    }

    function resolveFrontendUserId() {
        try {
            if (typeof window.__frontendUserId !== 'undefined' && window.__frontendUserId !== null) {
                return window.__frontendUserId;
            }

            const meta = document.querySelector('meta[name="frontend-user-id"]');
            if (meta && meta.content) {
                const parsed = parseInt(meta.content, 10);
                return Number.isNaN(parsed) ? null : parsed;
            }
        } catch (error) {
            // ignore detection errors
        }

        return null;
    }

    function sendVisit() {
        if (!('fetch' in window)) {
            return;
        }

        const payload = {
            visitor_id: getVisitorId(),
            session_id: getSessionId(),
            url: window.location.href,
            referrer: document.referrer || null,
            locale: navigator.language || null,
            context: {
                timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                screen: window.screen ? `${window.screen.width}x${window.screen.height}` : null,
                platform: navigator.platform || null,
            },
        };

        const frontendUserId = resolveFrontendUserId();
        if (frontendUserId) {
            payload.frontend_user_id = frontendUserId;
        }

        fetch(endpoints.visit, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
            keepalive: true,
        }).catch(function () {
            // Ignore logging issues
        });
    }

    function clickLabelFromElement(element) {
        if (!element) {
            return null;
        }

        const explicit = element.getAttribute('data-track-label');
        if (explicit) {
            return explicit;
        }

        if (element.textContent) {
            const text = element.textContent.trim().replace(/\s+/g, ' ');
            if (text.length) {
                return text.slice(0, 120);
            }
        }

        if (element.getAttribute('aria-label')) {
            return element.getAttribute('aria-label');
        }

        if (element.getAttribute('title')) {
            return element.getAttribute('title');
        }

        return element.tagName.toLowerCase();
    }

    function sendClick(event) {
        if (!('fetch' in window)) {
            return;
        }

        const link = event.target.closest('a, button, [data-track-click]');
        if (!link) {
            return;
        }

        const payload = {
            visitor_id: getVisitorId(),
            session_id: getSessionId(),
            url: link.href || window.location.href,
            label: clickLabelFromElement(link),
            context: {
                tag: link.tagName.toLowerCase(),
                path: window.location.pathname,
            },
        };

        const frontendUserId = resolveFrontendUserId();
        if (frontendUserId) {
            payload.frontend_user_id = frontendUserId;
        }

        if (navigator.sendBeacon) {
            try {
                const blob = new Blob([JSON.stringify(payload)], { type: 'application/json' });
                navigator.sendBeacon(endpoints.click, blob);
                return;
            } catch (error) {
                // fallback to fetch below
            }
        }

        fetch(endpoints.click, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
            keepalive: true,
        }).catch(function () {
            // Ignore logging issues
        });
    }

    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        sendVisit();
    } else {
        document.addEventListener('DOMContentLoaded', sendVisit, { once: true });
    }

    document.addEventListener('click', sendClick, true);
})();
