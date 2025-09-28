# Space Editorial Rule Engine

This repository hosts the rebuilt Space Editorial stack (Laravel backend + React frontend) that previously lived in the `highwaysniper` workspace.

## Frontend Getting Started

```bash
cd frontend
npm install
npm run dev
```

Set `VITE_API_BASE_URL` and `VITE_API_TOKEN` in `frontend/.env.local`. The token can be generated from the admin panel (Users → Edit → “Regenerate API token”).

## Backend Getting Started

```bash
cd backend
cp .env.example .env   # adjust DB credentials if needed
composer install
php artisan migrate
php artisan serve --host=127.0.0.1 --port=8001
```

Initial authentication scaffolding comes from Laravel Breeze (Blade). The admin area lives under `/admin` once you sign in.

### Scheduled Content Sync

- `php artisan external:sync` – sync all providers
- `php artisan external:sync {slug}` – sync a single provider
- `backend/scripts/sync_news.sh` – shell wrapper for cron usage

## Repository Structure

- `backend/` – Laravel 12 API + admin panel, Sanctum-authenticated endpoints, ingestion services.
- `frontend/` – React 18 + Vite application.

## Contributing

1. Create a feature branch.
2. Make your changes with tests.
3. Open a pull request referencing the related issue.
