# Laravel-API-JWT
# 1 - install laravel .
# 2- install laravel jwt
https://jwt-auth.readthedocs.io/en/develop/laravel-installation/

# $ composer require tymon/jwt-auth

after install
# * note in providers
        'Tymon\JWTAuth\Providers\JWTAuthServiceProvider',

# * note in  aliases
        'JWTAuth' => 'Tymon\JWTAuth\Facades\JWTAuth', 
        'JWTFactory' => 'Tymon\JWTAuth\Facades\JWTFactory',

# $ php artisan jwt:generate

# *  note jwt:generate if error in handle not found go to 
"/opt/lampp/htdocs/application/php-getting-started/web/laravel_api/vendor/tymon/
jwt-auth/src/Commands/JWTGenerateCommand.php"

add that in it:
    public function handle()
    {
        $this->fire();
    }
# $ php artisan jwt:generate

 # 3- in app/http/Kernal.php add  middelware:
        'jwt.auth'=>'Tymon\JWTAuth\Middleware\GetUserFromToken',
        'jwt.refresh'=>'Tymon\JWTAuth\Middleware\RefreshToken',
# 4- in route api.php use middelware jwt.auth

Route::middleware('jwt.auth')->group(function () {
   // Route::apiResource('books', 'API\BookController');
});


# Dev_ME_BEST
