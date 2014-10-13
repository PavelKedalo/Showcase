<?php

    function __autoload($className) {

        $filename = $className.".php";

        switch(determineTypeClass($className)) {

             case "Controller":
                 $folder = "controllers";

                 break;

             case "Model":
                 $folder = "models";
                 break;

             default:
                 $folder = "classes";
                 break;
        }

        //path to class
        $file = SITE_PATH . $folder . DS . $filename;

        if (file_exists($file) == false) {
             return false;
        }
        include ($file);
    }

    function determineTypeClass($str) {

        $countCapitals = preg_match_all('/[A-Z][^A-Z]*?/Us',$str,$arrayCapitals,PREG_SET_ORDER)-1;
        return $arrayCapitals[$countCapitals][0];
    }