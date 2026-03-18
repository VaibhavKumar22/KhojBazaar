# KhojBazaar

PHP + MySQL marketplace portal, organized for cleaner deployment.

## Project Structure

- `frontend/` - all UI pages (`login.php`, `register.php`, `dashboard.php`, `sell.php`, etc.)
- `backend/` - shared PHP backend helpers (`config.php`, `cloudinary.php`, DB setup scripts)
- `photo/` - static media and uploads (`imgae.png`, `uploads/`, `assets/`)
- `database/` - SQL schema dumps for initial import
- `index.php` - root redirect to `frontend/index.php`

## Quick Deploy

1. Copy `.env.example` to `.env` and set database credentials.
   - For non-XAMPP hosting, set `DB_HOST`, `DB_PORT`, `DB_USER`, `DB_PASS`.
   - If your database names differ, update `DB_USERS_NAME` and `DB_ADMINS_NAME` (and other DB name vars if needed).
2. Import SQL files:
   - `database/busweb_users.sql`
   - `database/busweb_admins.sql`
   - `database/busweb.sql`
   - `database/businesswebsite.sql`
   - `database/business_portal.sql`
3. Run `composer install`.
4. Ensure `photo/uploads/` is writable by the web server.
5. Add missing media files listed in `DEPLOYMENT_CHECKLIST.md`.
6. (Optional) Add Cloudinary credentials to upload images directly to cloud.

## Notes

- DB connection settings are centralized in `backend/config.php`.
- Cloudinary upload helper is in `backend/cloudinary.php` and used by `frontend/sell.php`.
- Current storage is MySQL (`mysqli`) and works on both XAMPP and hosted PHP/MySQL servers.


