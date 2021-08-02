<?php
/**
 * Template part for displaying home content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MedSystem_-_Light
 */

?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>

<div class="entry-content">
	<?php
	the_content();
	?>
</div>
