<?php
/**
 * momo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package momo
 */

if ( ! function_exists( 'momo_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function momo_setup() {
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'main-menu' => 'メインメニュー',
            'sp-menu' => 'スマホメニュー',
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        

        //WPバージョン情報削除
        remove_action( 'wp_head', 'wp_generator' );
        //Windows Live Writerからの投稿不許可
        remove_action( 'wp_head', 'wlwmanifest_link' );
        //外部ツールからの投稿不許可
        remove_action( 'wp_head', 'rsd_link' );
        // RSSのフィード・コメントフィード配信を削除
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        //ショートリンクの削除
        remove_action('wp_head', 'wp_shortlink_wp_head');
        //oEnmedの削除
        remove_action('wp_head','wp_oembed_add_discovery_links');
        //絵文字用スクリプト、スタイル削除
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
endif;
add_action( 'after_setup_theme', 'momo_setup' );

//一部機能・プラグインを除外しREST APIを無効
// function deny_restapi_except_plugins( $result, $wp_rest_server, $request ){
//     $namespaces = $request->get_route();

//     //oembedの除外
//     // if( strpos( $namespaces, 'oembed/' ) === 1 ){
//     //     return $result;
//     // }

//     return new WP_Error( 'rest_disabled', __( 'The REST API on this site has been disabled.' ), array( 'status' => rest_authorization_required_code() ) );
// }
// add_filter( 'rest_pre_dispatch', 'deny_restapi_except_plugins', 10, 3 );

//.recentcommentsを消す
function remove_recent_comments_style() { 
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

//Gutenberg用CSSの削除
function remove_block_library_style() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function momo_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'momo_content_width', 640 );
}
add_action( 'after_setup_theme', 'momo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function momo_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'momo' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'momo' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'momo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function momo_scripts() {
    // wp_enqueue_style( 'ress', get_template_directory_uri().'/inc/ress.css' );
    // wp_enqueue_style( 'momo-style', get_stylesheet_uri() , array('ress'));
    // wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
    // wp_enqueue_style( 'base-font', 'https://fonts.googleapis.com/css?family=&amp;subset=japanese' );

    // wp_deregister_script('jquery');
    // wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1', true);
    // wp_enqueue_script( 'momo-common-script', get_template_directory_uri().'/js/common.js', array('jquery'), '1.0.0', true);
    // if(is_home() || is_front_page()):
    //     wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    //     wp_enqueue_script( 'slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    //     wp_enqueue_script( 'momo-toppage-script', get_template_directory_uri().'/js/index.js', array('slick-script'), '1.0.0', true);
    //     wp_enqueue_script( 'insta-script', get_template_directory_uri().'/js/instafeed.min.js', array('jquery'), '1.4.1', true);
    // elseif(is_singular('hairstyle')):
    //     wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    //     wp_enqueue_script( 'slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    //     wp_enqueue_script( 'momo-hairstyle-script', get_template_directory_uri().'/js/style.js', array('slick-script'), '1.0.0', true);
    // endif;
}
add_action( 'wp_enqueue_scripts', 'momo_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/* 投稿画面にスタイル適用*/
function add_editor_style_cb() {
    add_editor_style();
}
add_action('admin_init', 'add_editor_style_cb');

/* カスタム投稿タイプ */
require get_template_directory() . '/post-type/cpt-blog.php';
require get_template_directory() . '/post-type/cpt-optionpage.php';
require get_template_directory() . '/post-type/cpt-shopinfo.php';
require get_template_directory() . '/post-type/cpt-toppage.php';
require get_template_directory() . '/post-type/cpt-staff.php';
require get_template_directory() . '/post-type/cpt-menu.php';
require get_template_directory() . '/post-type/cpt-coupon.php';
require get_template_directory() . '/post-type/cpt-style.php';
require get_template_directory() . '/post-type/cpt-faq.php';
// require get_template_directory() . '/post-type/cpt-technique.php';
function create_post_type() {

    $staff = new CPT_Staff();
    register_post_type(CPT_Staff::SLUG, $staff->get_param());
    register_taxonomy(CPT_Staff::TAXONOMY, CPT_Staff::SLUG, $staff->get_tax());
    $terms = $staff->get_terms();
    foreach($terms as $key => $value):
        wp_insert_term($value['name'], $value['taxonomy'], $value['data']);
    endforeach;


    $menu = new CPT_Menu();
    register_post_type(CPT_Menu::SLUG, $menu->get_param());
    register_taxonomy(CPT_Menu::TAXONOMY, CPT_Menu::SLUG, $menu->get_tax());
    $terms = $menu->get_terms();
    foreach($terms as $key => $value):
        wp_insert_term($value['name'], $value['taxonomy'], $value['data']);
    endforeach;

    $coupon = new CPT_Coupon();
    register_post_type(CPT_Coupon::SLUG, $coupon->get_param());
    register_taxonomy(CPT_Coupon::TAXONOMY, CPT_Coupon::SLUG, $coupon->get_tax());
    $terms = $coupon->get_terms();
    foreach($terms as $key => $value):
        wp_insert_term($value['name'], $value['taxonomy'], $value['data']);
    endforeach;

    

    $style = new CPT_Style();
    register_post_type(CPT_Style::SLUG, $style->get_param());
    register_taxonomy(CPT_Style::TAXONOMY, CPT_Style::SLUG, $style->get_tax());
    register_taxonomy(CPT_Style::TAG, CPT_Style::SLUG, $style->get_tag());
    register_taxonomy(CPT_Style::TAX_STYLE, CPT_Style::SLUG, $style->get_style());
    register_taxonomy(CPT_Style::TAX_COLOR, CPT_Style::SLUG, $style->get_color());
    $terms = $style->get_terms();
    foreach($terms as $key => $value):
        wp_insert_term($value['name'], $value['taxonomy'], $value['data']);
    endforeach;
    $tags = $style->get_terms_tag();
    foreach($tags as $key => $value):
        wp_insert_term($value['name'], $value['taxonomy'], $value['data']);
    endforeach;

    $style = new CPT_Faq();
    register_post_type(CPT_Faq::SLUG, $style->get_param());
    register_taxonomy(CPT_Faq::TAXONOMY, CPT_Faq::SLUG, $style->get_tax());
    // $tech = new CPT_Technique();
    // register_post_type(CPT_Technique::SLUG, $tech->get_param());
}
add_action( 'init', 'create_post_type' );

/**
 * SCF用のオプションページ追加
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
add_action( 'init', function() {
	SCF::add_options_page( 
		'トップページの設定',
		'トップページ設定',
		'manage_options',
		'scfex-toppage',
		'dashicons-admin-generic',
		80
	);
} );
add_action( 'init', function() {
	SCF::add_options_page( 
		'店舗情報の設定',
		'店舗情報',
		'manage_options',
		'scfex-shopinfo',
		'dashicons-admin-generic',
		81
	);
} );
add_action( 'init', function() {
	SCF::add_options_page( 
		'SEOタグの追加設定',
		'SEOタグ設定',
		'manage_options',
		'scfex-opt',
		'dashicons-admin-generic',
		82
	);
} );


/**
 * カスタムフィールドを定義
 * 
 * @param array  $settings  Smart_Custom_Fields_Setting オブジェクトの配列
 * @param string $type      投稿タイプ ( post | page | cpt_slug ) or ロール
 * @param int    $id        投稿ID or ユーザーID
 * @param string $meta_type post | user | term
 * @return array
 */
function my_register_fields( $settings, $type, $id, $meta_type ) {
    if( $meta_type == 'post' && $type == CPT_Blog::SLUG ) :
        $cpt_obj = new CPT_Blog();
        $Setting = SCF::add_setting( CPT_Blog::SCF_ID, CPT_Blog::SCF_TITLE );

        $cf_group = $cpt_obj->get_fields();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;

    elseif($meta_type == 'option' && $type == CPT_OptionPage::SLUG):
        $cpt_obj = new CPT_OptionPage();
        $pt_group = $cpt_obj->get_posttypes();
        // var_dump($pt_group);
        foreach($pt_group as $key => $item):
            $Setting = SCF::add_setting( $item['menu-id'], $item['menu-title'] );
            $cf_group = $item['groups'];
            foreach($cf_group as $key => $value):
                $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
            endforeach;
    
            $settings[] = $Setting;
        endforeach;

    elseif($meta_type == 'option' && $type == CPT_ShopInfo::SLUG):
        $cpt_obj = new CPT_ShopInfo();
        $pt_group = $cpt_obj->get_posttypes();
        // var_dump($pt_group);
        foreach($pt_group as $key => $item):
            $Setting = SCF::add_setting( $item['menu-id'], $item['menu-title'] );
            $cf_group = $item['groups'];
            foreach($cf_group as $key => $value):
                $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
            endforeach;
    
            $settings[] = $Setting;
        endforeach;

    elseif($meta_type == 'option' && $type == CPT_Toppage::SLUG):
        $cpt_obj = new CPT_Toppage();
        $pt_group = $cpt_obj->get_posttypes();
        // var_dump($pt_group);
        foreach($pt_group as $key => $item):
            $Setting = SCF::add_setting( $item['menu-id'], $item['menu-title'] );
            $cf_group = $item['groups'];
            foreach($cf_group as $key => $value):
                $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
            endforeach;
    
            $settings[] = $Setting;
        endforeach;
    elseif($meta_type == 'post' && $type == CPT_Staff::SLUG):
        $cpt_obj = new CPT_Staff();
        $Setting = SCF::add_setting( CPT_Staff::SCF_ID, CPT_Staff::SCF_TITLE );

        $cf_group = $cpt_obj->get_fields();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;
    
    elseif($meta_type == 'post' && $type == CPT_Style::SLUG):
        $cpt_obj = new CPT_Style();
        $Setting = SCF::add_setting( CPT_Style::SCF_ID, CPT_Style::SCF_TITLE );

        $cf_group = $cpt_obj->get_fields();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;
    
    elseif($meta_type == 'post' && $type == CPT_Faq::SLUG):
        $cpt_obj = new CPT_Faq();
        $Setting = SCF::add_setting( CPT_Faq::SCF_ID, CPT_Faq::SCF_TITLE );

        $cf_group = $cpt_obj->get_fields();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;
    
    elseif($meta_type == 'post' && $type == CPT_Menu::SLUG):
        $cpt_obj = new CPT_Menu();
        $Setting = SCF::add_setting( CPT_Menu::SCF_ID, CPT_Menu::SCF_TITLE );

        $cf_group = $cpt_obj->get_fields();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;

        $Setting = SCF::add_setting( CPT_Menu::SCF_ID2, CPT_Menu::SCF_TITLE2 );
        $cf_group = $cpt_obj->get_fields_detail();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;

    elseif($meta_type == 'post' && $type == CPT_Coupon::SLUG):
        $cpt_obj = new CPT_Coupon();
        $Setting = SCF::add_setting( CPT_Coupon::SCF_ID, CPT_Coupon::SCF_TITLE );

        $cf_group = $cpt_obj->get_fields();
        foreach($cf_group as $key => $value):
            $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
        endforeach;

        $settings[] = $Setting;

    // elseif($meta_type == 'post' && $type == CPT_Technique::SLUG):
    //     $cpt_obj = new CPT_Technique();
    //     $Setting = SCF::add_setting( CPT_Technique::SCF_ID, CPT_Technique::SCF_TITLE );

    //     $cf_group = $cpt_obj->get_fields();
    //     foreach($cf_group as $key => $value):
    //         $Setting->add_group($value['group'], $value['repeat'], $value['settings']);
    //     endforeach;

    //     $settings[] = $Setting;


    endif;
    return $settings;
}

add_filter( 'smart-cf-register-fields', 'my_register_fields', 10, 4 );


// HTMLエディタで使用できるタグを追加
add_filter( 'wp_kses_allowed_html', 'customKsesAllowedHtml', 10, 2 );

function customKsesAllowedHtml( $tags, $context ) {
    if ( $context == 'post' ) {
        $tags['script'] = array(
            'async' => true,
            'src' => true,
        );
        // $tags['button'] = array(
        //     'data-hoge-hoge'=>true,
        //     'data-piyo-piyo'=>true,
        //     'class'=>true
        // );
        // $tags['div'] = array(
        //     'data-hoge-hoge'=>true,
        //     'data-piyo-piyo'=>true,
        //     'class'=>true,
        //     'id'=>true
        // );
    }
    return $tags;
}

