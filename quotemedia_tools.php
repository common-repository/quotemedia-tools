<?php
/*
Plugin Name: QuoteMedia Tools
Plugin URI: http://justinkuepper.me/quotemedia_tools
Description: Add realtime stock quotes and charts into posts using QuoteMedia.
Author: Justin Kuepper
Version: 1.0
Author URI: http://justinkuepper.me
License: GPLv2 or later
*/

// Creates the [stockquote symbol="MSFT"] shortcode taking a tickery symbol argument.
// Returns (MSFT $10.00 +/-1.0%)

function qm_stockquote_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'symbol' => ''
	), $atts ) );
	return '(<span id="qmStockQuote"><script src="http://app.quotemedia.com/quotetools/jsVarsQuotesSpan.go?webmasterId='.get_option('qm_webmaster_id').'&amp;symbol='.$symbol.'&amp;df=MMMM d, yyyy h:ma z"></script><script>document.write(qmQuote.symbol);</script> <script>document.write(qmQuote.last);</script> <script>document.write(qmQuote.changePercent);</script></span>)';
}

// Creates the [stockchart symbol="MSFT"] shortcode takeing ticker symbol, float, padding, scale, width, and height arguments. 
// Returns stock chart image; default floated left, 3-month scale, 250x150 in size, with 10x padding except top.

function qm_stockchart_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'symbol' => '',
		'float' => 'left',
		'padding' => '0 10px 10px 10px',
		'scale' => '3m',
		'width' => '250',
		'height' => '150'
	), $atts ) );
	return '<img style="float: '.$float.'; padding: '.$padding.';" src="http://app.quotemedia.com/quotetools/getChart.go?webmasterId='.get_option('qm_webmaster_id').'&amp;chtype=AreaChart&amp;symbol='.$symbol.'&amp;chmrg=3&amp;chscale='.$scale.'&amp;chwid='.$width.'&amp;chhig='.$height.'&amp;chbg=ffffff&amp;chbgch=ffffff&amp;chfrmon=off" alt="'.$symbol.' Chart" />';
}

// Connects short codes to the functions.

add_shortcode ('stockquote', 'qm_stockquote_func' );
add_shortcode ('stockchart', 'qm_stockchart_func' );

// Display Notice if No Webmaster ID Provided

add_action( 'admin_notices', 'qm_admin_notices' );
function qm_admin_notices() {
	if(get_option('qm_webmaster_id') == '') {
    printf( '<div class="error"><p> %s </p> </div>', esc_html__( 'You must input a Webmaster ID for this plugin to work. To obtain one, call (877) 367-5970 or e-mail contactus@quotemedia.com.', 'plugin_domain' ) );
	}
}

// Adds Settings Link to Plugin Page

add_filter('plugin_action_links', 'qm_settings_link', 10, 2);
function qm_settings_link($links, $file) {
	if ( $file == 'quotemedia-tools/quotemedia_tools.php' ) {
		$links['settings'] = sprintf( '<a href="%s"> %s </a>', admin_url( 'options-general.php?page=qm-tools-plugin' ), __( 'Settings', 'plugin_domain' ) );
	}
	return $links;
}

// Creates Setting Page in Admin

add_action('admin_menu', 'qm_create_menu');

function qm_create_menu() {
	global $plugin_hook;
	$plugin_hook = add_options_page('QuoteMedia Tools Settings', 'QuoteMedia Tools', 'manage_options', 'qm-tools-plugin', 'qm_settings_page');
	add_action('admin_init', 'register_qmsettings');
}

function register_qmsettings () {
	register_setting( 'qm-settings', 'qm_webmaster_id' );
}

function qm_settings_page () {
?>
	<div class="wrap">
		<h2>QuoteMedia Tools Plugin Settings</h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'qm-settings' ); ?>
			<?php do_settings_sections( 'qm-settings' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">QuoteMedia Webmaster ID</th>
					<td><input type="text" name="qm_webmaster_id" value="<?php echo get_option('qm_webmaster_id'); ?>"></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
<?php } ?>