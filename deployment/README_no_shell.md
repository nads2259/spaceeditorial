# Deployment Without Shell Access

If your hosting environment does not expose SSH or direct shell access, you can still deploy by running the necessary commands on your own workstation (or any machine with PHP/Node installed), then uploading the generated artifacts via SFTP/File Manager.

## 1. Prepare the Backend Locally

1. Clone the repository and check out the commit you want to deploy.
2. Copy `backend/.env.example` to `backend/.env` and fill in production values (database, mailer, `APP_SITE_URL`, etc.).
3. Run the commands listed in [`backend_setup.php`](backend_setup.php) via `php backend_setup.php` from your local terminal. They install Composer dependencies, run migrations, cache configuration, and build backend assets.
4. Zip the entire `backend/` directory (including the newly created `vendor/` folder and `public/build/` assets) and upload it to the shared host. Ensure the hosting control panel points the document root at `backend/public` or use the `.htaccess` override documented in the main README.
5. After uploading, double check that the writable directories (`storage/`, `bootstrap/cache/`) have the correct permissions via the hosting control panel.

### Triggering Migrations Without Shell

If the host will not run the Artisan commands for you, open a support ticket and provide the relevant section from `backend_setup.php` (steps 3-5). Alternatively, temporarily upload a small PHP script that calls `Artisan::call('migrate', ['--force' => true]);` and remove it immediately after it runs.

## 2. Prepare the Frontend Locally

1. From the repository root run [`frontend_build.php`](frontend_build.php) (`php frontend_build.php`). This installs Node dependencies and produces a production bundle inside `frontend/dist/`.
2. Upload the contents of `frontend/dist/` to your static hosting directory (or `/public_html` if the same server handles static files). If the frontend and backend share a domain, configure rewrites so that `/blog/*` etc. resolve correctly.
3. Update the backend `.env` values `FRONTEND_ORIGINS` and the frontend `.env.production` values (`VITE_API_BASE_URL`, `VITE_SITE_BASE_URL`, `VITE_TRACKING_BASE_URL`) to the live URLs. Rebuild the frontend bundle if you change these values.

## 3. Post-Upload Checklist

- Confirm the welcome emails render with correct links by subscribing and registering through the live site.
- Visit `/admin/email-broadcasts` to ensure the metrics row and broadcast history load.
- Purge CDN or hosting caches so the new `visit-tracker.js` and frontend assets take effect.

Keep this directory (`deployment/`) updated whenever the deployment flow changes so non-SSH environments remain supported.
