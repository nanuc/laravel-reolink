## Installation
`composer require nanuc/laravel-reolink`

Add the following to your `config/services.php` and add the values to your `.env`:
```
'reolink' => [
    'endpoint' => env('REOLINK_ENDPOINT'),
    'username' => env('REOLINK_USERNAME', 'admin'),
    'password' => env('REOLINK_PASSWORD', ''),
],
```

