<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MedSystem_-_Light
 */

?>
	<div class="is-fab has-content-end">
		<a  
			id="btn-add-<?php _e( post_type_archive_title() ); ?>" 
			class="button is-primary is-rounded btn-fab has-tooltip-arrow add" 
			data-tooltip="<?php _e( 'Add New', 'medsystem-light' ); ?>" 
		>
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
			  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			  <line x1="12" y1="5" x2="12" y2="19" />
			  <line x1="5" y1="12" x2="19" y2="12" />
			</svg>
		</a>
	</div>


	<footer id="colophon" class="site-footer container pl-4 pr-4">
		<div class="site-info">
			Copyright &copy; <?php echo date('Y'); ?> <a href="https://telemedic.work/sistema">Sistema de Laudos Telemedic</a> — um site <a href="https://questmedical.group/" target="_blank">Quest Group</a>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
