<?php

class BookModel Extends ModelBase {

    public $isbn,$description, $short_description, $name, $path_to_the_image, $year, $authors, $publishing, $price;
    public $id, $id_category, $id_elements, $is_active, $date_create;

    public function fieldsTable(){
        return array(
            'id' => 'ID',
            'id_category' => 'ID Category',
            'id_elements' => 'ID in basket',
            'is_active' => 'Activity',
            'isbn' => 'isbn number',
            'description' => 'Description',
            'short_description' => 'Short description',
            'date_create' => 'Date of create',
            'name' => 'Name',
            'path_to_the_image' => 'Path to the picture',
            'year' => 'Year',
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
            'isbn' => 'isbn number',
            'year' => 'Year',
            'authors' => 'Authors',
            'publishing' => 'Publishing',
            'description' => 'Description',
            'price' => 'Price'
        );
    }
}