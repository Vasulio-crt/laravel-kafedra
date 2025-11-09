if [ -f ../laravel/artisan ]; then
    echo "Laravel project already exists. Skipping installation."
    exit 0
fi

echo ">>> Creating Laravel project..."
docker-compose exec php composer create-project --prefer-dist laravel/laravel .

echo ">>> Setting permissions for storage and cache directories..."
docker-compose exec php chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache

echo ">>> Creating .env file..."
sudo cp .env.example ../laravel/.env

# echo ">>> Generating application key..."
# docker-compose exec php php artisan key:generate

echo ">>> Running database migrations..."
docker-compose exec php php artisan migrate

# echo ">>> Clearing application cache..."
# docker-compose exec php php artisan cache:clear

echo "Laravel setup completed successfully!"