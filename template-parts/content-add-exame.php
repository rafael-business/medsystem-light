<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/labelemes/basics/template-hierarchy/
 *
 * @package MedSystem_-_Light
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php
		$post = isset( $_POST ) ? $_POST : null;
		$type = $post['type'];
		$publish_date = $post['publish_date'];
		$pacientes = $post['pacientes'];

		?>

		<?php
		foreach ( $pacientes as $paciente ) {
			
			?>
			<div class="field is-horizontal">
				<div class="field">
					<label class="label">CPF</label>
					<div class="control"><input type="text" name="cpf"></div>
				</div>
				<div class="field">
					<label class="label">Paciente</label>
					<div class="control"><input type="text" name="nome" value="<?= $paciente['nome'] ?>"></div>
				</div>
				<div class="field">
					<label class="label">Sexo</label>
					<div class="control"><input type="text" name="sexo"></div>
				</div>
				<div class="field">
					<label class="label">Nascimento</label>
					<div class="control"><input type="text" name="nascimento"></div>
				</div>
				<div class="field">
					<label class="label">Data / Exame</label>
					<div class="control"><input type="datetime-local" name="dt_exame" value="<?= date('c', strtotime($publish_date)) ?>"></div>
				</div>
				<div class="field">
					<label class="label">Empresa</label>
					<div class="control"><input type="text" name="empresa"></div>
				</div>
				<div class="field">
					<label class="label">Profissão</label>
					<div class="control"><input type="text" name="profissao"></div>
				</div>
				<div class="field">
					<label class="label">Finalidade</label>
					<div class="control"><input type="text" name="finalidade"></div>
				</div>
				<div class="field">
					<input type="hidden" name="arquivo" value="<?= wp_get_attachment_url( $paciente['arquivo'] ) ?>">
					<input type="hidden" name="type" value="<?= $type ?>">
					<a href="<?= wp_get_attachment_url( $paciente['arquivo'] ) ?>" target="_blank">Arquivo</a>
				</div>
			</div>
			<?php
		}
		?>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
