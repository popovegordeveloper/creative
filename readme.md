## Install back-end

- *copy .env
- composer install
- php artisan key:generate
- php artisan migrate --seed   ||   php artisan migrate:fresh --seed (run 'composer du'  - if some errors)
- php artisan vendor:publish --tag=assets --force
- php artisan vendor:publish --provider="VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider" --force

## Help

- php artisan ide-helper:meta
- php artisan ide-helper:generate 
- php artisan ide-helper:models
- php artisan sleepingowl:ide:generate