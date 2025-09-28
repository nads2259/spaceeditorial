const CHART_SELECTOR = '[data-visits-chart]';
const SVG_NS = 'http://www.w3.org/2000/svg';
const DAYS_TO_DISPLAY = 14;
const numberFormatter = new Intl.NumberFormat(undefined, { maximumFractionDigits: 0 });

const debounce = (fn, delay = 150) => {
    let timer;
    return (...args) => {
        window.clearTimeout(timer);
        timer = window.setTimeout(() => fn(...args), delay);
    };
};

const toDateKey = (date) => {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
};

const parseRawData = (element) => {
    const raw = element.getAttribute('data-visits');
    if (!raw) {
        return [];
    }

    try {
        const parsed = JSON.parse(raw);
        return Array.isArray(parsed) ? parsed : [];
    } catch (error) {
        console.warn('Failed to parse visits data payload:', error);
        return [];
    }
};

const normalizeData = (rawData) => {
    const parsed = rawData
        .map((entry) => {
            const value = Number(entry.total) || 0;
            const date = entry.date ? new Date(entry.date) : null;
            if (!date || Number.isNaN(date.getTime())) {
                return null;
            }

            date.setHours(0, 0, 0, 0);
            return {
                key: toDateKey(date),
                date,
                total: value < 0 ? 0 : value,
            };
        })
        .filter(Boolean)
        .sort((a, b) => a.date - b.date);

    const totalsByDay = new Map();
    parsed.forEach((entry) => {
        totalsByDay.set(entry.key, (totalsByDay.get(entry.key) || 0) + entry.total);
    });

    const latestDate = parsed.length ? parsed[parsed.length - 1].date : (() => {
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        return today;
    })();

    const startDate = new Date(latestDate);
    startDate.setDate(latestDate.getDate() - (DAYS_TO_DISPLAY - 1));

    const result = [];
    for (let offset = 0; offset < DAYS_TO_DISPLAY; offset += 1) {
        const currentDate = new Date(startDate);
        currentDate.setDate(startDate.getDate() + offset);
        const key = toDateKey(currentDate);
        result.push({
            key,
            date: currentDate,
            total: totalsByDay.get(key) || 0,
        });
    }

    return result;
};

const formatShortLabel = (date) =>
    date.toLocaleDateString(undefined, {
        month: 'short',
        day: 'numeric',
    });

const formatLongLabel = (date) =>
    date.toLocaleDateString(undefined, {
        weekday: 'short',
        month: 'short',
        day: 'numeric',
        year: 'numeric',
    });

const resolveDimensions = (element) => {
    let width = element.clientWidth;
    if (!width || width <= 0) {
        width = element.parentElement?.clientWidth || 640;
    }

    let height = element.clientHeight;
    if (!height || height <= 0) {
        const computed = window.getComputedStyle(element).height;
        height = computed ? parseInt(computed, 10) : 0;
    }

    if (!height || Number.isNaN(height)) {
        height = 280;
    }

    return {
        width: Math.max(width, 320),
        height: Math.max(height, 220),
    };
};

const ensureTooltip = (element) => {
    if (element.__visitsTooltip) {
        return element.__visitsTooltip;
    }

    const tooltip = document.createElement('div');
    tooltip.style.position = 'absolute';
    tooltip.style.pointerEvents = 'none';
    tooltip.style.background = 'rgba(15, 23, 42, 0.92)';
    tooltip.style.color = '#fff';
    tooltip.style.padding = '6px 10px';
    tooltip.style.fontSize = '0.75rem';
    tooltip.style.fontWeight = '600';
    tooltip.style.borderRadius = '0.5rem';
    tooltip.style.boxShadow = '0 14px 32px rgba(15, 23, 42, 0.25)';
    tooltip.style.opacity = '0';
    tooltip.style.transform = 'translate(-50%, -10px)';
    tooltip.style.transition = 'opacity 140ms ease, transform 140ms ease';
    tooltip.style.zIndex = '5';
    tooltip.setAttribute('aria-hidden', 'true');

    const position = window.getComputedStyle(element).position;
    if (!['relative', 'absolute', 'fixed'].includes(position)) {
        element.style.position = 'relative';
    }

    element.__visitsTooltip = tooltip;
    return tooltip;
};

const hideTooltip = (tooltip) => {
    tooltip.style.opacity = '0';
};

const showTooltip = (element, tooltip, target, datum) => {
    const barRect = target.getBoundingClientRect();
    const containerRect = element.getBoundingClientRect();

    const centerX = barRect.left + barRect.width / 2 - containerRect.left;
    const preferredTop = barRect.top - containerRect.top - 14;

    const clampedX = Math.min(Math.max(centerX, 16), containerRect.width - 16);
    const top = preferredTop < 8 ? 8 : preferredTop;

    tooltip.textContent = `${numberFormatter.format(datum.total)} ${datum.total === 1 ? 'visit' : 'visits'} • ${formatLongLabel(
        datum.date
    )}`;
    tooltip.style.left = `${clampedX}px`;
    tooltip.style.top = `${top}px`;
    tooltip.style.opacity = '1';
    tooltip.style.transform = 'translate(-50%, -4px)';
};

const createEmptyState = (element) => {
    const wrapper = document.createElement('div');
    wrapper.style.display = 'flex';
    wrapper.style.flexDirection = 'column';
    wrapper.style.alignItems = 'center';
    wrapper.style.justifyContent = 'center';
    wrapper.style.height = '100%';
    wrapper.style.borderRadius = '0.75rem';
    wrapper.style.border = '1px dashed rgba(148, 163, 184, 0.45)';
    wrapper.style.background = 'linear-gradient(180deg, rgba(226, 232, 240, 0.25) 0%, rgba(248, 250, 252, 0.55) 100%)';
    wrapper.style.color = '#64748b';
    wrapper.style.fontSize = '0.875rem';
    wrapper.style.fontWeight = '500';
    wrapper.style.textAlign = 'center';
    wrapper.style.padding = '1.5rem';

    const message = element.getAttribute('data-chart-empty') || 'No data available yet.';
    wrapper.textContent = message;

    return wrapper;
};

const buildChartSvg = (element, data, dimensions) => {
    const { width, height } = dimensions;
    const padding = { top: 24, right: 24, bottom: 44, left: 56 };
    const { chartTitle = 'Visits' } = element.dataset;

    const maxValue = data.reduce((acc, item) => Math.max(acc, item.total), 0);
    const safeMax = maxValue > 0 ? maxValue : 1;

    const plotWidth = width - padding.left - padding.right;
    const plotHeight = height - padding.top - padding.bottom;

    const svg = document.createElementNS(SVG_NS, 'svg');
    svg.setAttribute('viewBox', `0 0 ${width} ${height}`);
    svg.setAttribute('width', `${width}`);
    svg.setAttribute('height', `${height}`);

    const gradientId = `${element.id || 'visits-chart'}-gradient`;
    const titleId = `${element.id || 'visits-chart'}-title`;
    const descId = `${element.id || 'visits-chart'}-description`;
    svg.setAttribute('role', 'img');
    svg.setAttribute('aria-labelledby', `${titleId} ${descId}`);

    const title = document.createElementNS(SVG_NS, 'title');
    title.setAttribute('id', titleId);
    title.textContent = chartTitle;

    const description = document.createElementNS(SVG_NS, 'desc');
    description.setAttribute('id', descId);
    description.textContent = 'Bar chart showing the last 14 days of visit activity.';

    const defs = document.createElementNS(SVG_NS, 'defs');
    const gradient = document.createElementNS(SVG_NS, 'linearGradient');
    gradient.setAttribute('id', gradientId);
    gradient.setAttribute('x1', '0%');
    gradient.setAttribute('x2', '0%');
    gradient.setAttribute('y1', '0%');
    gradient.setAttribute('y2', '100%');

    const stopTop = document.createElementNS(SVG_NS, 'stop');
    stopTop.setAttribute('offset', '0%');
    stopTop.setAttribute('stop-color', '#6366f1');

    const stopBottom = document.createElementNS(SVG_NS, 'stop');
    stopBottom.setAttribute('offset', '100%');
    stopBottom.setAttribute('stop-color', '#4338ca');

    gradient.append(stopTop, stopBottom);
    defs.appendChild(gradient);

    svg.append(title, description, defs);

    const background = document.createElementNS(SVG_NS, 'rect');
    background.setAttribute('x', `${padding.left}`);
    background.setAttribute('y', `${padding.top}`);
    background.setAttribute('width', `${plotWidth}`);
    background.setAttribute('height', `${plotHeight}`);
    background.setAttribute('rx', '12');
    background.setAttribute('ry', '12');
    background.setAttribute('fill', 'rgba(241, 245, 249, 0.45)');
    background.setAttribute('stroke', 'rgba(226, 232, 240, 0.8)');
    background.setAttribute('stroke-width', '1');
    svg.appendChild(background);

    const gridLines = 4;
    for (let index = 0; index <= gridLines; index += 1) {
        const ratio = index / gridLines;
        const y = padding.top + plotHeight - ratio * plotHeight;

        const line = document.createElementNS(SVG_NS, 'line');
        line.setAttribute('x1', `${padding.left}`);
        line.setAttribute('x2', `${padding.left + plotWidth}`);
        line.setAttribute('y1', `${y}`);
        line.setAttribute('y2', `${y}`);
        line.setAttribute('stroke', index === gridLines ? '#1e293b' : '#cbd5f5');
        line.setAttribute('stroke-opacity', index === gridLines ? '0.45' : '0.25');
        line.setAttribute('stroke-width', index === gridLines ? '1.5' : '1');
        line.setAttribute('stroke-dasharray', index === gridLines ? 'none' : '6 6');
        svg.appendChild(line);

        const label = document.createElementNS(SVG_NS, 'text');
        label.setAttribute('x', `${padding.left - 12}`);
        label.setAttribute('y', `${y + 4}`);
        label.setAttribute('text-anchor', 'end');
        label.setAttribute('font-size', '11');
        label.setAttribute('fill', '#94a3b8');
        label.textContent = numberFormatter.format(Math.round((safeMax * ratio)));
        svg.appendChild(label);
    }

    const stepX = plotWidth / data.length;
    const barWidth = Math.min(36, Math.max(stepX * 0.6, 10));
    const labelStride = data.length > 8 ? Math.ceil(data.length / 7) : 1;

    data.forEach((datum, index) => {
        const barHeight = (datum.total / safeMax) * plotHeight;
        const clampedHeight = barHeight > 4 ? barHeight : 4;
        const centerX = padding.left + index * stepX + stepX / 2;
        const x = centerX - barWidth / 2;
        const y = padding.top + plotHeight - clampedHeight;

        const rect = document.createElementNS(SVG_NS, 'rect');
        rect.setAttribute('x', `${x}`);
        rect.setAttribute('y', `${y}`);
        rect.setAttribute('width', `${barWidth}`);
        rect.setAttribute('height', `${clampedHeight}`);
        rect.setAttribute('rx', '10');
        rect.setAttribute('ry', '10');
        rect.setAttribute('fill', `url(#${gradientId})`);
        rect.setAttribute('stroke', '#4338ca');
        rect.setAttribute('stroke-width', '0.5');
        rect.style.cursor = 'pointer';
        rect.setAttribute('tabindex', '0');
        rect.setAttribute('role', 'presentation');

        rect.addEventListener('mouseenter', (event) => {
            showTooltip(element, ensureTooltip(element), event.currentTarget, datum);
        });
        rect.addEventListener('focus', (event) => {
            showTooltip(element, ensureTooltip(element), event.currentTarget, datum);
        });
        rect.addEventListener('mouseleave', () => {
            hideTooltip(ensureTooltip(element));
        });
        rect.addEventListener('blur', () => {
            hideTooltip(ensureTooltip(element));
        });
        rect.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                showTooltip(element, ensureTooltip(element), event.currentTarget, datum);
            }
        });

        svg.appendChild(rect);

        const shouldShowLabel = index % labelStride === 0 || index === data.length - 1;
        if (shouldShowLabel) {
            const label = document.createElementNS(SVG_NS, 'text');
            const labelY = padding.top + plotHeight + (data.length > 10 ? 28 : 24);
            label.setAttribute('x', `${centerX}`);
            label.setAttribute('y', `${labelY}`);
            label.setAttribute('font-size', '11');
            label.setAttribute('fill', '#64748b');
            if (data.length > 10) {
                label.setAttribute('transform', `rotate(-35 ${centerX} ${labelY})`);
                label.setAttribute('text-anchor', 'end');
            } else {
                label.setAttribute('text-anchor', 'middle');
            }
            label.textContent = formatShortLabel(datum.date);
            svg.appendChild(label);
        }
    });

    return svg;
};

const renderChart = (element) => {
    const tooltip = ensureTooltip(element);
    const rawData = parseRawData(element);
    const normalized = normalizeData(rawData);
    const hasValues = normalized.some((item) => item.total > 0);
    const dimensions = resolveDimensions(element);

    if (!hasValues) {
        const emptyState = createEmptyState(element);
        element.replaceChildren(emptyState);
        hideTooltip(tooltip);
        return;
    }

    const svg = buildChartSvg(element, normalized, dimensions);
    if (tooltip.parentElement) {
        tooltip.remove();
    }

    element.replaceChildren(svg, tooltip);
    hideTooltip(tooltip);
};

const initializeCharts = () => {
    const charts = Array.from(document.querySelectorAll(CHART_SELECTOR));
    if (!charts.length) {
        return;
    }

    charts.forEach((element) => {
        if (element.dataset.chartReady === 'true') {
            renderChart(element);
            return;
        }

        element.dataset.chartReady = 'true';
        renderChart(element);

        if (window.ResizeObserver) {
            const observer = new ResizeObserver(() => {
                renderChart(element);
            });
            observer.observe(element);
            element.__visitsObserver = observer;
        } else {
            const handler = debounce(() => renderChart(element));
            window.addEventListener('resize', handler);
            element.__visitsResizeHandler = handler;
        }
    });
};

document.addEventListener('DOMContentLoaded', initializeCharts);
if (document.readyState !== 'loading') {
    initializeCharts();
}
