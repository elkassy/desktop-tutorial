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

$marques = $fields = array(); $i = 0;
$handle = @fopen($file, "r");
if ($handle) {
    while (($row = fgetcsv($handle, 4096,';')) !== false) {
        if (empty($fields)) {
            $fields = $row;
            continue;
        }
        foreach ($row as $k=>$value) {
            $marques[$i][$fields[$k]] = utf8_encode($value);
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






foreach ($marques as $key => $value) {
	
	$marque = $value['MARQUE'];
	$modele = $value['MODELE'];

	if(!empty($marque) && !empty($modele)){
		$title = $marque.' '.$modele;
		$postdate = date('Y/m/d h:i:s');
		$post_date_modified = '';
		$content = "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.";
		$id_cat = [];

		if(!empty(get_cat_ID($modele))){
			$id_cat[] = get_cat_ID($modele);
		}

		$new_post = array(
		        'post_title'    =>   $title,
		        'post_date'     =>   $postdate,
		        'post_modified' =>      $post_date_modified,
		        'post_status'   =>   'publish',
		        'post_content'  =>      $content,
		        'post_type'      =>      'post',
		        'post_author'   =>   1,
		        'post_category' => $id_cat,
		    );

		wp_insert_post( $new_post );
	}

}



