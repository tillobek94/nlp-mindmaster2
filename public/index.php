<?php

// Batafsil error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');

define('LARAVEL_START', microtime(true));

// Debug uchun
echo "<!-- Debug: Starting Laravel -->\n";

// Autoloader tekshirish
$autoload = __DIR__.'/../vendor/autoload.php';
if (!file_exists($autoload)) {
    die('<h1>Error: Vendor autoload not found at: ' . $autoload . '</h1>');
}

require $autoload;
echo "<!-- Debug: Autoload loaded -->\n";

// App yaratish
$app = require_once __DIR__.'/../bootstrap/app.php';
echo "<!-- Debug: App created -->\n";

// Kernel yaratish
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
echo "<!-- Debug: Kernel created -->\n";

// Request
$request = Illuminate\Http\Request::capture();
echo "<!-- Debug: Request captured -->\n";

// Response
$response = $kernel->handle($request);
echo "<!-- Debug: Response handled -->\n";

$response->send();
echo "<!-- Debug: Response sent -->\n";

$kernel->terminate($request, $response);
echo "<!-- Debug: Terminated -->\n";
