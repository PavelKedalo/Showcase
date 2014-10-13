<?php

    Class CallTo {

        private static $file;//array, where $key = file name
        public static $parameters;//parameters for use in the files

        public static function setFile($name, $path) {

            self::$file[$name] = $path;//path to the file
        }

        public static function setParameters($param = NULL) {

            self::$parameters = $param;//parameters for all files
        }

        public static function file($name) {//include file, if file exist

            if(isset(self::$file[$name])) {

                if(self::checkFile(self::$file[$name]) == true) {

                    foreach (self::$parameters as $key => $value) {

                        $$key = $value;//$key == array($value)
                    }
                    include (self::$file[$name]);
                } else {
                    //if file doesn't exist, then nothing doing
                }
            }
        }

        private function checkFile($path) {//check exist file

            if (file_exists($path) == false) {
                //trigger_error ('Path `' . $path . '` does not exist.', E_USER_NOTICE);
                return false;
            }
            return true;
        }
    }