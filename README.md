# Space Editorial Rule Engine

This repository hosts the rebuilt Space Editorial stack (Laravel backend + React frontend) that previously lived in the `highwaysniper` workspace.

## Frontend Getting Started

```bash
cd frontend
npm install
npm run dev
```

Set `VITE_API_BASE_URL` and `VITE_API_TOKEN` in `frontend/.env.local`. Generate the token from the admin panel (Users → Edit → “Regenerate API token”). Frontend requests now require this bearer token via Sanctum. Optionally set `VITE_SITE_BASE_URL` so SEO metadata (canonical/OG URLs) point at the correct origin. If you alter `FRONTEND_ORIGINS` in the backend, run `php artisan config:clear` to refresh CORS settings.

## Backend Getting Started

```bash
cd backend
cp .env.example .env   # adjust DB credentials if needed
composer install
php artisan migrate --seed  # includes demo content for the frontend
php artisan serve --host=127.0.0.1 --port=8001
```

Set `APP_SITE_URL` in `backend/.env` to the public-facing domain that serves the React app so transactional emails can link to the correct pages (for example `https://spaceeditorial.com`).

Initial authentication scaffolding comes from Laravel Breeze (Blade). The admin area lives under `/admin` once you sign in.

### Default Admin Access

- Email: `admin@spaceeditorial.test`
- Password: `SpaceEditorial@2025`

Change these credentials after first login and regenerate the API token via Admin → Users.

### User Roles

- `admin` – full access, can manage other users and issues API tokens.
- `editor` – content-focused role without API token privileges.

Use the Admin → Users screen to set or update a user’s role. At least one administrator must remain in the system.

### Scheduled Content Sync

- `php artisan external:sync` – sync all providers
- `php artisan external:sync {slug}` – sync a single provider
- `backend/scripts/sync_news.sh` – shell wrapper for cron usage

## Visitor Analytics

- **Endpoint** – The Laravel single-action `VisitLogController` is exposed at `POST /tracking/visit` (route name `tracking.visit`) and is exempt from CSRF protection for external calls.
- **Database** – Run `php artisan migrate` after pulling changes that introduce the `visit_logs` table so the tracker can persist incoming events.
- **Frontend** – The React app now injects `/js/visit-tracker.js`. Set `VITE_TRACKING_BASE_URL` (or ensure `VITE_API_BASE_URL`) to the public URL of the Laravel backend so the script loads correctly. Example:

  ```bash
  # frontend/.env.local
  VITE_API_BASE_URL=https://api.spaceeditorial.test
  # Optional if the API base differs from the public URL that serves assets
  VITE_TRACKING_BASE_URL=https://admin.spaceeditorial.test
  ```

  The visitor tracking script must be available wherever the frontend is deployed; otherwise, visits will not be recorded.

## Newsletter Subscribers

- **Endpoint** – Public `POST /newsletter/subscribe` accepts an email address, reactivating existing subscribers when needed.
- **Database** – A `subscribers` table persists address, status, and timestamps so readers can later graduate to authenticated accounts.
- **Frontend** – The home page includes a signup banner. Ensure `FRONTEND_ORIGINS` in `.env` allows your Vite host (e.g. `http://127.0.0.1:5173`) and run `php artisan config:clear` after editing.
- **Admin** – The “Subscribers” navigation entry lists addresses with filters and pagination; totals bubble up to the dashboard cards.

After deploying, run migrations to create the table:

```bash
php artisan migrate
```

## SEO Enhancements

- The frontend now injects structured metadata via `react-helmet-async`: canonical URLs, Open Graph, Twitter cards, and JSON-LD for the homepage, category collections, search pages, and individual articles.
- Set `VITE_SITE_BASE_URL` (frontend) so canonical and JSON-LD links resolve to your production hostname.
- Supply a real logo image at `/public/assets/logo.png` for the publisher/organization schema or adjust the path in `HomePage.tsx` and `BlogDetailPage.tsx`.
- Search pages emit canonical URLs with pagination; set `FRONTEND_ORIGINS` in backend `.env` for bots hitting the newsletter endpoint to avoid CORS errors.

## External API Sources

The **Admin → Sources** screen maps to the `external_sources` table. Each provider record uses the following defaults:

| Provider       | Driver key     | Base URL example                     | Required secret field          |
|----------------|----------------|--------------------------------------|--------------------------------|
| MediaStack     | `mediastack`   | `https://api.mediastack.com/v1`      | `api_key` = `<MEDIASTACK_API_KEY>`
| The News API   | `thenewsapi`   | `https://api.thenewsapi.com/v1`      | `api_key` = `<THENEWSAPI_TOKEN>`
| NewsAPI.org    | `newsapi`      | `https://newsapi.org/v2`             | `api_key` = `<NEWSAPI_KEY>`

Supply the key directly on the source record in the admin UI. Optional query overrides (e.g. `languages`, `limit`, `page_size`) can be entered as JSON in the **Config** textarea:

```json
{
  "languages": "en",
  "limit": 25
}
```

After updating credentials you can refresh content via Artisan:

  ```bash
  php artisan content:purge        # optional cleanup
  php artisan external:sync        # fetch from every active source
  php artisan content:cleanup-footers  # scrub legacy posts of boilerplate footers (add --dry-run to inspect first)
  ```

  Alternatively, trigger a single-source sync from **Admin → Sources** using the **Sync** button.

## Production Deployment

### Backend (Laravel)

- Provision a PHP 8.3+ runtime with the usual extensions (`bcmath`, `curl`, `json`, `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`). Point the webroot at `backend/public`.
- Copy `backend/.env.example` to `backend/.env` and set production values: database credentials, `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL`, `FRONTEND_ORIGINS`, mail provider settings, and any external source keys.
- Run `composer install --no-dev --optimize-autoloader` inside `backend/`, then `php artisan key:generate` if this is a fresh install.
- Compile the Blade asset bundle: `npm ci` (or `npm install`) followed by `npm run build` inside `backend/`. Commit the generated `public/build` directory or deploy it with the release artifact.
- Execute database migrations with force flag (`php artisan migrate --force`) and optionally seed demo data (`php artisan db:seed --force`) if you need sample content.
- Cache configuration and routes for performance: `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`.
- Configure a process manager (Supervisor/systemd) for any queued jobs you enable and register a cron entry for `php artisan schedule:run` every minute to drive syncs (`external:sync`) and housekeeping commands.
- Ensure `public/js/visit-tracker.js` is world-readable; the frontend embed relies on this path to log visits.

### Frontend (React)

- Inside `frontend/`, create `.env.production` (or whatever your host expects) with `VITE_API_BASE_URL`, `VITE_API_TOKEN`, and `VITE_TRACKING_BASE_URL` if the tracking endpoint lives on a separate hostname.
- Build the bundle in four steps:
  1. `cd frontend`
  2. `npm ci` (or `npm install` if CI caches are unavailable)
  3. `npm run build` to emit the optimized assets into `frontend/dist/`
  4. Deploy the contents of `dist/` to your static host or CDN edge.
- If you serve the frontend from the same origin as the backend, proxy API calls to `backend/public/index.php` and expose `/js/visit-tracker.js` so analytics continue to function.
- After each release, invalidate caches (CDN, Cloudflare, etc.) to pick up fresh metadata and tracking script updates.

### Shared Hosting Deployment (Folder Install)

When the project lives inside a folder on shared hosting (for example `public_html/spaceeditorial/`), follow the usual backend/frontend build steps above and then:

- Upload the repository so that `backend/`, `frontend/`, and `docs/` sit inside that folder.
- Point the domain/subdomain to `backend/public` if your control panel allows custom document roots. The existing `backend/public/.htaccess` already contains the rewrite rules Laravel needs.
- If you *cannot* change the document root, drop the following `.htaccess` file next to `backend/`:

  ```apache
  <IfModule mod_rewrite.c>
      RewriteEngine On

      # Skip if the request already targets the public directory
      RewriteRule ^backend/public/ - [L]

      # Serve existing files/directories from backend/public without hitting index.php
      RewriteCond %{DOCUMENT_ROOT}/backend/public/$1 -f
      RewriteRule ^(.*)$ backend/public/$1 [L]

      RewriteCond %{DOCUMENT_ROOT}/backend/public/$1 -d
      RewriteRule ^(.*)$ backend/public/$1/ [L]

      # Fall back to Laravel's front controller
      RewriteRule ^ backend/public/index.php [L]
  </IfModule>
  ```

  Adjust the `RewriteRule` paths if you rename the folder. Keep the existing `backend/public/.htaccess`; it continues to handle Laravel’s internal routing once requests are forwarded.
- Update `APP_URL` in `backend/.env` to include the folder segment (e.g. `https://example.com/spaceeditorial`).
- Clear and cache Laravel configuration after every `.env` edit: `php artisan config:clear && php artisan config:cache`.
- Confirm that `/docs/index.html` (internal handbook) still resolves in the hosted environment. If the docs live outside `backend/public`, replicate or symlink them under `backend/public/docs/` so the rewrite rules can reach them.

### Post-Deployment Checklist

- Run `php artisan migrate --force` after every release that ships new migrations.
- Verify the admin dashboard at `/admin` loads charts and stats, confirming the visit tracker bundle is present.
- Trigger `php artisan external:sync` manually or wait for the scheduler to confirm content ingestion works with the new environment variables.

## Helpful Artisan Commands

| Command | Description |
|---------|-------------|
| `php artisan migrate --seed` | Runs all migrations and seeds demo data for the frontend. |
| `php artisan migrate` | Runs database migrations without seeding. |
| `php artisan migrate:fresh --seed` | Drops all tables, re-runs migrations, and seeds. Useful for a full reset. |
| `php artisan serve --host=127.0.0.1 --port=8001` | Starts the Laravel development server on localhost:8001. |
| `php artisan external:sync` | Fetches content from every active external source. Use `--force` to reimport existing posts. |
| `php artisan external:sync {slug}` | Syncs a single external source by slug. |
| `php artisan content:purge` | Truncates posts and visit logs (add `--all` to remove categories/subcategories/mappings too). |
| `php artisan content:cleanup-footers` | Removes trailing boilerplate phrases/scripts from stored posts (use `--dry-run` to preview changes). |
| `php artisan route:clear` | Clears the route cache (useful after editing routing). |
| `php artisan config:clear` | Clears the configuration cache, ensuring `.env` updates take effect. |

Run commands from the `backend/` directory unless noted otherwise.

## Repository Structure

- `backend/` – Laravel 12 API + admin panel, Sanctum-authenticated endpoints, ingestion services.
- `frontend/` – React 18 + Vite application.

## Contributing

1. Create a feature branch.
2. Make your changes with tests.
3. Open a pull request referencing the related issue. 

Note: Will add later
