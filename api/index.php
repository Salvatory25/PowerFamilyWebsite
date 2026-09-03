<?php

// 1. Prepare writeable directories in /tmp for Vercel Serverless environment
$storagePaths = [
    '/tmp/storage/bootstrap',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
];

foreach ($storagePaths as $path) {
    if (!is_dir($path)) {
        @mkdir($path, 0755, true);
    }
}

// 2. Prepare writable SQLite Database file in /tmp
$dbSource = __DIR__ . '/../database/database.sqlite';
$dbTarget = '/tmp/database.sqlite';

if (!file_exists($dbTarget) || filesize($dbTarget) === 0) {
    if (file_exists($dbSource) && filesize($dbSource) > 0) {
        @copy($dbSource, $dbTarget);
    } else {
        @touch($dbTarget);
    }
}

// 3. Fallback Static File Handler (Ensures CSS/JS/Assets always load)
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH));
$publicFile = __DIR__ . '/../public' . $uri;

if ($uri !== '/' && !empty($uri) && file_exists($publicFile) && !is_dir($publicFile)) {
    $extension = strtolower(pathinfo($publicFile, PATHINFO_EXTENSION));
    $mimeTypes = [
        'css'   => 'text/css',
        'js'    => 'application/javascript',
        'json'  => 'application/json',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'ico'   => 'image/x-icon',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
        'webp'  => 'image/webp',
    ];
    if (isset($mimeTypes[$extension])) {
        header('Content-Type: ' . $mimeTypes[$extension]);
    }
    header('Cache-Control: public, max-age=31536000');
    readfile($publicFile);
    exit;
}

// 4. Set runtime environment variables across putenv, $_ENV, and $_SERVER
$appKey = getenv('APP_KEY') ?: 'base64:G4dJQTj748dhrF9Gd98BLK8oZWJEmVC+RHJ/wAZLjMw=';

$runtimeEnvs = [
    'VERCEL' => '1',
    'APP_ENV' => getenv('APP_ENV') ?: 'production',
    'APP_KEY' => $appKey,
    'APP_DEBUG' => getenv('APP_DEBUG') ?: 'false',
    'APP_STORAGE' => '/tmp/storage',
    'APP_SERVICES_CACHE' => '/tmp/storage/bootstrap/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/storage/bootstrap/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/storage/bootstrap/config.php',
    'APP_ROUTES_CACHE' => '/tmp/storage/bootstrap/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/storage/bootstrap/events.php',
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
    'CACHE_STORE' => 'array',
    'CACHE_DRIVER' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'QUEUE_CONNECTION' => 'sync',
    'LOG_CHANNEL' => 'stderr',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => $dbTarget,
];

foreach ($runtimeEnvs as $key => $val) {
    putenv("$key=$val");
    $_ENV[$key] = $val;
    $_SERVER[$key] = $val;
}

// 5. Handle request with exception logging
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    error_log('Vercel Serverless Exception: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
    echo '<h1>Power Family Investment Serverless Diagnostic</h1>';
    echo '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ':' . $e->getLine() . '</p>';
    echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}
