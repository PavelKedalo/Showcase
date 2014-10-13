<?php

    Class CategoryController Extends ControllerBase {

        public function index() {}

        public static function getForMain() {

            $select = array(//parameters for sql query
                "action" => "select",
                'where' => 'is_active = 1',
                'order' => 'name ASC'
            );

            $modelCategory = new CategoryModel($select);
            $categoriesInfo = $modelCategory->getAllRows();//get all records

            return $categoriesInfo;
        }

        public static function getCategoryById($id) {//get category name by choose ID

            $select = array(//parameters for sql query
                "action" => "select",
                'where' => 'id = ' . $id
            );

            $modelCategory = new CategoryModel($select, 'name');
            $categoriesInfo = $modelCategory->getOneRow();//get one row with values from DB

            return $categoriesInfo[0];
        }

        public function moreInfoAction($val = NULL) {}

        public static function controllerName() {//get this controller name

            return self::getControllerName(__CLASS__);
        }
    }