<?php

class CategoryModel Extends ModelBase {

    public $id, $name, $is_active;

    public function fieldsTable(){
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'is_active' => 'Activity'
        );
    }

    public static function fieldsToShow() {

        return array('name' => 'Name');
    }
}
