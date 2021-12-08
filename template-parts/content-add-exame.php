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
			<input type="hidden" name="arquivo" value="<?= wp_get_attachment_url( $paciente['arquivo'] ) ?>">
			<input type="hidden" name="type" value="<?= $type ?>">
			<fieldset class="add-paciente">
				<legend>
					<?= $paciente['nome'] ?>
					<a 
						href="<?= wp_get_attachment_url( $paciente['arquivo'] ) ?>" 
						target="_blank" 
						class="has-tooltip-arrow" 
						data-tooltip="<?php _e( 'File', 'medsystem-light' ) ?>" 
					>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
						  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						  <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" />
						</svg>
					</a>
				</legend>
				<div class="field cpf">
					<label>CPF</label>
					<div class="control"><input class="input" type="text" name="cpf"></div>
				</div>
				<div class="field nome">
					<label>Paciente</label>
					<div class="control"><input class="input" type="text" name="nome" value="<?= $paciente['nome'] ?>"></div>
				</div>
				<div class="field">
					<label>Sexo</label>
					<div class="control select">
						<select name="sexo">
							<option value="">-- selecione --</option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select>
					</div>
				</div>
				<div class="field">
					<label>Nascimento</label>
					<div class="control"><input class="input" type="text" name="nascimento"></div>
				</div>
				<div class="field dt_exame">
					<label>Data / Exame</label>
					<div class="control"><input class="input" type="datetime-local" name="dt_exame" value="<?= date('c', strtotime($publish_date)) ?>"></div>
				</div>
				<div class="field">
					<label>Empresa</label>
					<div class="control"><input class="input" type="text" name="empresa"></div>
				</div>
				<div class="field">
					<label>Profissão</label>
					<div class="control"><input class="input" type="text" name="profissao"></div>
				</div>
				<div class="field">
					<label>Finalidade</label>
					<div class="control select">
						<select name="finalidade">
							<option value="">-- selecione --</option>
							<option value="1">Admissional</option>
							<option value="2">Demissional</option>
						</select>
					</div>
				</div>
			</fieldset>
			<?php
		}
		?>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
