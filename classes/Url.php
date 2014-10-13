<?php

    Class Url {

        public static $currentFolder;//folder in which the site is located with index.php file

        private function folder() {//folder in which the site is located without index.php file

            if (isset(self::$currentFolder)){

                $link = '';
                $parts = explode("/",substr(self::$currentFolder,1));
                for($i = 0; $i < count($parts)-1; $i++){

                    $link .='/'.$parts[$i];
                }
                return $link.'/';
            }
            return false;
        }

        public static function getUrl() {//get url with folder

            return 'http://'.$_SERVER['SERVER_NAME'].self::folder();
        }
    }