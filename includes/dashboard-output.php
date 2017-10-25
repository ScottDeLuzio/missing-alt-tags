<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


class Missing_ALT_Tags{

	public function __construct(){
		add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );
		$this->post_type = apply_filters( 'missing_alt_tags_post_types', 'any' );
	}
	/* Setup the Dashboard. */
	 
	/* Add Dashboard Widget */
	public function add_dashboard_widget(){
		wp_add_dashboard_widget( 'missing-alt', 'Posts With Images Missing ALT Tags', array( $this, 'widget_callback' ) );
	}
	 
	/* Widget HTML Output */
	public function widget_callback(){
		$string = 'alt=""';

		$args 	= array( 
			's'					=> $string,
			'sentence'			=> true, // Required for the search to include the double quotes in the search string.
			'post_type'			=> $this->post_type,
			'posts_per_page'	=> -1
		);
		
		$query 	= new WP_Query( $args );

		if ( $query->have_posts() ){
			echo '<strong>' . __( 'Missing ALT tags found in these posts:', 'missing-alt-tags' ) . '</strong>';
			echo '<ul>';
			while ( $query->have_posts() ){
				$query->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> | <?php edit_post_link(); ?></li>
				<?php
			}
			echo '</ul>';
		} else {
			_e( 'Hooray! It seems like all images have ALT tags. Give yourself a high-five, champ!', 'missing-alt-tags' );
		}
	}
}