<?php


/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

 


//** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'sa-ba');
/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');
/** MySQL データベースのパスワード */
define('DB_PASSWORD', '');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$iRb9nk>k@5+6xln_)RKs^FfN;%~9V<JfMRHS>b6vS[{Vt<b?N0knom$jqWw6^;Q');
define('SECURE_AUTH_KEY',  '|2HM<]x@&,CrvooDS?jDgnP1fA*U,Bu{;SM.-$;].Q|ppe[c6hD+Fqe7c%V4Py;,');
define('LOGGED_IN_KEY',    'M{2>[9}BuzuRZZ4Oz%*jv%R99j8hC&h7tZicuB.},7JVWV&jfT*Zb5%Xk*>a`pP,');
define('NONCE_KEY',        'K?$3/08xA[lIQRNUAIS*oj|mRx6gID|7~6>o*IzPqN4trrV8tN}8Toqm)~:!DnkW');
define('AUTH_SALT',        '#v+aye6f=j#a2%>)zr4Qyg#$<nVV:)2:..n%Gg%GGHHT=wX.;6&*dK(F7E3otNsp');
define('SECURE_AUTH_SALT', ';x}IV#K9nR(-~gu[>SYJzaX?x7</*]s>15p4o`+y+}2=A*uB3G[hM_uU1*4k,o^6');
define('LOGGED_IN_SALT',   'a|j%BUIW2.W2xR27Lv,lfnaBX{d{K46b,{`Io2WU<|.h,0cAf0?fDDoHdAnRO$:k');
define('NONCE_SALT',       '8K4sq]V_D[Sn/!-a>TJLK3-tJ@e4N#pG>vv=}B$U[jH%7*(JEPGr526cx!_YLbw.');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'topserver_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);
define ('WPCF7_AUTOP', false);
/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

// require_once('/var/www/vhosts/wp_checkjp.php');


/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
