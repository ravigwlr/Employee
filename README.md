# Employee
Usage
This is not a package - it's a full Laravel project that you should use as a starter boilerplate, and then add your own custom functionality.

Clone the repository with git clone
Copy .env.example file to .env and edit database credentials there
Run composer install
Run php artisan key:generate
Run php artisan migrate
Run php artisan db:seed
With that user you can create more roles/permissions/users, and then use them in your code, by using functionality like Gate or @can, as in default Laravel.
