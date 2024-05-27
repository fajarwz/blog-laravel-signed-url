# Temporary Signed URLs in Laravel for Secure Password Resets
This is an implementation of Laravel CRUD tutorial. A blog about this can be found here: [Temporary Signed URLs in Laravel for Secure Password Resets | Fajarwz](https://fajarwz.com/blog/temporary-signed-urls-in-laravel-for-secure-password-resets/).

## Installation

### Composer Packages 
```
composer install
```

## Configuration

### Create `.env` file from `.env.example`
```
cp .env.example .env
```

### Generate Laravel App Key
```
php artisan key:generate
```

### Database Integration
1. Open `.env` file
2. Create a database and connect it with Laravel with filling the DB name in `DB_DATABASE` key
3. Adjust the `DB_USERNAME`
4. Adjust the `DB_PASSWORD`

### Migrate the Database Migration
```
php artisan migrate
```

## Run App
Run local web server
```
php artisan serve
```
