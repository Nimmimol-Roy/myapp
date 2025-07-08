git clone https://github.com/Nimmimol-Roy/myapp.git
cd myapp
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
chmod 664 database/database.sqlite
php artisan migrate

// for docor set if we need
docker compose up -d --build
docker compose exec app composer install

