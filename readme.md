# Online Bookshop with laravel
 This is an online bookshop project with laravel 5.8, bootstrap 4, javaScript and jquery. In this project I use [**stripe payment**](https://stripe.com/) system, and [**Laravel Shoppingcart**](https://github.com/bumbummen99/LaravelShoppingcart) for maintaining the user orders and payments. This project has many other cool functionality, like as [**Data table**](https://datatables.net/) and so on.
 
 ## Key Features
 
 ### Users
 
 - Users can search the books by book title and author name.
 - Filter the books by category and author
 - User can buy the books
 - User can make reviews for the books after login
 - User can see their orders and reviews from the user panel.
 - Registration
 
 ### Admin 
 - Basically admin manages the all activities of the application
 - Admin can add & delete user, author, category, and books.
 - Admin can accept or reject the user orders.
 - Admin has control over the book reviews and so on.
 
 ### Others
 
 - Multiple secured login and registration, Use middleware route group for admin and users
 - Use database seeder
 - Secured payment system with **stripe**.
 - Resize the uploaded images. 
 
 ### Development
 
 This project developed with
 - [Laravel](https://laravel.com/)
 - [Bootstrap-4](https://getbootstrap.com/docs/4.3/getting-started/introduction/)
 - SB-Admin-2
 - JavaScript, jQuery
 - MySql
 - [Stripe payment](https://stripe.com/)
 - [Laravel ShoppingCart](https://github.com/bumbummen99/LaravelShoppingcart)
 
 ## Getting started
 
 After cloning the project, you have follow as the way how other laravel projects run.
 For running the project you have to follow these instructions below
 
 ~~~TN
1. Rename .env-example to .env and set database name as your phpMyAdmin

2. Run these below commands in project terminal
    $ composer update
    $ php artisan key:generate
    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan serve.
    (From this link you can run the project)
~~~
Now this project is ready to run. For admin, Email `admin@bookshop.com` password `secret`. For user, Email `user@bookshop.com` password `secret`.
 
 ___If you would find any errors or issues you can mention in issues or raise a pull request. Fell free to contributing in this project.___
 
 
***

&copy; [Tahmid Nishat](http://tahmid-ni7.github.io/portfolio)

`Full-stack web developer & CS Engineer`
