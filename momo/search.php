<?php
/*
Template Name: Search Page
*/
get_header();
?>
<?php
    global $query_string;
    $query_args = explode("&", $query_string);
    $search_query = array();
    $staff_id = 0;

    foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
        if($query_split[0] == 'staff_id'):
            $is_staff = true;
        endif;
    } // foreach
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $staff_id = get_query_var('staff_id') ? get_query_var('staff_id') : 0;

    $search_query += array(
        'paged' => $paged,
        'posts_per_page' => 12,
    );
    if($staff_id):
        $search_query += array(
            'meta_key' => 'hairstyle-staff',
            'meta_value' => $staff_id,
        );
    endif;
    $search = new WP_Query($search_query);
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main hairstyle">
            <div class="title">
                <h2>検索結果</h2>
            </div>


            <?php if($staff_id):?>
                <?php $staff = get_post($staff_id);?>
                <h3 class="result"><?php echo $staff->post_title; ?>の担当したスタイル<span>（<?php echo $search->found_posts; ?>件）</span></h3>
            <?php else:?>
                <h3 class="result"><?php echo isset($search_query['s']) ? $search_query['s'] : ''; ?>の検索結果<span>（<?php echo $search->found_posts; ?>件）</span></h3>
            <?php endif;?>
 
            <div id="style-list">
                <h2>HAIR CATALOG</h2>
                <?php
                if($search->have_posts()):
                ?>
                    <ul class="style">
                    <?php
                    while($search->have_posts()): $search->the_post();
                        $phg = SCF::get('hairstyle-image-group');
                        $photo = wp_get_attachment_image_src($phg[0]['hairstyle-image'], 'full');
                    ?>
                        <li><a href="<?php echo get_the_permalink();?>"><img src="<?php echo $photo[0];?>" alt="<?php echo the_title_attribute();?>"></a></li>
                    <?php
                    endwhile;
                    ?>
                    </ul>
                    <?php

                    if(function_exists('wp_pagenavi')):
                        wp_pagenavi(array('query' => $search));
                    endif;

                    wp_reset_query();

                else: ?>
                    <?php echo isset($search_query['s']) ? $search_query['s'] : ''; ?> に一致する情報は見つかりませんでした。
                <?php
                endif;
                ?>
                </ul>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
