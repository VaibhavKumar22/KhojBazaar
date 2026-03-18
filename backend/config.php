<?php
/**
 * Centralized database configuration for deployment.
 * Works on XAMPP and production hosting.
 */

function load_env_file(string $filePath): void
{
    if (!file_exists($filePath)) {
        return;
    }

    $envLines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($envLines as $line) {
        $trimmedLine = trim($line);
        if ($trimmedLine === '' || strpos($trimmedLine, '#') === 0 || strpos($trimmedLine, '=') === false) {
            continue;
        }

        [$key, $value] = explode('=', $trimmedLine, 2);
        $key = trim($key);
        $value = trim($value);
        if ($key === '') {
            continue;
        }

        putenv("$key=$value");
        $_ENV[$key] = $value;
    }
}

// Prefer project-root .env, fallback to backend/.env.
load_env_file(dirname(__DIR__) . '/.env');
load_env_file(__DIR__ . '/.env');

$DB_HOST = getenv('DB_HOST') ?: 'localhost';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';
$DB_PORT = (int) (getenv('DB_PORT') ?: 3306);

function get_database_name(string $type): string
{
    $databaseMap = [
        'users' => getenv('DB_USERS_NAME') ?: 'busweb_users',
        'admins' => getenv('DB_ADMINS_NAME') ?: 'busweb_admins',
        'main' => getenv('DB_MAIN_NAME') ?: 'busweb',
        'website' => getenv('DB_WEBSITE_NAME') ?: 'businesswebsite',
        'portal' => getenv('DB_PORTAL_NAME') ?: 'business_portal',
        'login' => getenv('DB_LOGIN_NAME') ?: 'login_db',
    ];

    return $databaseMap[$type] ?? $databaseMap['main'];
}

function create_db_connection(?string $database = null): mysqli
{
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_PORT;

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $database, $DB_PORT);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $conn->set_charset('utf8mb4');
    return $conn;
}


