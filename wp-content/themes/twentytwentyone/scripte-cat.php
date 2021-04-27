<?php
get_header();



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
 //insert_category('marque auto');

//2

//insert_category('serie3','bmw');

$file= get_template_directory().'/categories.csv'; 

/*if (($handle = fopen("test.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    ///
  }
  fclose($handle);
}
*/
get_footer();
