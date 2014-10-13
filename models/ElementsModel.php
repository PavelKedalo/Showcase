<?php

class ElementsModel Extends ModelBase {

    public $id, $id_category;

    public function fieldsTable(){
        return array(
            'id' => 'ID',
            'id_category' => 'Category ID'
        );
    }

    public static function fieldsToShow() {}
}
