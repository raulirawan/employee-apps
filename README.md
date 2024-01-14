# EMPLOYEE APPS
Make Sure Your PHP Version >= 8.0

## Installation


```sh
git clone https://github.com/raulirawan/employee-apps.git
cd employee-apps
composer install
cp .env.example .env
php artisan key:generate
npm install
```
For development...

```sh
npm run dev
```
For production...

```sh
npm run prod
```
Create a database in MySQL and fill the database details DB_DATABASE in .env file.

The below command will create tables into database using Laravel migration and seeder.

```sh
php artisan migrate:fresh --seed 
```

## Default Login Admin

| Email | Password |
| ------ | ------ |
| admin@admin.com | 123123 |

