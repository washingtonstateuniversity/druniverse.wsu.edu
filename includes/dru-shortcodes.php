<?php
/**
 * Class UComm_Shortcodes
 */
class dru_Shortcodes {
	/**
	 * Setup the hooks.
	 */
	public function __construct() {
		add_shortcode( 'tag_cloud', array( $this, 'tag_cloud_display' ) );
		add_shortcode( 'search_bar', array( $this, 'search_bar_display' ) );
		add_shortcode( 'featured_q', array( $this, 'featured-q_display' ) );
	}
	/**
	 * Handle the display of the tag_cloud shortcode.
	 *
	 * @return string HTML output
	 */
	public function tag_cloud_display() {
		// Build the output to return for use by the shortcode.
		ob_start();
		?>
<?php 
		$tags = get_tags();
		$html = '<div class="post_tags">';
			foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );		
		$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
		$html .= "{$tag->name}</a>";
			}
		$html .= '</div>';
		echo $html;
?>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	/**
	 * Handle the display of the search_bar shortcode.
	 *
	 * @return string HTML output
	 */
	public function search_bar_display() {
		// Build the output to return for use by the shortcode.
		ob_start();
		?>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
		<input type="text" value="Search <?php echo get_search_query(); ?>" name="s" id="s" onblur="if(this.value == '') { this.value='Search <?php echo get_search_query(); ?>'}" onfocus="if (this.value == 'Search <?php echo get_search_query(); ?>') {this.value=''}"/>
		<!--input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />-->
	</div>
</form>

		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	/**
	 * Handle the display of the tag_cloud shortcode.
	 *
	 * @return string HTML output
	 */
	public function featured_q_display() {
		// Build the output to return for use by the shortcode.
		ob_start();
		?>
<?php
				$args = array(
				'posts_per_page' => 1,
				'post_type' => 'post',
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => 'featured-q'
					),
				),
			);
			$my_posts = new WP_Query( $args );
			if ( $my_posts->have_posts() ) : while( $my_posts->have_posts() ) : $my_posts->the_post();
				?>
				<h1 class="blog-side-title"><?php echo get_the_title(); ?></h1>
				<span class="blog-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 44, '...' ); ?></span>
				<span class="rmore"><a href="<?php the_permalink(); ?>">More</a></span>
			<?php endwhile; endif;
			wp_reset_query();
			?>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

}
new dru_Shortcodes();