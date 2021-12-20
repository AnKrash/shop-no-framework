Test site: https://shop-demo-project.000webhostapp.com/

It's a mini-framework on PHP.
This project use dynamic models for adding,getting and deleting rows in the DB.
Allows flexible editing of the database, using product classes.

A web-app (accessible by an URL) containing two pages for:

1. Product list page
2. Adding a product page

All logic difference between product types is handled under the hood using the OOP approach.
Abstract class Product for the main product logic. Used setters and
getters for handled by objects with properties. I've avoided any if-else and switch-case statements which are used to
handle any difference between products. 1 general endpoint for product saving.

- PHP: ^8.0.8, plain classes, no frameworks, OOP approach
- "bootstrap": "^5.1.0"
- "jquery": "^3.6.0"
- MySQL: "^5.7.32 "
Additionally:
- "jquery-validation"
- "slick-carousel"

How to install project:
1.Make Project.
2.Clone from gitHub:
-git clone [git@github.com:AnKrash/shop-no-framework.git]
3.npm settings:
-npm install
4.Configure the settings corresponding to your database in the "Database.php".
