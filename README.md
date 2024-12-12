# Appointment
Saya menggunakan Laravel Herd untuk pembuatan project, namun saya berikan tutorial pembuatan secara manual

## How to
1. Create project 
```
laravel new appointment
cd appointment
```
2. Install Dependencies
```
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
npm run dev
```
4. Cek isi package.json lalu pastikan isi "devDependencies" sama dengan ini:
```
"devDependencies": {
        "@tailwindcss/forms": "^0.5.2",
        "alpinejs": "^3.4.2",
        "autoprefixer": "^10.4.2",
        "axios": "^1.7.4",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^1.0",
        "postcss": "^8.4.31",
        "tailwindcss": "^3.1.0",
        "vite": "^5.0"
    }
```
5. Salin code di .env.example ke .env & pastikan parameter database sesuai dengan ini
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_poli
DB_USERNAME=root
DB_PASSWORD=adminroot (kosongkan jika db tidak menggunakan password)
```
6. Ganti APP_URL pada .env
```
http://localhost:8000
```
7. Run app
```
php artisan serve
npm start
```

###### Notes: Pastikan semua dependencies sudah benar, dan lakukan ```npm run build``` sebelum deploy ke server production (opsional)
