# RESU - SDI Projects

This is the repo for RESU from SDI.

## Initial Requirements

1. XAMPP with server requirement:
    - PHP >= 7.1.3
    - BCMath PHP Extension
    - Ctype PHP Extension
    - JSON PHP Extension
    - Mbstring PHP Extension
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
2. Git
3. Composer
4. Text Editor (Notpad++, Sublime, Atom, VSCode, etc)

## Installation Procedure

Follow this guide for installation on windows environment using XAMPP
1. Clone this repository `git clone https://github.com/halimtuhu/resu-sdi.git`
2. Make sure repo is in `master` branch `git checkout master`
3. Install all dependency packages by run `composer install`
4. Copy .env.example to .env `cp .env.example .env`
5. Create new database with name `resu_sdi`
6. Modify `.env` configuration to match with local database
    ```$xslt
    APP_NAME=RESU
    APP_ENV=local
    APP_KEY=base64:ZYl+f7xLgOf5Xrr96bo6c/ClLqmRqmcQaXeak+KdZVg=
    APP_DEBUG=true
    APP_URL=http://localhost:8000
    
    LOG_CHANNEL=stack
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=resu_sdi
    DB_USERNAME=root
    DB_PASSWORD=
    ```
7. Run `php artisan key:generate`
8. Run `php artisan migrate --seed`
9. Run `php artisan key:generate`
10. Test application by running `php artisan serve`


## Deployment