<?php

class BasketModel Extends ModelBase {

    public $id, $user_name, $date_create, $is_active, $id_elements;

    public function fieldsTable(){
        return array(
            'id' => 'ID',
            'user_name' => 'User name',
            'date_create' => 'Date create',
            'id_elements' => 'Element ID',
            'is_active' => 'Activity'
        );
    }

    public static function fieldsToShow() {

        return array(
            'user_name' => 'User name',
            'date_create' => 'Date create'
        );
    }
}
