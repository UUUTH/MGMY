<?php get_header(); ?>
<section class="mv">
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="swiper-01 mv-title type1">
					<div class="sp-swiper-img"><img src="<?php bloginfo('template_url');?>/img/top/mv-01sp.png"></div>
					<div class="mv-title-box pc">
						<h2>
							<img src="<?php bloginfo('template_url');?>/img/top/mv-01-h2-01.png" alt="確かな技術とセンスであなたのメガネをおつくりします。">
						</h2>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="swiper-02 mv-title type2">
					<div class="sp-swiper-img"><img src="<?php bloginfo('template_url');?>/img/top/mv-02sp.png"></div>
					<div class="mv-title-box pc">
						<h2>
							<img src="<?php bloginfo('template_url');?>/img/top/mv-01-h2-02.png" alt="補聴器は地元で・気軽に寄れて、調子をみてもらえる・すぐに調整してもらえる・無料メンテナンスを受けられる">
						</h2>
					</div>
				</div>
			</div>
		</div>
		<!--
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
		<div class="swiper-pagination"></div>
	-->
	</div>
	<script src="<?php bloginfo('template_url');?>/js/swiper.min.js"></script>
	<script>
		var swiper = new Swiper('.swiper-container', {
			autoplay: {
				delay: 6000,
				disableOnInteraction:false,
			},
			loop:true,
			speed:1000
			/*
			navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		  },
			
			pagination: {
				el: '.swiper-pagination',
				type: 'bullets',
				clickable: true
			},
			*/
		});
		</script>
</section>
<!-- ------------------------BLOG------------------------ -->
<?php 
	$sticky = get_option('sticky_posts');
	update_option('sticky_posts', array());
	query_posts('showposts=5&post_type=post');if(have_posts()): ?>
<section class="top-blog">
	<div class="top-blog-inner">
		<h3 class="top-common-h3">Blog</h3>
		<p class="top-common-h3-caption">最新情報</p>
		<ul class="top-blog-ul">
			<?php while (have_posts()) : the_post(); ?>
			<?php 
			$terms = get_the_terms($post->ID,'category'); 
			if($terms){
				$subcats = array();
				foreach($terms as $term){
					if($term->parent==1){
						$subcats[]=$term;
					}
				}
			}
			?>
			<li class="top-blog-li">
				<a href="<?php the_permalink();?>">
					<span class="top-blog-li-day"><?php the_time('Y/m/d'); ?></span>
					<?php if($subcats){?><?php foreach ($subcats as $subcat) {$color = get_field('ff_color', 'category_'.$subcat->term_id );?><span class="top-blog-li-tag all"<?php if($color){echo ' style="background-color:'.$color.';"';}?>><?php echo $subcat->name;?></span><?php }?><?php }?>
					<span class="top-blog-li-txt"><?php the_title(); ?></span>
				</a>
			</li>
			<?php endwhile;?>
		</ul>
		<p class="top-more-btn"><a href="<?php bloginfo('url');?>/blog">もっと見る</a></p>
	</div>
</section>
<?php endif; wp_reset_query();update_option('sticky_posts', $sticky);?>
<!-- ------------------------product------------------------ -->
<section class="top-product">
	<div class="top-product-inner">
		<h3 class="top-common-h3">Product</h3>
		<p class="top-common-h3-caption">取り扱い商品</p>
		<div class="top-product-box">
			<div class="top-product-box-list">
				<div class="top-product-box-list-img">
					<img src="<?php bloginfo('template_url');?>/img/top/product-box-list-img-01.png">
				</div>
				<h4 class="top-product-h4">Eye Wear</h4>
				<p class="top-product-h4-caption">メガネ</p>
				<p class="top-product-txt">国産・海外の一流ブランドフレームから機能・デザインにこだわったフレームまで確かな技術と安心の価格でお届けします。<br class="wp-txt">
					修理・調整などもお任せ下さい。</p>
				<p class="top-more-btn"><a href="<?php bloginfo('url');?>/eyewear">もっと見る</a></p>
			</div>
			<div class="top-product-box-list">
				<div class="top-product-box-list-img">
					<img src="<?php bloginfo('template_url');?>/img/top/product-box-list-img-02.png">
				</div>
				<h4 class="top-product-h4">Hearing Aid</h4>
				<p class="top-product-h4-caption">補聴器</p>
				<p class="top-product-txt">「聞こえ」「補聴器」のことは、何でもご相談ください。豊富な専門知識を持った補聴器アドバイザーが、親身になっておこたえさせていただきます。</p>
				<p class="top-more-btn"><a href="<?php bloginfo('url');?>/aid">もっと見る</a></p>
			</div>
			<div class="top-product-box-list">
				<div class="top-product-box-list-img">
					<img src="<?php bloginfo('template_url');?>/img/top/product-box-list-img-03.png">
				</div>
				<h4 class="top-product-h4">Contact Lens</h4>
				<p class="top-product-h4-caption">コンタクトレンズ</p>
				<p class="top-product-txt">使い捨てコンタクトからハードコンタクトまで。お客様が安心してお使いいただけるコンタクトレンズをご用意しております。</p>
				<p class="top-more-btn"><a href="<?php bloginfo('url');?>/contact-lens">もっと見る</a></p>
			</div>
		</div>
	</div>
</section>
<!-- ------------------------SHOP------------------------ -->
<section class="top-shop">
	<div class="top-shop-inner">
		<h3 class="top-common-h3">Shop</h3>
		<p class="top-common-h3-caption">店舗情報</p>
		<div class="top-shop-list">
			<div class="top-shop-list-item honten">
				<div class="top-shop-list-item-img">
					<img src="<?php bloginfo('template_url');?>/img/top/shop-list-item-img-01.png">
				</div>
				<div class="top-shop-list-item-inner">
					<div class="top-shop-list-item-title">メガネの松山<br class="sp">（亀岡本店）
						<div class="top-shop-list-icon">
							<i class="icon-facebook"><a href="https://twitter.com/matuyama_honten" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__tw.png"></a></i>
							<i class="icon-facebook"><a href="https://www.facebook.com/kameoka.honten" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__fb.png"></a></i>
						</div>
					</div>

					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">住所</dt>
						<dd class="top-shop-list-item-dd">京都府亀岡市追分町馬場通27-4</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">電話</dt>
						<dd class="top-shop-list-item-dd">0771-22-3453</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">営業時間</dt>
						<dd class="top-shop-list-item-dd">10:00～19:00</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">定休日</dt>
						<dd class="top-shop-list-item-dd">木曜日</dd>
					</dl>
					<ul class="top-shop-list-item-tag">
						<li>メガネ</li>
						<li>補聴器</li>
						<li>時計</li>
						<li>宝飾</li>
						<li>コンタクトレンズ</li>
						<li>コンタクトレンズケア用品</li>
						<li>眼科隣接</li>
						<li>要処方箋</li>
						<li>認定補聴器専門店</li>
						<li>認定補聴器技能者</li>
					</ul>
					<p class="top-more-btn"><a href="<?php bloginfo('url');?>/shop">もっと見る</a></p>
				</div>
			</div>
			<div class="top-shop-list-item heartup">
				<div class="top-shop-list-item-img">
					<img src="<?php bloginfo('template_url');?>/img/top/shop-list-item-img-02.png">
				</div>
				<div class="top-shop-list-item-inner">
					<div class="top-shop-list-item-title">ハートアップ亀岡<br class="sp">（亀岡市） 
						<div class="top-shop-list-icon">
							<i class="icon-twitter"><a href="https://twitter.com/heartup_kameoka" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__tw.png"></a></i>
							<i class="icon-facebook"><a href="https://www.facebook.com/kameoka.honten" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__fb.png"></a></i>
						</div>
					</div>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">住所</dt>
						<dd class="top-shop-list-item-dd">京都府亀岡市追分町馬場通り27-1</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">電話</dt>
						<dd class="top-shop-list-item-dd">0771-22-3800</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">営業時間</dt>
						<dd class="top-shop-list-item-dd">月・火・水・金・土　9:30～19:00<br class="wp-txt">日・祝　10:00～19:00</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">定休日</dt>
						<dd class="top-shop-list-item-dd">木曜日</dd>
					</dl>
					<ul class="top-shop-list-item-tag">
						<li>メガネ</li>
						<li>コンタクトレンズ</li><br class="pc">
						<li>コンタクトレンズケア用品</li>
						<li>眼科隣接</li>
						<li>要処方箋</li> 
					</ul>
					<p class="top-more-btn"><a href="<?php bloginfo('url');?>/shop">もっと見る</a></p>
				</div>
			</div>
			<div class="top-shop-list-item sonobe">
				<div class="top-shop-list-item-img">
					<img src="<?php bloginfo('template_url');?>/img/top/shop-list-item-img-03.png">
				</div>
				<div class="top-shop-list-item-inner">
					<div class="top-shop-list-item-title">メガネの松山<br class="sp">（園部店）
						<div class="top-shop-list-icon">
							<i class="icon-twitter"><a href="https://twitter.com/matuyama_sonobe" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__tw.png"></a></i>
							<i class="icon-facebook"><a href="https://www.facebook.com/kameoka.honten" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__fb.png"></a></i>
						</div>
					</div>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">住所</dt>
						<dd class="top-shop-list-item-dd">
							京都府南丹市園部町上木崎町寺の下27-1<br class="wp-txt">
							Withアネックスビル1F</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">電話</dt>
						<dd class="top-shop-list-item-dd">
							メガネの松山（園部店）：0771-63-1808<br class="wp-txt">
							ハートアップ園部店：0771-63-1807</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">営業時間</dt>
						<dd class="top-shop-list-item-dd">10:00～19:00</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">定休日</dt>
						<dd class="top-shop-list-item-dd">木曜日</dd>
					</dl>
					<ul class="top-shop-list-item-tag">
						<li>メガネ</li>
						<li>補聴器</li>
						<li>コンタクトレンズ</li>
						<li>コンタクトレンズケア用品</li>
						<li>眼科隣接</li>
					</ul>
					<p class="top-more-btn"><a href="<?php bloginfo('url');?>/shop">もっと見る</a></p>
				</div>
			</div>
			<div class="top-shop-list-item kawabe">
				<div class="top-shop-list-item-img">
					<img src="<?php bloginfo('template_url');?>/img/top/shop-list-item-img-04.png">
				</div>
				<div class="top-shop-list-item-inner">
					<div class="top-shop-list-item-title">STYLISH 松山<br class="sp">（川辺郡）
						<div class="top-shop-list-icon">
							<i class="icon-twitter"><a href="https://twitter.com/matuyama_inagaw" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__tw.png"></a></i>
							<i class="icon-facebook"><a href="https://www.facebook.com/kameoka.honten" target="_blank"><img src="<?php bloginfo('template_url');?>/img/common/icon__fb.png"></a></i>
						</div>
					</div>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">住所</dt>
						<dd class="top-shop-list-item-dd">
							兵庫県川辺郡猪名川町白金2-1<br class="wp-txt">
							イオン猪名川SC 3F</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">電話</dt>
						<dd class="top-shop-list-item-dd">
							STYLISH 松山（川辺郡）：072-765-1172<br class="wp-txt">
							ハートアップ5MINIイオンモール猪名川店：<br class="wp-txt">
							072-767-2115</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">営業時間</dt>
						<dd class="top-shop-list-item-dd">9:00～21:00</dd>
					</dl>
					<dl class="top-shop-list-item-dl">
						<dt class="top-shop-list-item-dt">定休日</dt>
						<dd class="top-shop-list-item-dd">木曜日</dd>
					</dl>
					<ul class="top-shop-list-item-tag">
						<li>メガネ</li>
						<li>補聴器</li>
						<li>コンタクトレンズ</li>
						<li>要処方箋</li>
						<li>コンタクトレンズケア用品</li>
					</ul>
					<p class="top-more-btn"><a href="<?php bloginfo('url');?>/shop">もっと見る</a></p>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>