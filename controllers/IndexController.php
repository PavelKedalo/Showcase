<?php

    Class IndexController Extends ControllerBase {

        public $parameters = array();//parameters get by Url

        public function index() {

            $select = array(//parameters for sql query
                "action" => "select",
                'where' => 'is_active = 1',
                'order' => 'date_create DESC',
                'limit' => 6
            );

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->vars('books', BookController::getForMain($select));//transfer books to view
            $this->template->vars('periodicals', PeriodicalController::getForMain($select));//transfer periodicals to view
            $this->template->vars('photos', PhotoController::getForMain($select));//transfer photos to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName()
            );
            $this->template->view(__FUNCTION__);//get view name page
        }

        public function moreInfoAction($val = NULL) {

            /** show in right block */
            $this->parameters = $val;//route parameters
            $model = ucfirst(CategoryController::getCategoryById($this->parameters[1])) . 'Model';//model name

            $selectElement = array(
                "action" => "select",
                'where' => 'id_elements =' . $this->parameters[0]
            );
            $fields = implode(', ', array_keys($model::fieldsToShow()));//get fields from model
            $modelElement = new $model($selectElement, $fields);//transfer fields to query
            $elementValue = $modelElement->getOneRow();//get one row with values from DB

            $this->template->vars('elementValue', $elementValue);//values for right block in view

            /** show content at block in center */
            $select = array(
                "action" => "select",
                'where' => 'is_active = 1',
                'order' => 'date_create DESC',
                'limit' => 6
            );

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->vars('books', BookController::getForMain($select));//transfer books to view
            $this->template->vars('periodicals', PeriodicalController::getForMain($select));//transfer periodicals to view
            $this->template->vars('photos', PhotoController::getForMain($select));//transfer photos to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName(),
                'column1'//page with more information
            );
            $this->template->view(__FUNCTION__);//get view name page
        }
    }