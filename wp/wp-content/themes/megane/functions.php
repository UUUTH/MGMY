<?php
function remove_wp_open_sans() {
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
}
add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
add_action('admin_enqueue_scripts', 'remove_wp_open_sans');


add_theme_support( 'post-thumbnails' );
//add_image_size('size-news',240,175,true);
/**
* size
**/
add_action( 'after_setup_theme', 'default_attachment_display_settings' );
function default_attachment_display_settings() {
	update_option( 'image_default_align', 'none' );
	update_option( 'image_default_link_type', 'none' );
	update_option( 'image_default_size', 'full' );
}
/**
* get page name
**/
function getPageName(){
	if(is_home()||is_front_page()){
		$pname='index';
	}else if(is_category()||is_singular('post')||is_date()){
		$pname='case';
	}else if(is_page()){
		$pageId = get_the_ID();
		$curPage = get_page($pageId);
		$curPageParent = $curPage->post_parent;
		if($curPageParent == 0){
			$pname = $curPage->post_name;
		}else{
			$pname = get_page(get_top_parent_page_id())->post_name;
		}
	}else{
		$pname='';
	}
	return $pname;
}

function get_top_parent_page_id() {
    global $post;
    $ancestors = $post->ancestors;
    if ($ancestors) {
        return end($ancestors);
    } else {
        return $post->ID;
    }
}


function get_page_id($page_name){
    global $wpdb;
    $page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."' AND post_status = 'publish' AND post_type = 'page'");
    return $page_name;
}


/**
 * shortcode
 */
function template_src() {
    return get_bloginfo('template_url');
}

function template_url() {
    return get_bloginfo('url');
}

add_shortcode('src', 'template_src');
add_shortcode('url', 'template_url');


//category select

add_filter('wp_terms_checklist_args','wp_terms_checklist_args');

function wp_terms_checklist_args($args) {
    $args['checked_ontop'] = false;
    return $args;
}


/**
 * Disable wpautop
 */
function needRemoveP() {
	if ( get_post_type() == 'page'){
		remove_filter('the_content', 'wpautop'); 
		remove_filter('the_content', 'balanceTags');
		remove_filter('the_content', 'wptexturize');
	}
}
//curPageURL
function curPageURL() {
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"]) == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80"){
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	}else{
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
} 
/**
 * Disable the emoji's
 */
 function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 }
 add_action( 'init', 'disable_emojis' );
 
 
// windows chrome で見えるL SEPを表示時に削除する

function usort_edit_lsep_contents($contents){
    return pack("H*",str_replace("e280a8","",bin2hex($contents)));
}
add_filter('the_content', 'usort_edit_lsep_contents');

/**
 * Filter function used to remove the tinymce emoji plugin.
 */
 function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
 }

/**
 * 固定ページではビジュアルエディタを利用できないようにする 固定页隐藏视图模式
 */

function disable_visual_editor_in_page(){

  global $typenow;
  if( $typenow == 'page' ){
    add_filter('user_can_richedit', 'disable_visual_editor_filter');
  }

}

function disable_visual_editor_filter(){
  return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );

//wordpress-scaling-image-sizes
add_filter( 'big_image_size_threshold', '__return_false' );

// remove srcset
add_filter( 'wp_calculate_image_srcset', '__return_false' );

//wptexturize
remove_filter( 'the_content', 'wptexturize' );

//html5 support
add_action(
    'after_setup_theme',
    function() {
		add_theme_support('html5', array('script','style'));
    }
);

/* 
   Debug preview with custom fields
*/ 

function get_preview_id($postId) {
    global $post;
    $previewId = 0;
    if ( isset($_GET['preview'])
            && ($post->ID == $postId)
                && $_GET['preview'] == true
                    &&  ($postId == url_to_postid($_SERVER['REQUEST_URI']))
        ) {
        $preview = wp_get_post_autosave($postId);
        if ($preview != false) { $previewId = $preview->ID; }
    }
    return $previewId;
}

add_filter('get_post_metadata', function($meta_value, $post_id, $meta_key, $single) {
    if ($preview_id = get_preview_id($post_id)) {
        if ($post_id != $preview_id) {
            $meta_value = get_post_meta($preview_id, $meta_key, $single);
        }
    }
    return $meta_value;
}, 10, 4);

add_action('wp_insert_post', function ($postId) {
    global $wpdb;
    if (wp_is_post_revision($postId)) {
        if (isset($_POST['fields']) && count($_POST['fields']) != 0) {
            foreach ($_POST['fields'] as $key => $value) {
                $field = get_field($key);
                if ( !isset($field['name']) || !isset($field['key']) ) continue;
                if (count(get_metadata('post', $postId, $field['name'], $value)) != 0) {
                    update_metadata('post', $postId, $field['name'], $value);
                    update_metadata('post', $postId, "_" . $field['name'], $field['key']);
                } else {
                    add_metadata('post', $postId, $field['name'], $value);
                    add_metadata('post', $postId, "_" . $field['name'], $field['key']);
                }
            }
        }
        do_action('save_preview_postmeta', $postId);
    }
});

//excerpt
function get_excerpt($count){
	$content = get_the_content();
	$trimmed_content = wp_trim_words( $content, $count, '' );
	echo $trimmed_content;
}

//shortcode [add_part part='com-btn-list']
add_shortcode('add_part', function($attr){
	ob_start();
	get_template_part($attr['part']);
	return ob_get_clean();   
});