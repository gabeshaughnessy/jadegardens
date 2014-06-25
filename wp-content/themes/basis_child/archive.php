<?php
/**
 * @package Basis
 */
?>

<?php get_header(); 
global $post;

?>

<div class="post-content">
	<header  class="page-header">
		<h1 ><?php 
		if(is_tax()) {
		 single_term_title();
		}
		 elseif(is_post_type_archive()){
		 	$post_type =  get_post_type_object( get_post_type($post) );
		 	 if(isset($post_type->labels->menu_name)){
		 	 echo $post_type->labels->menu_name;
		 	}
		 	
		 }
		?></h1>
	</header>
	<div class="entry">
		<?php echo do_shortcode('[product-archive]'); ?>
	</div>
</div>

<?php get_footer(); ?>