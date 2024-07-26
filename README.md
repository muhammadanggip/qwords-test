## Installation

1. Unzip the downloaded archive
2. Copy and paste folder in your **projects** folder. Rename the folder to your project's name
3. In your terminal run `composer install`
4. Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
5. Create new database in your local server (example : laravel_db)
6. in your `.env` change `.DB_DATABASE` to your new database (example : laravel_db)
7. In your terminal run `php artisan key:generate`
8. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
9. Run `php artisan storage:link` to create the storage symlink (if you are using **Vagrant** with **Homestead** for development, remember to ssh into your virtual machine and run the command from there).

## Demo Account
Email : admin@qwords.com
Password : admin
