## API BACKEND
Using PHP 8.2 and Node 18.17 LTS

<ol>
    <li>Jalankan perintah </li>
    <li>Copy file .env.example menjadi .env</li>
    <li>Sesuaikan environtment database mysql</li>
    <li>Jalankan perintah php artisan migrate:fresh --seed --seeder=CandidateSeeder</li>
    <li>API Documentation menggunakan Swagger, jadi jalankan perintah npm run build</li>
    <li>Start server menggunakan perintah php artisan serve --host=127.0.0.1 --port=38080</li>
</ol>
```
composer install && npm install && php artisan key:generate
```
