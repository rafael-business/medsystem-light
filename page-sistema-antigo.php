<?php
/**
 * The template for displaying home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MedSystem_-_Light
 */

get_header();

add_filter( 'https_ssl_verify', '__return_false' );

function calculate_signature( $string, $private_key ) {
    $hash = hash_hmac( 'sha1', $string, $private_key, true );
    $sig = rawurlencode( base64_encode( $hash ) );
    return $sig;
}
 
$base_url = 'https://telemedic.top/gravityformsapi/';
$api_key = '977c815ee8';
$private_key = '2b98e9a066b4813';
$method  = 'GET';
$route = 'forms/6/entries';
$expires = strtotime( '+60 mins' );
$string_to_sign = sprintf( '%s:%s:%s:%s', $api_key, $method, $route, $expires );
$sig = calculate_signature( $string_to_sign, $private_key );
 
$url = $base_url . $route . '?api_key=' . $api_key . '&signature=' . $sig . '&expires=' . $expires . '&paging[page_size]=25&paging[offset]=1';
 
$response = wp_remote_request( $url, array('method' => 'GET' ) );
 
if ( wp_remote_retrieve_response_code( $response ) != 200 || ( empty( wp_remote_retrieve_body( $response ) ) ) ){
    //http request failed
    echo 'There was an error attempting to access the API.';
    die();
}
 
$body_json = wp_remote_retrieve_body( $response );
//results are in the "body" and are json encoded, decode them and put into an array
$body = json_decode( $body_json, true );
 
$data            = $body['response'];
$status_code     = $body['status'];
$total           = 0;
$total_retrieved = 0;
 
if ( $status_code <= 202 ){
    //entries retrieved successfully
    $entries = $data['entries'];
    $status  = $status_code;
    $total              = $data['total_count'];
    $total_retrieved    = count( $entries );

	//echo '<code>';
	//print_r( $entries );
	//echo '</code>';
}
else {
    //entry retrieval failed, get error information
    $error_code         = $data['code'];
    $error_message      = $data['message'];
    $error_data         = isset( $data['data'] ) ? $data['data'] : '';
    $status             = $status_code . ' - ' . $error_code . ' ' . $error_message . ' ' . $error_data;
}

?>

	<main id="primary" class="site-main container pl-4 pr-4">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home' );
		endwhile;
		?>

		<table>
			<thead>
				<tr>
					<th>Exame</th>	
					<th>Paciente</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ( $entries as $entry ) : ?>
				<tr>
					<td><?= $entry[21] ?></td>	
					<td><?= $entry[6] ?></td>
					<td><?= $entry[23] ?></td>
				</tr>
				<?php 
				endforeach; ?>
			</tbody>
		</table>

	</main>

<?php
get_footer();
