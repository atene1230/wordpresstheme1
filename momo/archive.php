<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package momo
 */

get_header();
$subtitle = '';
$args_cat = array();
if(is_category()):
    $term = get_queried_object();
    $subtitle = single_cat_title('',false);
    $args_cat = array('category_name' => $term->slug );
elseif(is_tag()):
    $term = get_queried_object();
    $subtitle = single_tag_title('',false);
    $args_cat = array('tag' => $term->slug );
endif;
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main blog">
            <div class="title">
                <h2><img src="<?php echo get_template_directory_uri();?>/images/h2-blog.png" alt="BLOG"></h2>
                <h3>ブログ<?php echo $subtitle ? '：'.$subtitle : '';?></h3>
            </div>
            <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'paged' => $paged,
                    'posts_per_page' => 10,
                );
                if($args_cat):
                    $args += $args_cat;
                endif;
                $my_query = new WP_Query($args);
                if ( $my_query->have_posts() ) : 
                    while ( $my_query->have_posts() ) :
                        $my_query->the_post();

                        get_template_part( 'template-parts/blog-list' );

                    endwhile;
                    if(function_exists('wp_pagenavi')):
                        wp_pagenavi(array('query' => $my_query));
                    endif;

                    wp_reset_query();

                endif;
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
