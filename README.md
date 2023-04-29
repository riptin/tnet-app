## Tnet App

## Setup:

• run: composer install
• setup .env file
• php artisan key:generate
• run: php artisan migrate:fresh --seed
• run: php artisan serve

## Routes:

• Post - /add-product/{productId}
• Post - /remove-product/{productId}
• Post - /set-product-quantity/{productId}/{quantity}
• Get - /cart
