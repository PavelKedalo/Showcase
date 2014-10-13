<?php

    Class BasketController Extends ControllerBase {

        public $parameters = array();//parameters get by Url
        public $elementsInPage = 4;//count elements show in the page

        public function index() {

            $buttonBasketName = 'basketButtons';
            $buttonBasketPath = SITE_PATH . 'views' .  DS . self::getControllerName(__CLASS__) .  DS . 'pages' .  DS . $buttonBasketName . '.php';
            $pages = $this->getPagination(__CLASS__, $this->getOrdersCount());//values for pagination

            CallTo::setFile($buttonBasketName, $buttonBasketPath);//set into CallTo new file address

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->vars('elementsInBasket', $this->getElements());//transfer basket elements to view
            $this->template->vars('page', $pages);//transfer pagination to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName(),
                NULL,
                'pagination',//page with pagination
                'sorting'//page with sorting
            );
            $this->template->view(__FUNCTION__);//get view name page
        }

        public function emptyAction() {

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName()
            );
            $this->template->view(__FUNCTION__);//get empty action page
        }

        public function cleanOutOrderAction() {

            $select = array(//parameters for sql query
                "action" => "update",
                "set" => array("is_active" => '0'),
                "where" => "user_name = '" . $this->user . "' AND is_active = 1"
            );
            new BasketModel($select);//run update query

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName()
            );
            $this->template->view(__FUNCTION__);//get empty action page
        }

        public function confirmOrderAction() {

            $this->elementsInPage = $this->getOrdersCount();//get count elements
            $elements = $this->getElements();//get active elements for send
            $orderList = NULL;
            $myAddress = 'kedalopasha@mail.ru';//my mail address

            /** get elements for message */
            foreach($elements as $element) {

                $orderList .= '<p><strong>' . $element['name'] . '</strong> Цена: ' . $element['price'] . 'р.';
            }
            $message = '<h2>Вы сделали заказ</h2>' . $orderList;//message for send

            /** orders get status 'no active' */
            $select = array(//parameters for sql query
                "action" => "update",
                "set" => array("is_active" => '0'),
                "where" => "user_name = '" . self::$user . "' AND is_active = 1"
            );
            new BasketModel($select);//run update query

            /** send mail */
            $mail = new SendMail($myAddress);
            $mail->setName('Pavel Kedalo');//set my name
            $mail->send('pr1mepasha@gmail.com', 'Ваш заказ', $message);//send mail

            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName()
            );
            $this->template->view(__FUNCTION__);
        }

        public static function getForMain() {//get count orders, and action name

            $name = self::getControllerName(__CLASS__);

            $name = (self::getOrdersCount() == 0)?($name . '/emptyAction'):$name;//if basket empty,then call to empty action
            $basketData = array(0 => $name, 1 => self::getOrdersCount());

            return $basketData;
        }

        public function getOrdersCount() {//get count orders in basket

            $fields = 'COUNT(id)';

            $select = array(
                "action" => "select",
                "where" => "is_active = 1 AND user_name = '" . self::$user . "'"
            );

            $modelBasket = new BasketModel($select, $fields);
            $countElements = $modelBasket->getOneRow();//get one records, use [COUNT(id)] or [0]

            return $countElements[0];
        }

        private function getElements() {

            $countOrders = $this->getOrdersCount();

            if(isset($countOrders)){

                $fieldsBasketModel = 'c.name, e.id';
                $fieldsElementModel = 'name, path_to_the_image, short_description, id, price, id_elements, id_category';
                $elementsInfo = array();//for elements value

                /** get category name and elements id */
                $basketSelect = array(
                    "action" => "select",
                    "table_prefix" => "b",
                    "join" => array("elements e" => "(e.id=b.id_elements)",
                                    "category c" => "(c.id=e.id_category)"),
                    "where" => "b.is_active = 1 AND b.user_name = '" . self::$user . "'"
                );

                $modelBasket = new BasketModel($basketSelect, $fieldsBasketModel);
                $arrayBasket = $modelBasket->getAllRows();//elements with values: category name and id_element

                /** get elements values */
                for($i = 0; $i < count($arrayBasket); $i++) {
                    $select = array(
                        "action" => "select",
                        'where' => 'id_elements = ' .$arrayBasket[$i]['id']
                    );
                    $modelName = ucfirst($arrayBasket[$i]['name']) . 'Model';//get model name
                    $modelElement = new $modelName($select, $fieldsElementModel);
                    $elementsInfo[] = $modelElement->getOneRow();//get elements values
                }

                $elements = Sorting::sortingElements($elementsInfo);//sorting

                return array_splice(//get elements by sorting setting
                    $elements,
                    $this->startElements,
                    $this->elementsInPage
                );
            } else return false;
        }

        public function moreInfoAction($val = NULL) {

            /** show in right block */
            $this->parameters = $val;//route parameters
            $buttonBasketName = 'basketButtons';
            $model = ucfirst(CategoryController::getCategoryById($this->parameters[1])) . 'Model';
            $pages = $this->getPagination(__CLASS__);//values for pagination
            $buttonBasketPath = SITE_PATH . 'views' .  DS . self::getControllerName(__CLASS__) .  DS . 'pages' .  DS . $buttonBasketName . '.php';


            $selectElement = array(
                "action" => "select",
                'where' => 'id_elements =' . $this->parameters[0]
            );
            $fields = implode(', ', array_keys($model::fieldsToShow()));//get needed fields from choose model
            $modelElement = new $model($selectElement, $fields);
            $elementValue = $modelElement->getOneRow();

            $this->template->vars('elementValue', $elementValue);//info for right block

            CallTo::setFile($buttonBasketName, $buttonBasketPath);//set path for basket buttons

            /** show other content */
            $this->template->vars('categories', CategoryController::getForMain());//transfer categories to view
            $this->template->vars('basket', BasketController::getForMain());//transfer basket to view
            $this->template->vars('elementsInBasket', $this->getElements());//transfer basket elements to view
            $this->template->vars('page', $pages);//transfer pagination to view
            $this->template->getPages(//show pages by name
                CategoryController::controllerName(),
                BasketController::controllerName(),
                'column2',
                'pagination',//page with pagination
                'sorting'//page with sorting
            );
            $this->template->view(__FUNCTION__/*, CategoryController::controllerName()*/);//get view name page
        }

        public function delFromBasketAction($val = NULL) {//delete element from basket

            $this->parameters = $val;//route parameters

            $select = array(//parameters for sql query
                "action" => "update",
                "set" => array("is_active" => '0'),
                "where" => "id_elements = ".$this->parameters[0]
            );
            new BasketModel($select);//run update query

            echo '<script type="text/javascript"> document.location.href ="' . Url::getUrl() . $this->getControllerName(__CLASS__) . '/index"; </script>';
        }

        public static function controllerName() {

            return self::getControllerName(__CLASS__);
        }
    }