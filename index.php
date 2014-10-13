<?php
    error_reporting (E_ALL);//display all errors
    include ('/config.php');

    //connect to DB
    $dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $dbObject->exec('SET CHARACTER SET utf8');//set utf-8 charset for Unix

    //connect the core of the site
    include (SITE_PATH . 'core' . DS . 'core.php');

    //get folder in which the site is located
    Url::$currentFolder = $_SERVER['PHP_SELF'];

    //starting router of site
    $router = new Router();

    //path to folder with controllers.
    $router->setPath (SITE_PATH . 'controllers');

    $router->start();
