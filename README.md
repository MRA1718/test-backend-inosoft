<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Test Backend Inosoft




## API Documentation

[Documentation](https://documenter.getpostman.com/view/7330081/2s93m4Z3yA)


## Installation

- Clone/download the project
- Move into project folder
- Run "**Composer Install**"
- Change DB inside .env file into

```php
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=test-BE-inosoft-db
DB_USERNAME=
DB_PASSWORD=
```

- Run "**php artisan key:generate**"
- Make sure to migrate database using "**php artisan migrate**"
- Use "**php artisan migrate --seed**" to genereate dummy database
- Last, run "**php artisan serve**" to run and test the API  
