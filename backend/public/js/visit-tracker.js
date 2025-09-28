(function () {
    function resolveEndpoint() {
        try {
            const script = document.currentScript;
            if (script && script.src) {
                const url = new URL(script.getAttribute('data-tracking-endpoint') || script.src);
                if (script.getAttribute('data-tracking-endpoint')) {
                    return script.getAttribute('data-tracking-endpoint');
                }

                url.pathname = (script.getAttribute('data-tracking-path') || '/tracking/visit').replace(/^\/+/, '/');
                url.search = '';
                url.hash = '';
                return url.toString();
            }
        } catch (error) {
            // fall back to window location
        }

        return `${window.location.origin.replace(/\/$/, '')}/tracking/visit`;
    }

    const endpoint = resolveEndpoint();
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

    function sendPayload() {
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

        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
            keepalive: true,
        }).catch(() => {
            // Ignore logging issues
        });
    }

    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        sendPayload();
    } else {
        document.addEventListener('DOMContentLoaded', sendPayload, { once: true });
    }
})();
