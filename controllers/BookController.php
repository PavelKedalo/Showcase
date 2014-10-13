<?php

    Class BookController Extends ControllerBase {

        public $parameters = array();//parameters get by Url

        public function index() {

            $pages = $this->getPagination(__CLASS__);//values for pagination

            $select = array(//parameters for sql query
                "action" => "select",
                'where' => 'is_active = 1',
                'order' => Sorting::$parameterSorting.' '.Sorting::$typeSorting,
                'limit' => $this->startElements.','.$this->elementsInPage//LIMIT start,end
            );

            $modelBook = new BookModel($select);
            $bookInfo = $modelBook->getAllRows();//get all records

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->vars('books', $bookInfo);//transfer books to view
            $this->template->vars('page', $pages);//transfer page to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName(),
                NULL,
                'pagination',//page with pagination
                'sorting'//page with sorting
            );
            $this->template->view(__FUNCTION__);//get view name page
        }

        public static function getForMain($select) {//get books for index controller

            $modelBook = new BookModel($select);
            $bookInfo = $modelBook->getAllRows();//get all records

            return $bookInfo;
        }

        public function addToBasketAction($val = NULL) {

            $this->parameters = $val;//route parameters

            $select = array(//parameters for sql query
                "action" => "insert",
                "values" => array(//get values with fields
                    "user_name" => self::$user,
                    "date_create" => date('Y-m-d'),
                    "id_elements" => $this->parameters[0],
                    "is_active" => "1"
                )
            );
            new BasketModel($select);

            echo '<script type="text/javascript"> document.location.href ="' . Url::getUrl() . $this->getControllerName(__CLASS__) . '/index"; </script>';
        }

        public function moreInfoAction($val = NULL) {

            /** show in right block */
            $this->parameters = $val;//route parameters
            $pages = $this->getPagination(__CLASS__);//values for pagination

            $selectElement = array(
                "action" => "select",
                'where' => 'id_elements =' . $this->parameters[0]
            );

            $fields = implode(', ', array_keys(BookModel::fieldsToShow()));//get fields from model
            $modelElement = new BookModel($selectElement, $fields);//transfer fields to query
            $elementValue = $modelElement->getOneRow();//get one row with values from DB

            $this->template->vars('elementValue', $elementValue);//values for right block in view

            /** show content at block in center */
            $select = array(
                "action" => "select",
                'where' => 'is_active = 1',
                'order' => Sorting::$parameterSorting.' '.Sorting::$typeSorting,
                'limit' => $this->startElements.','.$this->elementsInPage//LIMIT start,end
            );

            $modelBook = new BookModel($select);
            $bookInfo = $modelBook->getAllRows();//get all records

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->vars('books', $bookInfo);//transfer books to view
            $this->template->vars('page', $pages);//transfer photo to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName(),
                'column1',//page with more information
                'pagination',//page with pagination
                'sorting'//page with sorting
            );
            $this->template->view(__FUNCTION__);//get view name page
        }
    }