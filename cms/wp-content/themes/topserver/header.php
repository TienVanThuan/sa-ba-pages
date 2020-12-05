<!DOCTYPE html>
<html lang="ja">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158871509-1"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158871509-1');
</script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<meta name="keywords" content="TOP SERVER,PC SUPPORT,レンタルサーバー,ドメイン無料,独自ドメイン" />
<?php if(is_home()){ $description = get_bloginfo('name');
}else{ $description = get_bloginfo('name').' | '.trim(wp_title('',false)); } ?>
<meta name="description" content="<?php echo $description.' | '.get_bloginfo('description'); ?>" />

<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>


<?php /*=======================================
Favicon
===============================================*/ ?>
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="Shortcut Icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />


<?php /*=======================================
CSS
===============================================*/ ?>
<?php //サイトに合わせて、1・2どちらかのCSS読み込みを使用 ?>

<?php // 2 PC・スマホ（レスポンシブ）サイトの場合 ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css?<?php echo filemtime(TEMPLATEPATH.'/style.css'); ?>" media="screen and (min-width: 641px), print" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style-sp.css?<?php echo filemtime(TEMPLATEPATH.'/style-sp.css'); ?>" media="only screen and (max-width: 640px), only and (max-device-width: 735px) and (orientation : landscape)" />

<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">


<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo filemtime(TEMPLATEPATH.'/style.css'); ?>" type="text/css" media="all" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/selectivizr-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/respond.js"></script>
<![endif]-->


<?php /*=======================================
JavaScript
===============================================*/ ?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!--<script src="http://jpostal-1006.appspot.com/jquery.jpostal.js"></script>-->
<script src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>

<?php /* function.js */ ?>
<script src="<?php bloginfo('template_directory'); ?>/js/function.js?<?php echo filemtime(TEMPLATEPATH.'/js/function.js'); ?>"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/search-domain.js?01<?php echo filemtime(TEMPLATEPATH.'/js/search-domain.js'); ?>"></script>

<?php wp_head(); ?>

</head>

<body data-tmpdir="<?php echo esc_url(get_template_directory_uri()); ?>/">

<?php /* Facebookを利用する場合 */ ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div id="container">



	<div class="l-header <?php if(!is_home()):?>l-header--border<?php endif;?> pc-only">

		<div class="c-wrap">
      <div class="logo">
        <h1><a href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/img/common/logo_head01.jpg" width="135" height="24" alt="TOP SERVER"></a></h1>
        <p>独自ドメイン無料のレンタルサーバー</p>
      </div>
      <div class="nav">
        <ul class="menu">
            <li class="menu__single"><a href="<?php echo home_url(); ?>/">ホーム</a></li>
            <li class="menu__single">
                <a href="<?php echo home_url(); ?>/price/" class="init-bottom">ご利用料金</a>
                <ul class="menu__second-level">
                    <li><a href="<?php echo home_url(); ?>/price/mini-plan/">ミニプラン</a></li>
                    <li><a href="<?php echo home_url(); ?>/price/light-plan/">ライトプラン</a></li>
                    <li><a href="<?php echo home_url(); ?>/price/plus-plan/">プラスプラン</a></li>
                    <li><a href="<?php echo home_url(); ?>/price/super-plan/">スーパープラン</a></li>
                    <li><a href="<?php echo home_url(); ?>/price/">価格表</a></li>
                </ul>
            </li>
            <li class="menu__single">
                <a href="#" class="init-bottom">お申込み</a>
                <ul class="menu__second-level">
                    <li><a href="<?php echo home_url(); ?>/application/new/">新規お申込み</a></li>
                    <li><a href="<?php echo home_url(); ?>/application/done/">入金ご連絡フォーム</a></li>
                    <li><a href="<?php echo home_url(); ?>/application/new-admin/">管理情報変更依頼フォーム</a></li>
                    <li><a href="<?php echo home_url(); ?>/application/change/">プラン変更依頼フォーム</a></li>
                    <li><a href="<?php echo home_url(); ?>/application/register/">ドメイン登録情報変更フォーム</a></li>
                    <li><a href="<?php echo home_url(); ?>/application/cancellation/">解約依頼フォーム</a></li>
                </ul>
            </li>
            
            <li class="menu__single">
                <a href="#" class="init-bottom">サポート</a>
                <ul class="menu__second-level">
                    <li><a href="<?php echo home_url(); ?>/support/transfer/">他社からの移転</a></li>
                    <li><a href="<?php echo home_url(); ?>/support/faq/">Q&A</a></li>
                    <li><a href="<?php echo home_url(); ?>/support/contact/">お問い合わせ</a></li>
                    <li><a href="<?php echo home_url(); ?>/support/about/">会社概要</a></li>
                </ul>
            </li>
            
            <li class="menu__single">
                <a href="<?php echo home_url(); ?>/information/" class="init-bottom">お知らせ</a>
                <ul class="menu__second-level">
                    <li><a href="<?php echo home_url(); ?>/information/">新着情報</a></li>
                    <li><a href="<?php echo home_url(); ?>/category/maintenance/">メンテナンス情報</a></li>
                    <li><a href="<?php echo home_url(); ?>/category/obstacle/">障害情報</a></li>
                </ul>
            </li>
            
        </ul>        
      </div>  
    </div>

	</div><!-- /.l-header -->


    <div class="l-head-fix sp-only">
        <div class="c-head">
            <div class="c-head__logo">
                <h1><a href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/img/common/logo_head01.jpg" width="135" height="24" alt="TOP SERVER"></a></h1>
                <div class="c-top-menu openSlide">
                      <a class="menu-trigger" href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                      </a>
                </div>
            </div>
        </div>
        <div id="sp-menu">
            <div class="c-sp-menu">
                <ul>
                    <li class="menu__single"><a href="<?php echo home_url(); ?>/">ホーム</a></li>
                    <li><span>ご利用料金</span>
                        <ul>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/price/mini-plan/">ミニプラン</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/price/light-plan/">ライトプラン</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/price/plus-plan/">プラスプラン</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/price/super-plan/">スーパープラン</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/price/">価格表</a></li>
                        </ul>
                    </li>
                    <li><span>お申込み</span>
                        <ul class="menu__second-level">
                            <li class="c-sp-menu__2" ><a href="<?php echo home_url(); ?>/application/new/">新規お申込み</a></li>
                            <li class="c-sp-menu__2" ><a href="<?php echo home_url(); ?>/application/done/">入金ご連絡フォーム</a></li>
                            <li class="c-sp-menu__2" ><a href="<?php echo home_url(); ?>/application/new-admin/">管理情報変更依頼フォーム</a></li>
                            <li class="c-sp-menu__2" ><a href="<?php echo home_url(); ?>/application/change/">プラン変更依頼フォーム</a></li>
                            <li class="c-sp-menu__2" ><a href="<?php echo home_url(); ?>/application/register/">ドメイン登録情報変更フォーム</a></li>
                            <li class="c-sp-menu__2" ><a href="<?php echo home_url(); ?>/application/cancellation/">解約依頼フォーム</a></li>
                        </ul>
                    </li>
                    <li><span>サポート</span>
                        <ul class="menu__second-level">
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/support/transfer/">他社からの移転</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/support/faq/">Q&A</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/support/contact/">お問い合わせ</a></li>
                            <li class="c-sp-menu__2"><a href="<?php echo home_url(); ?>/support/about/">会社概要</a></li>
                        </ul>
                    </li>
                    <li class="c-sp-menu__3"><span>お知らせ</span>
                        <ul class="menu__second-level">
                            <li class="c-sp-menu__3 c-sp-menu__3-in"><a href="<?php echo home_url(); ?>/information/">新着情報</a></li>
                            <li class="c-sp-menu__3 c-sp-menu__3-in"><a href="<?php echo home_url(); ?>/category/maintenance/">メンテナンス情報</a></li>
                            <li class="c-sp-menu__3 c-sp-menu__3-in"><a href="<?php echo home_url(); ?>/category/obstacle/">障害情報</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="c-sp-menu-contact">
                <p>お問い合わせはこちらからどうぞ</p>
                <a href="tel:0253745660">025-374-5660</a>
                <span>受付時間 ／平日9：00 ～ 18：00</span>
            </div>
        </div>
    </div>


	<div class="l-contents">
