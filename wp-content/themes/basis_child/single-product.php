<?php
/**
 * @package Basis
 */
?>

<?php get_header(); ?>

<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<div class="breadcrumbs-wrapper"><p id="breadcrumbs">','</p></div>');
}

 ?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div class="post-content main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry product basis-list">

				<?php get_template_part( '_post', 'title' ); ?>
				<?php echo do_shortcode('[product-profile]'); ?>
				<?php //get_template_part( '_post', 'content' ); ?>
				<?php get_template_part( '_pagination', 'single' ); ?>
			</div>
		</article>
	</div>
	<?php if ( ( get_adjacent_post( false, '', true ) || get_adjacent_post( false, '', false ) ) ) : ?>
		<div class="post-navigation">
			<div class="post-content">
				<nav class="pagination">
					<div class="alignleft" title="<?php esc_attr_e( 'Next Product', 'basis' ); ?>"><?php next_post_link( '%link', __( 'Next Product', 'basis' ) ); ?></div>
					<div class="alignright" title="<?php esc_attr_e( 'Previous Product', 'basis' ); ?>"><?php previous_post_link( '%link', __( 'Previous Product', 'basis' ) ); ?></div>
				</nav>
			</div>
		</div>
	<?php endif; ?>
<?php endwhile; ?>

<?php get_footer(); ?>