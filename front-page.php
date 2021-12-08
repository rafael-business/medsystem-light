<?php
/**
 * The template for displaying home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MedSystem_-_Light
 */

get_header();

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
$sig = self::calculate_signature( $string_to_sign, $private_key );
 
$url = $base_url . $route . '?api_key=' . $api_key . '&signature=' . $sig . '&expires=' . $expires;
 
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
					<th>Teste</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Opa</td>
				</tr>
			</tbody>
		</table>

		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/hmac-sha1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/enc-base64-min.js"></script>
		<script type="text/javascript">
			function CalculateSig(stringToSign, privateKey){
				//calculate the signature needed for authentication
				var hash = CryptoJS.HmacSHA1(stringToSign, privateKey);
				var base64 = hash.toString(CryptoJS.enc.Base64);
				return encodeURIComponent(base64);
			}
		
			//set variables
			var d = new Date;
			var expiration = 3600; // 1 hour,
			var unixtime = parseInt(d.getTime() / 1000);
			var future_unixtime = unixtime + expiration;
			var publicKey = "977c815ee8";
			var privateKey = "2b98e9a066b4813";
			var method = "GET";
			var route = "forms/6/entries";
		
			stringToSign = publicKey + ":" + method + ":" + route + ":" + future_unixtime;
			sig = CalculateSig(stringToSign, privateKey);
			var url = 'https://telemedic.top/gravityformsapi/' + route + '?api_key=' + publicKey + '&signature=' + sig + '&expires=' + future_unixtime;
			$.get(url, function(data, textStatus)
			{
				//get the data from the api
				if ( data.status != 200 || ( typeof( data ) != 'object' ) ) {
					//http request failed
					document.write( 'There was an error attempting to access the API - ' + data.status + ': ' + data.response );
					return;
				}
				response          = data.response;
				entries           = response.entries; //entries is a collection of Entry objects
				total_count       = response.total_count;

				console.log( entries );
			});
		
		</script>

	</main>

<?php
get_footer();
