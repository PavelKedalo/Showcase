<?php

Class Template {

    private $controller;//controller name
    private $layouts;//layout name
    private $vars = array();//array with all parameters
    private $pagesFile, $sortingFile, $basketFile, $categoryFile;//names for includes files
    private $columnFile = NULL;//name column file

    public function __construct($layouts, $controllerName) {

        $this->layouts = $layouts;
        $this->controller = $controllerName::getControllerName($controllerName);
    }

    public function getPages(
        $category = NULL,//category file name
        $basket = NULL,//basket file name
        $columnFile = NULL,//column file name
        $pagination = NULL,//pagination file name
        $sorting = NULL//sorting file name
    ) {

        $this->categoryFile = $category;
        $this->basketFile = $basket;
        $this->pagesFile = $pagination;
        $this->sortingFile = $sorting;
        $this->columnFile = $columnFile;
    }

    public function vars($varName, $value) {//get values from controller

        if (isset($this->vars[$varName])) {
            trigger_error ('Unable to set var `' . $varName . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
            return false;
        }
        $this->vars[$varName] = $value;
        return true;
    }

    public function view($actionView = NULL) {

        $this->vars('link', Url::getUrl() . $this->controller);//get controller to Url

        $pathLayout = SITE_PATH . 'views' . DS . 'layouts' . DS . $this->layouts . '.php';//path to layout
        /** path to files */
        CallTo::setFile($actionView, SITE_PATH . 'views' . DS . $this->controller . DS . $actionView . '.php');
        CallTo::setFile($this->categoryFile, SITE_PATH . 'views' .  DS . $this->categoryFile . '.php');
        CallTo::setFile($this->pagesFile, SITE_PATH . 'views' .  DS . $this->pagesFile . '.php');
        CallTo::setFile($this->sortingFile, SITE_PATH . 'views' .  DS . $this->sortingFile . '.php');
        CallTo::setFile($this->basketFile, SITE_PATH . 'views' .  DS . $this->basketFile . '.php');
        CallTo::setFile($this->columnFile, SITE_PATH . 'views' .  DS . $this->columnFile . '.php');

        CallTo::setParameters($this->vars);//transfer parameters for called in files

        include ($pathLayout);//open layout
    }
}