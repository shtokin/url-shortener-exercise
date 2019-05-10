#URL Shortener Exercise

##Installation
- Create MySQL database.
- `git clone`
- Check if *.env* file exist. If not - create it from *.env.example* file.
- Check configuration in file *.env*
- `composer install`
- `php artisan key:generate`.
- `php artisan migrate`.
- Run `php artisan serve` to use PHP's built-in development server. 
By default it starts at localhost:8000.
Or you can use Apache web server instead,

##Environment requirements

- MySQL >= 5.6
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

##Description

- app/Url.php - model for urls
- app/Http/Controllers/UriController.php - controller
- app/Services/ShortenerService.php - service for creating short urls.
- resources/views/*.blade.php - views

If you made changes in .env after installation it may be necessary to run `php artisan config:cache`.

##Testing

Test list:
- tests/Feature/UrlControllerTest.php
- tests/Unit/ShortenerServiceTest.php


Run `vendor/bin/phpunit` for Unit Tests