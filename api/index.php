<?php

// 1. Prepare writeable directories in /tmp for Vercel Serverless environment
$storagePaths = [
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

// 2. Set runtime environment variables
putenv('VERCEL=1');
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('CACHE_STORE=array');
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=file');
putenv('QUEUE_CONNECTION=sync');
putenv('LOG_CHANNEL=stderr');
putenv('DB_CONNECTION=sqlite');

// 3. Handle request
require __DIR__ . '/../public/index.php';
