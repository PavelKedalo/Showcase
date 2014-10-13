<?php

    Abstract Class ControllerBase {

        protected $template;//template object
        protected $layouts = 'layoutOne';//template of site
        protected $elementsInPage = 20;//count elements, where show in the page
        protected $countPageShow = 5;//count pages number show in pagination
        protected $startElements = 0;//beginning number of output elements
        public static $user = 'Pavel';//user

        public function __construct() {

            Sorting::sortingParameters();//get sorting parameters
            $this->template = new Template($this->layouts, get_class($this));//get template file
        }

        abstract function index();//index action

        abstract function moreInfoAction($val = NULL);//show information into the right block action

        public function getPagination($controllerClass, $countElements = NULL) {//get pagination in choose page

            $controllerName = self::getControllerName($controllerClass);//controller name

            if ($countElements == NULL){

                $modelClass = $controllerName.'Model';//model class for controller
                $fields = 'COUNT(id)';//field for sql query

                $select = array(//parameters for sql query
                    "action" => "select",
                    "where" => "is_active = 1"
                );

                $model = new $modelClass($select, $fields);
                $count = $model->getOneRow();//get one records, use [COUNT(id)] or [0]
                $countElements = $count[0];
            }

            $pageNav = new Pagination();
            $this->startElements = isset($_GET['start']) ? intval($_GET['start']) : 0;//get value for start elements

            return $pageNav->getLinks(//get pagination values
                $countElements,//count elements in this category
                $this->elementsInPage,//count elements needed show in page
                $this->startElements,//which element to start
                $this->countPageShow,//count pages number show in pagination
                $controllerName//controller name
            );
        }

        public static function getControllerName($controller) {//get controller name

            $controllerName = NULL;
            $countCapitals = preg_match_all(//count words in array
                    '/[A-Z][^A-Z]*?/Us',
                    $controller,//controller class name
                    $arrayCapitals,//array with word
                    PREG_SET_ORDER
                );

            for($a = 0; $a < $countCapitals-1; $a++){

                $controllerName = $arrayCapitals[$a][0];//controller name
            }

            return strtolower($controllerName);
        }
    }