<?php

class PhotoModel Extends ModelBase {

    public $release_create, $name, $resolution, $dpi, $type, $author, $short_description, $price, $path_to_the_image;
    public $id, $id_category, $id_elements, $is_active, $date_create;

    public function fieldsTable(){
        return array(
            'id' => 'ID',
            'id_category' => 'ID Category',
            'id_elements' => 'Element ID',
            'is_active' => 'Activity',
            'dpi' => 'DPI',
            'type' => 'Image type',
            'short_description' => 'Short description',
            'date_create' => 'Date of create',
            'name' => 'Name',
            'path_to_the_image' => 'Path to the picture',
            'release_create' => 'Date release',
            'author' => 'Author',
            'resolution' => 'Resolution',
            'price' => 'Price'
        );
    }

    public static function fieldsToShow() {

        return array(
            'path_to_the_image' => 'Path to the picture',//is first show
            'name' => 'Name',//is second show
            'id_elements' => 'ID in basket',//is third show
            'dpi' => 'isbn number',
            'type' => 'Description',
            'release_create' => 'Year',
            'author' => 'Authors',
            'resolution' => 'Publishing',
            'short_description' => 'Short description',
            'price' => 'Price'
        );
    }
}
