<?php
    //Constants:
    define ('DS', DIRECTORY_SEPARATOR); //separator for path at files
    $sitePath = realpath(dirname(__FILE__) . DS) . DS;
    define ('SITE_PATH', $sitePath); //path to site home directory

    //for connect to DB
    define('DB_HOST', 'localhost');//hosting name
    define('DB_NAME', 'my_mvc');//data base name
    define('DB_USER', 'root');//data base user name
    define('DB_PASSWORD', '');//data base password
    define('DB_CHARSET ', 'SET NAMES utf8');//data base charset