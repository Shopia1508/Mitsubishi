<?php

// Paksa memuat autoloader vendor secara rapi
require __DIR__ . '/../vendor/autoload.php';

// Paksa mendaftarkan bootstrap engine agar class [view] otomatis terbaca
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Jalankan aplikasi melalui kernel web global
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);