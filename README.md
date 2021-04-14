## About Application Warehouse

There is an app where a user can manage his warehouse. Users is able to Create, Update, Delete products. Products  have different types and few description fields (color, active etc.).



### General requirements for application environment:
- php 7.4
- laravel 8.12
- mysql 8.0

## Project Installing

- clone project from repository   https://github.com/Ryttis/warehouse.git
- composer install
- npm install
- docker-compose up -d
- .env.example change into .env 
- DB_PASSWORD=root  
- php artisan migrate:fresh --seed
- php artisan storage:link 
- php artisan key:generate  
- php artisan serve

## Project launching & credencials

- launch project on localhost:8000
- during database seeding fake user will be created:
#### email -> admin@admin.com
#### username -> admin
#### password -> password

### Main project features and functionalities
- Laravel authentication is enabled
- User can register 
- For reseting password is necessary register  https://mailtrap.io/ account and enter details into .env
- Project contains following views: product list, color list, history list containing three tabs: price history, quantity history, trash ( soft deleted files)
- Users is able to see the list of products (paginated).
- Users is able to update products records.
- Users is able to delete and restore  records in histories view tab trash.
- Fake data added in favore of https://github.com/fzaninotto/Faker
- Project supports multilanguage mode ( English & Lithuanian) aditional languages can be added with minimal efforts
- Command for deleting all soft deleted records which are older than 7 days is scheluled on daily basis
### API for mobile application integration:
- Laravel Sanctum is used for tokens and authorization
- use postman or insomnia to test api enpoints:
on post request uri http://localhost/api/sanctum/token enter fake user email and password, third parameted -> device_name.This parameter is required.After seding request token will be aquired.
- with aquired token api authentication   can be provided for secured routes.
- API documentation on http://localhost/docs
- postman collection file in project root - collection.json



