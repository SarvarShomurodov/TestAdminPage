## Description
Admin panel:
- mysql or postgresql database;
- create tables for storing Pages, Product Categories, Products;
- to create a database you need to use migrations;
- authorization system for the admin panel;
- functionality for management in the admin panel (CRUD) - Pages, Categories, Products;
- Pages: title, short description, full description (html);
- Categories: title, picture, short description, full description (html);
- Products: name, picture, short description, full description (html), link to category;
- data validation when adding/editing content;
- store pictures in the folder storage/app/public;
- it is recommended to use the ready-made functionality provided by Laravel wherever possible; it is not necessary to reinvent it. (auth, migrations, validation, filesystem, pagination, resource controller, etc.).

## Installation

I mainly used the ready-made Laravel components provided to me in the implementation of the project.
My database MySql database
Laravel 11
Laravel Breeze

## Usage

- To use the project, you must first git clone link the code
- You change the env.example file to .env  (Step by Step)
- composer install
- npm install 
- npm run dev 
- php artisan key:generate
- connect to your database
- php artisan migrate:fresh --seed 
- After that, if you enter the web.php file, you can start testing all the routes


