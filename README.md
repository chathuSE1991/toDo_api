# toDo_api

# README

This README document includes whatever steps are necessary to get the ToDO API up and running.


### Clone the repository


```
https://github.com/chathuSE1991/toDo_api.git
```

### Switch to the folder

```
cd toDo_api
```

### .env file 

- Copy the .env.example file and rename it as .env 
- Replace the "DB_HOST=127.0.0.1" with the following line

```
```




### Prerequisites

```
PHP >= v 8.3.0
Laravel >= v11.0
MySQL >= v5.7
composer 2
```


### Install all the dependencies using composer

```
composer install
```

### MySQL DB setup

-   Create an empty schema called 'todo_system'

### Run the database migrations & seeder

```
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
```

### After migrations install passport 2 times create another guard

```
php artisan passport:install 

```


### Storage link

```
php artisan storage:link
```

## Run tests

Compiles and hot-reloads for development

```
php artisan serve
```

## Built With

-   Laravel - Framework | Backend Development
-   MySQL - Database
-   Vue.js - Frontend Development
