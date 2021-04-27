<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
/*
get_header();

if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();*/




function insert_category($name,$parent=null) {
if(!term_exists($name)) {
    if($parent==null){
        $id=get_cat_ID('marque auto');
    }else{
        $id=get_cat_ID($parent);
    }

    wp_insert_term(
        $name,
        'category',
        array('parent'=> $id),
    );
  }
 }
//1 
 insert_category('marque auto');

//2

//insert_category('serie3','bmw');

$file= get_template_directory().'/categories.csv';
/*$_marques=[];
if (($handle = fopen($file, "r")) !== FALSE) {
  while (($marques = fgetcsv($handle, 1000, ";")) !== FALSE) {
  
  	foreach ($marques as $key => $marque) {
  		if($marque!=''){
  			$_marques[]=utf8_encode($marque);
  			
  		}

  		  
  			

  	}
  }
  fclose($handle);
}
var_dump($_marques);*/
$marques = $fields = array(); $i = 0;
$handle = @fopen($file, "r");
if ($handle) {
    while (($row = fgetcsv($handle, 4096,';')) !== false) {
        if (empty($fields)) {
            $fields = $row;
            continue;
        }
        foreach ($row as $k=>$value) {
            $marques[$i][$fields[$k]] = $value;
        }
        $i++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}


foreach ($marques as $key => $value) {
	
	$marque = $value['MARQUE'];
	$modele = $value['MODELE'];
	insert_category($marque);
	insert_category($modele,$marque);


}
