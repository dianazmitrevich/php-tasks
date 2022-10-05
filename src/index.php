<?php

declare(strict_types=1);

require 'models/Database.php';
require 'controllers/Controller.php';
require 'models/User.php';

$config = require 'resources/config/config.php';

$connection = mysqli_connect($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);
$db = new Database($connection);

$controller = new Controller($db);
$controller->main();

// In the developed application, you must be able to add new users, edit user data, delete users, view the list of all users. You design the interface of the application and the structure of the MySQL database yourself.

// Use the following data to work with users

// email field "Email", name="email" - key field

// text field "Your first and last name", name="name"

// drop-down list "Gender" ( male, female ), name="gender"

// drop-down list "Status" ( active, inactive ), name="status"



// Prerequisites:

// use Bootstrap

// store data in MySQL

// make checks for field completeness and data correctness using JS and PHP



// When we start editing user data, the editable fields must be pre-filled with current data. For the "Delete" button, add a deletion confirmation using javascript code.

// Options in the drop-downs "Gender" and "Status" must be like<option value=”male”>Male</option>

// <option value=”active”>Active</option>

// You should implement this application in OOP. Split logic and templates into separate files.

// Logic files should contain PHP code only.

// Use separate CSS files for styles.

// You must also create either a database dump or write sids/migrations

// Tags:  PHP, OOP, MySQL, MVC, Bootstrap, HTML, CSS, JS, GIT
