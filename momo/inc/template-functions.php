<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package momo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function momo_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'momo_body_classes' );

//記事の最初の画像をアイキャッチ画像代わりに取得する
function get_catch_img(){
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    // var_dump($matches);
    if(is_array($matches) && isset($matches[1][0])):
        $first_img = $matches[1][0];
    else:
        // 記事内で画像がなかったときのためのデフォルト画像を指定
        $current_blog_id = get_current_blog_id();
        $base_blog_name = wp_basename(get_blog_option($current_blog_id, 'siteurl'));
        if($base_blog_name):
            $first_img = network_home_url()."common/images/".$base_blog_name."_default.png";
        else:
            $first_img = network_home_url()."common/images/default.png";
        endif;
    endif;

    return $first_img;
}

/*
* スラッグ名が日本語だったら自動的に投稿タイプ＋id付与へ変更（スラッグを設定した場合は適用しない）
*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if( $post_type === 'hairstyle' || $post_type === 'staff' )
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

/* メインメニュー */
function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if($args->theme_location == 'main-menu'):
        $item_output = str_replace( '<a href' , '<a data-role="fade" href' , $item_output );
    endif;
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

function body_id(){
    if (is_front_page() || is_home()):
        echo 'id="top"';
    elseif (is_post_type_archive('staff')):
        echo 'id="staff"';
    elseif (is_singular('staff')):
        echo 'id="staffDetail"';
    elseif (is_singular('technique')):
        echo 'id="pageContents"';
    elseif (is_post_type_archive('menu')):
        echo 'id="menuPage"';
    elseif (is_post_type_archive('coupon')):
        echo 'id="coupon"';
    elseif (is_singular('hairstyle')):
        echo 'id="styleDetail"';
    elseif (is_post_type_archive('hairstyle') || is_tax('hairstyle-length') || is_tax('hairstyle-tag')):
        echo 'id="style"';
    elseif (is_search()):
        $post_type = get_query_var('post_type');
        if($post_type == 'hairstyle'):
            echo 'id="style"';
        elseif($post_type == 'post'):
            echo 'id="blog"';
        endif;
    elseif (is_page('ranking')):
        echo 'id="pageContents"';
    elseif (is_post_type_archive('faq')):
        echo 'id="faq"';
    elseif (is_archive()):
        $category_object = get_queried_object();
        $cat_name = $category_object->slug ? $category_object->slug : '';
        if($cat_name === 'contents'):
            echo 'id="contentsList"';
        else:
            echo 'id="blog"';
        endif;
    elseif (is_page('reserve')):
        echo 'id="reserve"';
    elseif (is_singular()):
        $cate = get_the_category();
        $cat_name = $cate[0]->slug;
        if($cat_name === 'contents'):
            echo 'id="contentsDetail"';
        else:
            echo 'id="blogDetail"';
        endif;
    endif;
}


function my_excerpt($length,$break = false) {
	global $post;
	$content = mb_substr(strip_tags($post->post_excerpt),0,$length);
	if(!$content){
		$content =  $post->post_content;
		$content =  do_shortcode($content);
		$content =  strip_tags($content);
		$content =  str_replace("&nbsp;","",$content);
        $content =  html_entity_decode($content,ENT_QUOTES,"UTF-8");
        $len = mb_strlen($content);
        $content =  mb_substr($content,0,$length);
        if( $len > $length ){
            $content .= '...';
        }
        if($break){
            $content =  nl2br($content);
        }else{
            $content = str_replace(array("\r\n","\n","\r"), '', $content);
        }
	}
	return $content;
}


/**
 * 数字のみ抽出する
 *
 * @param string ソース文字列
 * @return string 抽出した数値
 */
function extract_number( $subject = '' , $pre = '', $suf = '') {

    $ret = '';
    $pattern = '/[0-9,０-９，]+/u';
    $pattern2 = '/[~～]+/u';
    $pattern3 = '/[%％]+/u';
    $pattern4 = '/[円オフ]+/u';

    if ( $result = preg_match( $pattern, $subject, $matches ) ) :

        // マッチングした数字を抜き出す
        $num = $matches[0];

        // 半角数字に変換
        $num_half_width = mb_convert_kana( $num, 'anr' );

        // 区切りカンマを削除
        $num_plain = preg_replace( '/,/', '', $num_half_width );

        $ret = number_format($num_plain);

    endif;

    if ($result = preg_match( $pattern3, $subject, $matches ) ) :
        $ret .= '％オフ';
    elseif ($result = preg_match( $pattern4, $subject, $matches ) ) :
        $ret .= '円オフ';
    else:
        $ret = $pre.$ret.$suf;
        if ( $result = preg_match( $pattern2, $subject, $matches ) ) :
            $ret .= '～';
        endif;
    endif;
    return $ret;
}

//カスタム投稿用post_typeセット
add_filter('template_include','custom_search_template');
function custom_search_template($template){
  if ( is_search() ){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
      $templates[] = "{$post_type}-search.php";
    $templates[] = 'search.php';
    $template = get_query_template('search',$templates);
  }
  return $template;
}

/**
 * 投稿に付けられたカテゴリーが、指定されたカテゴリーの子孫カテゴリーに含まれるかテストする
 *
 * @パラメータ 整数|配列 $cats - カテゴリーを指定。整数の ID または整数の ID の配列
 * @パラメータ 整数|オブジェクト $_post - 投稿。省略するとループまたはメインクエリ内の現在の投稿をテストする
 * @戻り値 真偽値 True - 投稿のカテゴリーの一つ以上が指定されたカテゴリーの何れかの子孫カテゴリーである場合
 * @参考 get_term_by() - カテゴリー名またはスラッグからカテゴリー ID を取得するのに使える
 * @内部で使用 get_term_children() - $cats を渡す
 * @内部で使用 in_category() - $_post を渡す（空でもよい）
 * @バージョン 2.7
 * @リンク http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() は整数の ID しか受け付けない
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}