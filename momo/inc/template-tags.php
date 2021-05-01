<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package momo
 */

if ( ! function_exists( 'momo_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function momo_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'momo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'momo_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function momo_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'momo' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'momo_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function momo_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'momo' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'momo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'momo' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'momo' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'momo' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'momo' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'momo_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function momo_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

function momo_get_metadata(){
	$ret = array(
		'title' => SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-meta-title' ),
		'h1_alt' => SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-meta-h1' ),
		'keyword' => SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-meta-keyword' ),
		'description' => SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-meta-description' )
	);

	if(is_category('contents')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-h1text' );
		endif;
	elseif(is_category('information')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-h1text' );
		endif;
	elseif(is_category('column')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-h1text' );
		endif;
	elseif (is_singular('post')):
		$cat_contents = get_term_by( 'slug', 'contents', 'category' ) ;
		$cat_info = get_term_by( 'slug', 'information', 'category' ) ;
		if ( in_category( 'contents' ) || post_is_in_descendant_category( $cat_contents->term_id )) :
			$ret['title'] = get_the_title().'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-title' );
			$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-keyword' );
			if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-h1text' ) !== '' ) :
				$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-contents-h1text' );
			endif;
		elseif ( in_category( 'information' ) || post_is_in_descendant_category( $cat_info->term_id )) :
			$ret['title'] = get_the_title().'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-title' );
			$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-keyword' );
			if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-h1text' ) !== '' ) :
				$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-info-h1text' );
			endif;
		else:
			$ret['title'] = get_the_title().'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-title' );
			$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-keyword' );
			if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-h1text' ) !== '' ) :
				$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-blog-h1text' );
			endif;
		endif;

		$tags = get_the_tags();
		if(is_array($tags)):
			foreach ( $tags as $tag ) :
				$ret['keyword'] .= ','. $tag->name;
			endforeach;
		endif;
		$ret['description'] = my_excerpt( 160 );
	
	elseif (is_post_type_archive('coupon') || is_singular('coupon')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-coupon-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-coupon-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-coupon-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-coupon-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-coupon-h1text' );
		endif;

	elseif (is_post_type_archive('staff')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-h1text' );
		endif;

	elseif (is_singular('staff')):
		$ret['title'] = get_the_title().'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-keyword' ).','.get_the_title();
		$ret['description'] = my_excerpt( 160 );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-staff-h1text' );
		endif;
		
	elseif (is_post_type_archive('menu') || is_singular('menu')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-menu-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-menu-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-menu-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-menu-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-menu-h1text' );
		endif;
	
	elseif (is_post_type_archive('hairstyle')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' );
		endif;

	elseif (is_page('hairstyle-new')):
		$ret['title'] = get_the_title().'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' );
		endif;

	elseif (is_tax('hairstyle-length') || is_tax('hairstyle-tag')):
		$term = get_queried_object();
		$ret['title'] = $term->name.'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-keyword' ).','.$term->name;
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' );
		endif;

	elseif (is_singular('hairstyle')):
		$ret['title'] = get_the_title().'|'.SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-keyword' );
		$tags = get_the_terms(get_the_ID(),'hairstyle-tag');
		if(is_array($tags)):
			foreach ( $tags as $tag ) :
				$ret['keyword'] .= ','. $tag->name;
			endforeach;
		endif;

		$ret['description'] = my_excerpt( 160 );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-style-h1text' );
		endif;
			
	elseif (is_page('ranking')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-ranking-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-ranking-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-ranking-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-ranking-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-ranking-h1text' );
		endif;
	
	// elseif (is_page('reserve')):
	// 	$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-reserve-title' );
	// 	$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-reserve-keyword' );
	// 	$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-reserve-description' );
	// 	if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-reserve-h1text' ) !== '' ) :
	// 		$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-reserve-h1text' );
	// 	endif;
	elseif (is_post_type_archive('faq')):
		$ret['title'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-faq-title' );
		$ret['keyword'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-faq-keyword' );
		$ret['description'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-faq-description' );
		if( SCF::get_option_meta( 'scfex-opt', 'scfex-opt-faq-h1text' ) !== '' ) :
			$ret['h1_alt'] = SCF::get_option_meta( 'scfex-opt', 'scfex-opt-faq-h1text' );
		endif;


				
	endif;

	return $ret;
}

function tmpl_dir(){
	echo get_stylesheet_directory_uri();
}