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

$date = isset($_POST['data']) ? $_POST['data'] : 'esse_mes';

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
				if ( is_archive() ) {
				?>
				<form id="filter_data" class="navbar-item" method="POST">
					<select id="data" class="p-1" name="data">
						<option value="todos" <?= 'todos' == $date ? 'selected' : ''; ?>><?php _e( 'all', 'medsystem-light' ); ?></option>
						<option value="esse_mes" <?= 'esse_mes' == $date ? 'selected' : ''; ?>><?php _e( 'current month', 'medsystem-light' ); ?></option>
						<option value="hoje" <?= 'hoje' == $date ? 'selected' : ''; ?>><?php _e( 'today', 'medsystem-light' ); ?></option>
						<option value="ontem" <?= 'ontem' == $date ? 'selected' : ''; ?>><?php _e( 'yesterday', 'medsystem-light' ); ?></option>
						<option value="amanha" <?= 'amanha' == $date ? 'selected' : ''; ?>><?php _e( 'tomorrow', 'medsystem-light' ); ?></option>
					</select>
				</form>
				<?php
				}
				?>
			</div>
		</nav>
	</header>
