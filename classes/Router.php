<?php

    Class Router {

        private $path;

        function setPath($path) {//set path to folder with controllers

            $path = trim($path, '/\\');
            $path .= DS;

            if (is_dir($path) == false) {

                throw new Exception ('Invalid controller path: `' . $path . '`');
            }
            $this->path = $path;
        }

        //definition controller and action of Url
        private function getController(&$file, &$controller, &$action, &$args) {

            $route = (empty($_GET['route'])) ? '' : $_GET['route'];//get all data from Url
            unset($_GET['route']);

            if (empty($route)) {

                $route = 'Index';//default route
            }

            /** get part of Url */
            $route = trim($route, '/\\');
            $parts = explode('/', $route);//parts of all data, where 0=>controller 1=>action 2=>parameter ...

            /** find controller */
            $cmdPath = $this->path;
            foreach ($parts as $part) {

                $fullPath = $cmdPath . ucfirst($part);//path to one of parts from Url

                if (is_dir($fullPath)) {//is controller folder

                    $cmdPath .= ucfirst($part) . DS;
                    array_shift($parts);//if controller folder path isn't empty, then unset controller folder name from $parts
                    continue;
                }

                if (is_file($fullPath . 'Controller.php')) {//is controller file

                    $controller = ucfirst($part).'Controller';
                    array_shift($parts);//if controller file path isn't empty, then unset controller file name from $parts
                    break;
                }
            }

            if (empty($controller)) {

                $controller = 'indexController';//default controller
            }

            $action = array_shift($parts);//get action
            if (empty($action)) {

                $action = 'index';//default action
            }

            $file = $cmdPath . $controller . '.php';//get controller's file path
            $args = $parts;//parameters
        }

        function start() {

            $this->getController(//get path to controller and find action
                $file,//controller's file path
                $controller,//controller class
                $action,//action
                $args//parameters
            );

            if (is_readable($file) == false) {//absent file of controller's class

                die ('404 Not Found');
            }

            require_once ($file);//call to file of controller class

            $class = $controller;
            $controller = new $class();//object of controller class

            if (is_callable(array($controller, $action)) == false) {//absent action in controller's class

                die ('404 Not Found');
            }

            $controller->$action($args);//run action
        }
    }