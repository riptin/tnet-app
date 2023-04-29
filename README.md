# Tnet App

## Setup:
• Run *composer install*  
• Copy *.env.example* and rename to *.env*  
• Run *php artisan key:generate*  
• Enable *pdo_sqlite* in *php.ini*  
• Run *php artisan migrate --seed*  
• Run *php artisan serve*  

## Routes:
• Post - /add-product/{productId}  
• Post - /remove-product/{productId}  
• Post - /set-product-quantity/{productId}/{quantity}  
• Get - /cart  
