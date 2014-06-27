<?php
/**
 * @package Basis
 */
?>

<?php get_header(); 

if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<div class="breadcrumbs-wrapper"><p id="breadcrumbs">','</p></div>');
}

global $post;
$style= 'round';
if(isset($_REQUEST['style'])) :
	$style = $_REQUEST['style'];
endif;
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
		<?php echo do_shortcode('[product-archive style="'.$style.'" ] '); ?>
		<hr />
		<?php 
		if(!is_tax('strain')) :
		 echo	'<h4>Strains</h4>'. do_shortcode('[taxonomy-list taxonomy=strain]'); 
		  endif; 
		if(!is_tax('usage')) :
			 echo	'<h4>Browse by Medicinal Uses</h4>'.do_shortcode('[taxonomy-list taxonomy=usage]');
		endif; ?>
		
		<h4>Products Types</h4>
		<?php echo do_shortcode('[taxonomy-list]'); ?>
	</div>
</div>

<?php get_footer(); ?>