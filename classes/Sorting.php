<?php

Class Sorting {

    public static $typeSorting = 'DESC';//sorting type
    public static $parameterSorting = 'date_create';//sorting parameter

    public static $typeArray = array(0 => 'DESC', 1 => 'ASC');//values from checkbox
    public static $parameterArray = array(0 => 'date_create', 1 => 'name');//values from checkbox

    public static $checkBoxText = array(
        0 => array(
            0 => 'По дате выпуска',
            1 => 'По названию'
        ),
        1 => array(
            0 => 'По убыванию',
            1 => 'По возрастанию'
        )
    );//text for checkboxes

    public static $checkBoxActivity = array (
        0 => array(
            0 => 'selected="selected"',
            1 => ''
        ),
        1 => array(
            0 => 'selected="selected"',
            1 => ''
        )
    );//checkboxes active status

    public static function sortingParameters() {//get type of sorting

        if(isset($_REQUEST['parameter'])) {//get parameter for sorting

            $indexOption = $_REQUEST['parameter'];
            foreach (self::$checkBoxActivity[0] as &$value){//unset activity checkbox
                $value = '';
            }
            self::$checkBoxActivity[0][$indexOption]='selected="selected"';
            self::$parameterSorting =  self::$parameterArray[$indexOption];
        }

        if(isset($_REQUEST['order'])) {//get type for sorting

            $indexOption = $_REQUEST['order'];
            foreach (self::$checkBoxActivity[1] as &$value){//unset activity checkbox
                $value = '';
            }
            self::$checkBoxActivity[1][$indexOption]='selected="selected"';
            self::$typeSorting =  self::$typeArray[$indexOption];
        }
    }

    public static function sortTDArray(&$array, $field, $asc = true) {//sorting this array by this field

        $newArray = call_user_func_array('array_merge_recursive', $array);
        asort($newArray[$field]);
        $so = array_keys($newArray[$field]);
        asort($so);
        $so = array_keys($so);

        $array = array_combine($so, $array);
        $asc ? ksort($array) : krsort($array);//if $asc == true, then sorting by ASC, else by DESC
    }

    public static function sortingElements($elementsInfo) {//sorting elements by global parameters

        switch(self::$parameterSorting) {

            case 'name'://sorting by name
                $parameter = (self::$typeSorting == 'ASC')? true: false;//type sort ASC or DESC
                self::sortTDArray($elementsInfo,'name',$parameter);//sorting by index, where index = 'name'
                $elements = $elementsInfo;
                break;

            case 'date_create'://sorting by date
                if(self::$typeSorting == 'DESC') krsort($elementsInfo);
                $elements = $elementsInfo;
                break;

            default:
                $elements = $elementsInfo;
                break;
        }
        return $elements;
    }
}