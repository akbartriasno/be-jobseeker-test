## API BACKEND
Using PHP 8.2 and Node 18.17 LTS


1. Jalankan perintah 
~~~
composer install && npm install && php artisan key:generate
~~~
2. Copy file .env.example menjadi .env
3. Sesuaikan environtment database mysql
4. Jalankan perintah
~~~
php artisan migrate:fresh --seed --seeder=CandidateSeeder
~~~
6. API Documentation menggunakan Swagger, jadi jalankan perintah npm run build
7. Start server menggunakan perintah
~~~
php artisan serve --host=127.0.0.1 --port=38080
~~~

