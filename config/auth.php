<?php

return [
    'auth_signing_key_file' => storage_path('app/auth') . '/auth.pub',
    'auth_url' => env('AUTH_URL', 'http://localhost:8000'),
    'auth_client_name' => env('AUTH_CLIENT_NAME', 'my-client'),
    'auth_client_secret' => env('AUTH_CLIENT_SECRET', 'my-secret'),
];
