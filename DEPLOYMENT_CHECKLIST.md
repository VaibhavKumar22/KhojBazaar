# Deployment Checklist

## Required Files Present

- Core PHP pages and handlers
- SQL schema dumps in `database/`
- `composer.json`
- Shared DB config: `backend/config.php`
- Environment template: `.env.example`

## Required Before Production Deploy

1. Install PHP dependencies:
   - `composer install`
2. Import SQL files from `database/` into your MySQL server.
3. Create real environment file:
   - copy `.env.example` to `.env`
   - set `DB_HOST`, `DB_PORT`, `DB_USER`, `DB_PASS`
   - verify DB name vars if your hosting names are different:
     - `DB_USERS_NAME`
     - `DB_ADMINS_NAME`
     - `DB_MAIN_NAME`
     - `DB_WEBSITE_NAME`
     - `DB_PORTAL_NAME`
     - `DB_LOGIN_NAME`
   - optional Cloudinary vars:
     - `CLOUDINARY_CLOUD_NAME`
     - `CLOUDINARY_API_KEY`
     - `CLOUDINARY_API_SECRET`
     - `CLOUDINARY_UPLOAD_FOLDER` (optional)
4. Ensure directories:
   - `photo/uploads/` exists and is writable
5. Add missing media assets referenced by pages:
   - `indianstreet.jpg`
   - `login.mp4`
   - `indianstreet.mp4`
   - `indexstreet.mp4`

## Recommended Cleanup

- Keep only one `start.php` file and archive/delete duplicate copies.
- Rename `imgae.png` to `image.png` and update references when ready.
- Static assets are now grouped under `photo/`.

## Database Platform

- This app currently uses MySQL (`mysqli`) everywhere.
- If you want MongoDB Atlas, code refactor is required across auth, listings, and password-reset flows.

## XAMPP-Free Deploy (Shared Hosting/VPS)

1. Upload the project to server (`public_html` or your web root).
2. Make sure web root points to this project folder (where root `index.php` exists).
3. Create a MySQL database from hosting panel (or server CLI).
4. Import SQL files from `database/`.
5. Set `.env` values for production DB and Cloudinary.
6. Set write permission for `photo/uploads/` (example: 755 or hosting-appropriate owner/group).
7. Verify login, registration, sell listing, image upload, and dashboard pages.


