<?php

class PeriodicalModel Extends ModelBase {

    public $release_create, $issn, $name, $number, $authors, $publishing, $short_description, $description, $price, $path_to_the_image;
    public $id, $id_category, $id_elements, $is_active, $date_create;

    public function fieldsTable(){
        return array(
            'id' => 'ID',
            'id_category' => 'ID Category',
            'id_elements' => 'Elements ID',
            'is_active' => 'Activity',
            'issn' => 'issn number',
            'description' => 'Description',
            'short_description' => 'Short description',
            'date_create' => 'Date of create',
            'name' => 'Name',
            'path_to_the_image' => 'Path to the picture',
            'release_create' => 'Date release',
            'authors' => 'Authors',
            'publishing' => 'Publishing',
            'price' => 'Price'
        );
    }

    public static function fieldsToShow() {

        return array(
            'path_to_the_image' => 'Path to the picture',//is first show
            'name' => 'Name',//is second show
            'id_elements' => 'ID in basket',//is third show
            'issn' => 'isbn number',
            'release_create' => 'Year',
            'authors' => 'Authors',
            'publishing' => 'Publishing',
            'description' => 'Description',
            'price' => 'Price'
        );
    }
}
