## Install back-end

- *copy .env
- composer install
- php artisan key:generate
- php artisan migrate --seed   ||   php artisan migrate:fresh --seed (run 'composer du'  - if some errors)
- php artisan vendor:publish --tag=assets --force
- php artisan vendor:publish --provider="VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider" --force
- mkdir  public/images/shop

## Help

- php artisan ide-helper:meta
- php artisan ide-helper:generate 
- php artisan ide-helper:models
- php artisan sleepingowl:ide:generate

## Add to .env

- FACEBOOK_KEY=265524840636828
- FACEBOOK_SECRET=b90aa1cd10018a3ee61ef032efbf7a92
- FACEBOOK_REDIRECT_URI=http://creative/social_login/callback/facebook
