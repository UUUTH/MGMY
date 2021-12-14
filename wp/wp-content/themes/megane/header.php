<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?php 
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	if((is_page()||is_singular('post'))&&get_field('ff_title')){
		echo get_field('ff_title').' ｜ ';
	}else{
		wp_title( '|', true, 'right' );
	}
	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', '' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="<?php if(is_home()||is_front_page()){ echo '京都府亀岡市・南丹市・兵庫県川辺郡猪名川町のメガネ・補聴器・コンタクトレンズの専門店です。';}else if(is_category()||is_date()){ echo 'メガネの松山（亀岡本店）、ハートアップ亀岡（亀岡市）、メガネの松山（園部店）、STYLISH 松山（川辺郡）のお知らせを発信させていただいています。';}else if((is_page()||is_singular('post'))&&get_field('ff_keywords')){ the_field('ff_description');}?>">
	<meta name="keywords" content="<?php if((is_page()||is_singular('post'))&&get_field('ff_keywords')){ the_field('ff_keywords');}?>">
	<meta name="format-detection" content="telephone=no">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/css/reset.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/css/swiper.min.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url');?>/img/favicon.ico">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-203959643-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-203959643-1');
	</script>
	<?php wp_head(); ?>
</head>
<body>
	<!-- ------------------------ヘッダー------------------------ -->
	<header id="header" class="header">
		<h1><a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/img/common/header__logo.png"></a></h1>
		<ul class="header__btn">
			<li class="header__btn__contactlens"><a href="https://www.heart-up.net/" class="btn__contactlens" target="_blank">コンタクトレンズ</a></li>
			<li class="header__btn__contact"><a href="<?php bloginfo('url');?>/contact" class="btn__contact">お問い合わせ</a></li>
		</ul>
		<div class="sp-menu header-sp">
			<span class="wp-txt"></span>
			<span class="wp-txt"></span>
			<span class="wp-txt"></span>
		</div>
	</header>
	<div class="sp-navi">
		<div class="sp-navi-item">
			<h4 class="navi__title navi__open"><a href="<?php bloginfo('url');?>/eyewear">メガネ</a></h4>
			<div class="navi__link">
				<a href="<?php bloginfo('url');?>/eyewear">・こだわりのブランドフレーム</a>
				<a href="<?php bloginfo('url');?>/eyewear/usage">・メガネの使い分け</a>
				<a href="<?php bloginfo('url');?>/eyewear/lens">・レンズの機能</a>
				<a href="<?php bloginfo('url');?>/eyewear/choice">・似合うメガネの選び方</a>
				<a href="<?php bloginfo('url');?>/eyewear/welfare-system">・眼鏡の福祉制度</a>
			</div>
		</div>
		<div class="sp-navi-item">
			<h4 class="navi__title navi__open"><a href="<?php bloginfo('url');?>/aid">補聴器</a></h4>
			<div class="navi__link">
				<a href="<?php bloginfo('url');?>/aid/process">・補聴器選びの流れ</a>
				<a href="<?php bloginfo('url');?>/aid/audibility/">・聴力の低下と難聴について</a>
				<a href="<?php bloginfo('url');?>/aid/type-level">・難聴の種類と程度について</a>
				<a href="<?php bloginfo('url');?>/aid/aid-type">・両耳装用のメリット</a>
				<a href="<?php bloginfo('url');?>/aid/subsidy">・補聴器と補助金</a>
			</div>
		</div>
		<div class="sp-navi-item not-open">
			<h4 class="navi__title"><a href="<?php bloginfo('url');?>/contact-lens">コンタクトレンズ</a></h4>
		</div>
		<div class="sp-navi-item">
			<h4 class="navi__title navi__open"><a href="<?php bloginfo('url');?>/shop">店舗情報</a></h4>
			<div class="navi__link">
				<a href="<?php bloginfo('url');?>/shop/#a01">・メガネの松山（亀岡本店）</a>
				<a href="<?php bloginfo('url');?>/shop/#a02">・ハートアップ亀岡（亀岡市）</a>
				<a href="<?php bloginfo('url');?>/shop/#a03">・メガネの松山（園部店）</a>
				<a href="<?php bloginfo('url');?>/shop/#a04">・STYLISH 松山（川辺郡）</a>
			</div>
		</div>
		<div class="sp-navi-item not-open">
			<h4 class="navi__title"><a href="<?php bloginfo('url');?>/blog">ブログ</a></h4>
		</div>
	</div>
	<!-- ------------------------メインビジュアル------------------------ -->
	<div class="main">