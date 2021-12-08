<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MedSystem_-_Light
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'medsystem-light' ); ?></a>

	<header id="masthead" class="site-header">

		<nav id="site-navigation" class="main-navigation navbar is-dark" role="navigation" aria-label="main navigation">
			<div class="site-branding navbar-brand pl-1">
				<?php
				the_custom_logo();
				$medsystem_light_description = get_bloginfo( 'description', 'display' );
				if ( $medsystem_light_description || is_customize_preview() ) :
					?>
					<div class="site-title navbar-item">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<span class="sep">&nbsp;&nbsp;</span>
						<span class="site-description"><?php echo $medsystem_light_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					</div>
				<?php endif; ?>
				<a role="button" class="navbar-burger menu-toggle" aria-label="menu" aria-expanded="false">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
			    </a>
			</div>
			<div class="navbar-end">
				<?php
				wp_nav_menu(
					array(
						'theme_location' 	=> 'menu-1',
						'menu_id'        	=> 'primary-menu',
						'container'			=> false
					)
				);
				?>
			</div>
		</nav>
	</header>
