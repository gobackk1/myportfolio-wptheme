<?php

function mytheme_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('responsive-embeds'); //埋め込みコンテンツのレスポンシブ化
  add_theme_support('editor-font-sizes', array(
    array(
      'name' => '小',
      'size' => '12.8',
      'slug' => 'small',
    ),
    array(
      'name' => '中',
      'size' => '16',
      'slug' => 'medium',
    ),
    array(
      'name' => '大',
      'size' => '20',
      'slug' => 'large',
    ),
  ));
  register_nav_menus(array(
    'primary' => 'メイン',
    'drawer' => 'ドロワー',
    'sidebar' => 'サイドバー',
  ));
}
add_action('after_setup_theme', 'mytheme_setup');

//jQueryCDNから読み込む
function jquery_script(){
  if(is_admin()){
    return;
  }
  $jquery_src = 'https://code.jquery.com/jquery-3.4.1.min.js';
  wp_deregister_script('jquery');
  wp_deregister_script('jquery-core');
  wp_register_script('jquery', false ,['jquery-core'],null,true);
  wp_register_script('jquery-core', $jquery_src, [], null, true);
}
add_action('init','jquery_script');

//ファイル読み込み
function my_theme_enqueue(){
  wp_register_style('googlefonts','https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700&display=swap&subset=japanese',array());
  wp_enqueue_style('mytheme-style',get_stylesheet_uri(),array('googlefonts'),date('U'));
  wp_enqueue_script('mytheme-main-js',get_template_directory_uri().'/js/main.js',array('jquery'),null,true);
  if(is_front_page()){
    wp_enqueue_script('mytheme-top-js',get_template_directory_uri().'/js/top.js',array('jquery'),null,true);
  }
}
add_action('wp_enqueue_scripts','my_theme_enqueue');

//グーテンベルグ由来のcssを無効
function remove_block_library_style(){
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts','remove_block_library_style');

//ウィジェット登録
function mytheme_widgets(){
  register_sidebar(array(
    'id' => 'drawer',
    'name' => 'ドロワー',
    'before_widget' => '',
    'after_widget' => '',
  ));
}
add_action('widgets_init', 'mytheme_widgets');

//contact-form7由来のファイルをほかのページで読み込まない
function wpcf7_load_file(){
  add_filter('wpcf7_load_js','__return_false');
  add_filter('wpcf7_load_css','__return_false');
  if(is_page('contact')){
    wpcf7_enqueue_scripts();
    wpcf7_enqueue_styles();
  }
}
add_action('template_redirect','wpcf7_load_file');

//ショートコード
function shortcode_url(){
  return esc_url(home_url());
}
add_shortcode('url','shortcode_url');

//制作時の画像パスのままCMS化できるように
function replace_path($arg) {
	$content = str_replace('"assets/', '"' . get_template_directory_uri().'/', $arg);
	return $content;
}
add_action('the_content', 'replace_path');

remove_filter('the_content', 'wpautop');// 記事の自動整形を無効にする
remove_filter('the_excerpt', 'wpautop');// 抜粋の自動整形を無効にする

add_filter('widget_text', 'do_shortcode' );
//絵文字を使わないなら
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
//ブログ投稿ツールを使わないなら
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
//WordPressのバージョンの表示をしないなら
remove_action('wp_head', 'wp_generator');
//ページ間の関係を示すrel=”prev”とrel=”next”を表示しないなら
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
//短縮URLの表示をしないなら
remove_action('wp_head', 'wp_shortlink_wp_head');
//RSSフィードを使わないなら
remove_action('wp_head', 'feed_links_extra', 3);

//functions

//親固定ページあるかチェックする
function page_has_parent(){
  global $post;
  if( is_page() && $post -> post_parent){
    return $post -> post_parent;
  } else {
    return false;
  }
}
