<?php
/**
 * Template part for displaying page content in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package momo
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full'); ?></a>
        <?php else : ?>
            <a href="<?php the_permalink();?>"><img src="<?php echo get_catch_img(); ?>"/></a>
        <?php endif ; ?>

        <div class="text">
            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <p class="date"><?php echo get_the_date('Y.m.d');?></p>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
