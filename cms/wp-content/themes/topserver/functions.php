<?php

/*===================================
WP更新通知を消す
===================================*/
//add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));

// プラグイン更新通知非表示
//remove_action('load-update-core.php', 'wp_update_plugins');
//add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;"));

// テーマ更新通知非表示
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));

// generatorを非表示にする
remove_action('wp_head', 'wp_generator');


/*===================================
ショートコードを使ったphpファイルの呼び出し方法
===================================*/

function my_php_Include($params = array()) {
 extract(shortcode_atts(array('file' => 'default'), $params));
 ob_start();
 include(STYLESHEETPATH . "/php/$file.php");
 return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');


/*===================================
固定ページ　画像
===================================*/

function imagepassshort($arg) {
$content = str_replace('"img/', '"' . get_bloginfo('template_directory') . '/img/', $arg);
return $content;
}
add_action('the_content', 'imagepassshort');


/*===================================
アイキャッチ画像
===================================*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(220, 165, true );
//add_image_size( '75-50', 75, 50, true ); // ニュース サムネイル


/*===================================
TOPページショートコード
===================================*/

//TOPページ
add_shortcode('hurl', 'shortcode_hurl');
function shortcode_hurl() {
return home_url( '/' );
}

/*===================================
メールアドレスの再入力チェック
===================================*/

function wpcf7_main_validation_filter( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['name'];
  $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
  if ( 'email' == $type || 'email*' == $type ) {
    if (preg_match('/(.*)_confirm$/', $name, $matches)){
      $target_name = $matches[1];
      if ($_POST[$name] != $_POST[$target_name]) {
        if (method_exists($result, 'invalidate')) {
          $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
      } else {
          $result['valid'] = false;
          $result['reason'][$name] = '確認用のメールアドレスが一致していません';
        }
      }
    }
  }
  return $result;
}

add_filter( 'wpcf7_validate_email', 'wpcf7_main_validation_filter', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_main_validation_filter', 11, 2 );

/*===================================
ページネーション
===================================*/
function pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<div class='pagination'>";
		//echo "<div class='pagination'><span>Page ".$paged." of ".$pages."</span>";
		//if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1) echo "<a class='prev' href='".get_pagenum_link($paged - 1)."'>&laquo;</a>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a>";
			}
		}
		if ($paged < $pages) echo "<a class='next' href='".get_pagenum_link($paged + 1)."'>&raquo;</a>";
		//if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "</div>";
	}
}



/*===================================
親ページのスラッグを取得
===================================*/
function is_parent_slug() {
	global $post;
	if ($post->post_parent) {
		$post_data = get_post($post->post_parent);
		return $post_data->post_name;
	}
}

/*===================================
自動整形をはずす
===================================*/
// remove_filter('the_content', 'wpautop');
// remove_filter('the_content', 'wptexturize');

function disable_page_wpautop() {
	if ( is_page() ) {
		remove_filter('the_content', 'wpautop');
		remove_filter('the_content', 'wptexturize');
	}
}
add_action( 'wp', 'disable_page_wpautop' );



/*===================================
属性値消失を防ぐ関数
===================================*/
if ( !function_exists('pnd_allow_all_attr') ) {
function pnd_allow_all_attr ($init) {
$ext_elements = '';

$target_elements = array(
'a', 'b', 'base', 'big', 'blockquote', 'body', 'br', 'caption', 'clear', 'dd', 'div', 'dl',
'dt', 'em', 'embed', 'font', 'form', 'h', 'head',  'hr', 'html', 'i', 'img', 'input',
'li', 'link', 'meta', 'nobr', 'noembed', 'object', 'ol', 'option', 'p', 'pre', 'rel','s',
'script', 'select', 'small',  'span', 'strike', 'strong', 'sub', 'sup', 'table',
'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'title', 'tr', 'tt', 'u', 'ul',
'iframe'
);
$target_attr = array(
'*'
);

foreach ($target_elements as $target_element) {
$ext_elements .= ",".$target_element."[".implode('|',$target_attr)."]";
}

if ( !empty($ext_elements) ) {
if ( !empty($init['extended_valid_elements']) )
$init['extended_valid_elements'] .= $ext_elements;
else
$init['extended_valid_elements'] = trim($ext_elements, ',');
}

return $init;
}
add_filter( 'tiny_mce_before_init', 'pnd_allow_all_attr', 100 );
}


/*===================================
投稿アーカイブページの作成
===================================*/

function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'information'; //任意のスラッグ名
	}
	return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );



/*===================================
カスタム投稿
===================================*/
/*add_action( 'init', 'create_post_type' );
function create_post_type() {

	// ブログ
	register_post_type( 'blog',
		array(
			'labels' => array(
				'name' => __( 'ブログ' ),
				'singular_name' => __( 'ブログ')
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'menu_position' =>5,
			'has_archive' => true
		)
	);

	// ブログ カテゴリ
	register_taxonomy(
		'blog-category',
		'blog',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'カテゴリ',
			'singular_label' => 'カテゴリ',
			'public' => true,
			'show_ui' => true
		)
	);


}*/


/*============================================
絶対パスを相対パスに
============================================== */
class relative_URI {
	function relative_URI() {
		add_action('get_header', array(&$this, 'get_header'), 1);
		add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
	}
	function replace_relative_URI($content) {
		$home_url = trailingslashit(get_home_url('/'));
		
		$host = $_SERVER["HTTP_HOST"];
		if($host=="dns1.prontonet.ne.jp") {// dns1の場合
			return str_replace($home_url, '/hp/shimakura/xxx/', $content);

		} else {// その他の環境の場合（本番やバックアップサーバー）
			return str_replace($home_url, '/', $content);
			// ドメインルート以外にWPをインストールした場合は以下のようにする
			// return str_replace($home_url, '/blog/', $content); ←フォルダ名「blog」の場合
		}
	}
	function get_header(){
		ob_start(array(&$this, 'replace_relative_URI'));
	}
	function wp_footer(){
		ob_end_flush();
	}
}
new relative_URI();





/*===================================
管理バー 項目非表示
===================================*/

//全員
//function remove_bar_menus( $wp_admin_bar ) {
	//$wp_admin_bar->remove_menu( 'wp-logo' );      // ロゴ
	//$wp_admin_bar->remove_menu( 'site-name' );    // サイト名
	//$wp_admin_bar->remove_menu( 'view-site' );    // サイト名 -> サイトを表示
	//$wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 -> ダッシュボード (公開側)
	//$wp_admin_bar->remove_menu( 'themes' );       // サイト名 -> テーマ (公開側)
	//$wp_admin_bar->remove_menu( 'customize' );    // サイト名 -> カスタマイズ (公開側)
	//$wp_admin_bar->remove_menu( 'comments' );     // コメント
	//$wp_admin_bar->remove_menu( 'updates' );      // 更新
	//$wp_admin_bar->remove_menu( 'view' );         // 投稿を表示
	//$wp_admin_bar->remove_menu( 'new-content' );  // 新規
	//$wp_admin_bar->remove_menu( 'new-post' );     // 新規 -> 投稿
	//$wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
	//$wp_admin_bar->remove_menu( 'new-link' );     // 新規 -> リンク
	//$wp_admin_bar->remove_menu( 'new-page' );     // 新規 -> 固定ページ
	//$wp_admin_bar->remove_menu( 'new-user' );     // 新規 -> ユーザー
	//$wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
	//$wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント -> プロフィール
	//$wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント -> プロフィール編集
	//$wp_admin_bar->remove_menu( 'logout' );       // マイアカウント -> ログアウト
	//$wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
//}
//add_action('admin_bar_menu', 'remove_bar_menus', 201);

function remove_bar_menus_user( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'comments' );     // コメント
	$wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
}

//管理者以外
if(!current_user_can('administrator')){
	add_action('admin_bar_menu', 'remove_bar_menus_user', 201);
}

/*郵便番号自動検索フォーム*/
wp_enqueue_script('yubinbango','https://yubinbango.github.io/yubinbango/yubinbango.js',array(),false,true );

if(is_page('new')){
		wp_enqueue_script('ajaxzip3','https://ajaxzip3.github.io/ajaxzip3.js',array(),'',true);
		wp_enqueue_script('useajaxzip3',get_template_directory_uri().'/js/useajaxzip3.js',array(),'',true);
}

//データピッカーをIEでも動作させる。
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

/**　* contact-form-7プラグインにて半角数字かどうかを確認 郵便番号 */
// add_filter('wpcf7_validate_text',  'wpcf7_validate_post', 11, 2);
add_filter('wpcf7_validate_text*', 'wpcf7_validate_post', 11, 2);
function wpcf7_validate_post($result,$tag){
  $tag = new WPCF7_Shortcode($tag);
  $name = $tag->name;
  $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";
  // フォーム側のnameです
  if ($name === "zipcode1" ||$name === "zipcode2" ) {
    // 半角数字のみ許可
    if(!preg_match("/^[0-9]+$/", $value)) {
      $result->invalidate($tag, "半角数字のみで入力してください。");
    }
  }
  return $result;
}

// Remove auto p from Contact Form 7 shortcode output
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}