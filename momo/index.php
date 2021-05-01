<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package momo
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

        <section id="main-slide">
            <ul id="slider">
            <?php
                $cf_group = SCF::get_option_meta( 'scfex-toppage', 'scfex-toppage-slides' );

                if (is_array($cf_group) || is_object($cf_group))
                        {
                            foreach($cf_group as $key => $value ):
                                $ph = $value['scfex-toppage-slides-image'];
                                $photo = wp_get_attachment_image_src($ph, 'full');
                                ?>
                <li><img src="<?php echo $photo[0];?>"/></li>
            <?php
                endforeach;
                        }
                
                
            
            ?>
            </ul>
        </section>

        <section id="topnavi">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'toppage-navi',
                'container' => false ,
                'menu_id'        => 'top-navi',
                'menu_class'      => 'top-navi',
            ) );
            ?>
        </section>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
