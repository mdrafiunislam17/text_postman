
## API Installation & setup

composer require dedoc/scramble

php artisan vendor:publish --provider="Dedoc\Scramble\ScrambleServiceProvider" --tag="scramble-config"

php artisan Make:Controller TodoController --resource
php artisan Make:resource TodoResource
php artisan Make:resource TodoCollection


