<?php
get_header();
?>

	<main id="primary" class="site-main container pl-4 pr-4">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'add-exame' );
		endwhile;
		?>

	</main>

<?php
get_footer();
