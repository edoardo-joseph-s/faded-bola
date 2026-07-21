<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Credentials
    |--------------------------------------------------------------------------
    |
    | Atur username dan password hash di file .env.
    | Generate hash: php artisan tinker -> echo \Illuminate\Support\Facades\Hash::make('password_anda')
    |
    */

    'username' => env('ADMIN_USERNAME', 'admin'),
    'password' => env('ADMIN_PASSWORD'),

];
