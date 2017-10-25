<?php
/**
 * Plugin Name: Missing Alt Tags
 * Plugin URI: https://scottdeluzio.com
 * Description: Dashboard widget for displaying posts with missing alt tags in images
 * Author: Scott DeLuzio
 * Author URI: https://scottdeluzio.com
 * Version: 0.1
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'MISSING_ALT_VERSION' ) ) {
	define( 'MISSING_ALT_VERSION', '0.1' );
}
if( ! defined( 'MISSING_ALT_URL' ) ) {
	define( 'MISSING_ALT_URL', plugins_url( '', __FILE__ ) );
}
if( ! defined( 'MISSING_ALT_DIR' ) ) {
	define( 'MISSING_ALT_DIR', dirname( __FILE__ ) );
}

/* By default the plugin will return any post type except revisions and types with 'exclude_from_search' set to be true.
 * You can change that by uncommenting the filter and function below.
 * Then change the $post_type variable to whatever post type you want to be displayed.
 * You can also move that filter and function to a separate plugin.
 */

/*add_filter( 'missing_alt_tags_post_types', 'change_post_type' );
function change_post_type( $post_type ){
	$post_type = 'page';
	return $post_type;
}*/

include( MISSING_ALT_DIR . '/includes/dashboard-output.php' );
new Missing_ALT_Tags;

