export function formatDate(value?: string | null) {
  if (!value) return 'Draft';
  const date = new Date(value);
  return date.toLocaleDateString(undefined, {
    month: 'short',
    day: 'numeric',
    year: 'numeric',
  });
}
