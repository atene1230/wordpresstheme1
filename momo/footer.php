<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package momo
 */

?>

    </div><!-- #content -->


    <footer>
        <ul id="sns">
            <?php if(SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-twitter' )):?>
            <li><a href="<?php echo SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-twitter' );?>" target="_blank" onclick="ga('send', 'event', 'click', 'twitter');"><i class="fab fa-twitter"></i></a></li>
            <?php endif;?>
            <?php if(SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-facebook' )):?>
            <li><a href="<?php echo SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-facebook' );?>" target="_blank" onclick="ga('send', 'event', 'click', 'facebook');"><i class="fab fa-facebook-square"></i></a></li>
            <?php endif;?>
            <?php if(SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-instagram' )):?>
            <li><a href="<?php echo SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-instagram' );?>" target="_blank" onclick="ga('send', 'event', 'click', 'instagram');"><i class="fab fa-instagram"></i></a></li>
            <?php endif;?>
        </ul>
        <address>COPYRIGHT 2019 .inc.ALL RIGHTS RESERVED</address>
    </footer>

    <nav id="footer-navi">
        <ul>
            <li><a href="<?php echo esc_url(home_url('/'));?>"><i class="fas fa-home"></i><span>TOP</span></a></li>
            <li><a class="tel" href="tel:<?php echo SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-tel' );?>" onclick="ga('send', 'event', 'click', 'telephone');"><img src="<?php echo get_template_directory_uri();?>/images/ico-tel.png"/><span>お電話</span></a></li>
            <li><a href="<?php echo SCF::get_option_meta( 'scfex-shopinfo', 'scfex-shopinfo-shop-reserve' );?>" target="_blank" onclick="ga('send', 'event', 'click', 'b-merit');"><img src="<?php echo get_template_directory_uri();?>/images/ico-web.png"/><span>WEB予約</span></a></li>
        </ul>
    </nav>
<?php wp_footer(); ?>

</body>
</html>
