## __Instalasi__

<h4>Clone repository</h4>

```sh
git clone https://github.com/sadam21x/kemiri-project.git
```
<h4>Masuk ke direktori project</h4>

```sh
cd kemiri-project/
```
<h4>Copy file .env.example dan beri nama .env , sesuaikan konfigurasi database</h4>

```sh
cp .env.example .env
```
<h4>Install composer dependencies (vendor)</h4>

```sh
composer install
```
<h4>Generate application key</h4>

```sh
php artisan key:generate
```
<h4>Jalankan migration</h4>

```sh
php artisan migrate
```
<h4>Jalankan seeder Laravolt Indonesia</h4>

```sh
php artisan laravolt:indonesia:seed
```
<h4>Jalankan seeder database utama</h4>

```sh
php artisan db:seed --class=DatabaseSeeder
```