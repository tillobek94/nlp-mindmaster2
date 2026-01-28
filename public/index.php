<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Error reporting yoqish
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Debug uchun
if (!file_exists(__DIR__.'/../vendor/autoload.php')) {
    die('Vendor autoload not found');
}

require __DIR__.'/../vendor/autoload.php';

// Debug: composer yuklanganini tekshirish
if (!class_exists('Illuminate\Foundation\Application')) {
    die('Laravel classes not loaded');
}

$app = require_once __DIR__.'/../bootstrap/app.php';

// Debug: app yaratilganini tekshirish
if (!$app) {
    die('Application not created');
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
