<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: upload cat
Author: oussama
Version: 1
*/

register_activation_hook(__FILE__, 'wpse_57865_activation_run');

function wpse_57865_activation_run()
{
    $file = file_get_contents( plugin_dir_path( __FILE__ )  . 'categories.csv' );
    $data = array_map( "str_getcsv", preg_split( '/\r*\n+|\r+/', $file ) );

    if( count($data) < 1)
        return;

   
    foreach( $data as $marques )
    {
        $marques_defaults = array(
          'marques_name' => $marques[0],
          'category_description' => $marques[1]
           
        );

        wp_insert_category($marques_defaults);
    }

}

function generate_slug($path_str_array, $parent_slug = ''){
    if(empty($path_str_array))
        return '';
    $slug = array_pop($path_str_array);
    if($parent_slug){
        $slug = $parent_slug.'-'.$slug;
    }
    $category = get_category_by_slug($slug);
    if(!empty($category)){
        return generate_slug($path_str_array, $slug);
    }
    return $slug;
}

$cat_id = wp_insert_term('marque', 'category', 'marque');