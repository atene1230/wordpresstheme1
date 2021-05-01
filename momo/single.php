<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package momo
 */

get_header();
?>
<?php
while ( have_posts() ) :
    the_post();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main blog">
            <div class="title">
                <h2>ブログ</h2>
            </div>

            <article class="single">
                <h2><?php the_title();?></h2>
                <?php $cat = get_the_category(); ?>
                <?php if($cat): ?>
                <p class="category"><?php echo get_cat_name($cat[0]->term_id); ?></p>
                <?php endif;?>
                <p class="date"><?php echo get_the_date('Y.m.d');?></p>
                <div class="entry-body"><?php the_content();?></div>
            </article>

            <div class="share">
                <h3>SNSでシェアする</h3>
                <ul>
                <?php
                    $share_url   = get_permalink();
                    $share_title = strip_tags(get_the_title());
                ?>
                    <li class="line"><a href="//line.me/R/msg/text/?<?php echo $share_title.'%0A'.$share_url;?>" target="_blank" onclick="ga('send', 'event', 'click', 'line-share');">LINE</a></li>
                    <li class="facebook"><a href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $share_url;?>&t=<?php echo $share_title;?>" target="_blank" onclick="ga('send', 'event', 'click', 'facebook-share');">Facebook</a></li>
                    <li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo $share_url;?>&text=<?php echo $share_title;?>" target="_blank" onclick="ga('send', 'event', 'click', 'twitter-share');">twitter</a></li>
                </ul>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
