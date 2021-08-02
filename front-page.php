<?php
/**
 * The template for displaying home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MedSystem_-_Light
 */

get_header();
?>

	<main id="primary" class="site-main container pl-4 pr-4">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home' );
		endwhile;
		?>

	</main>

<?php
get_footer();
