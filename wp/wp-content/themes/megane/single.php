<?php 
$nowobject = get_queried_object();
?>
<?php get_header();?>
<div class="page-blog page-reset mar-style">
	<section class="main-visual main-visual02">
		<div class="photo sp"><img src="<?php bloginfo('template_url');?>/img/blog/sp_main_img.jpg" alt="メガネの松山のブログ"></div>
		<div class="text-box">
			<div class="inner">
				<h2 class="head-line01">メガネの松山のブログ</h2>
				<p class="wp-txt">メガネ・補聴器ならメガネの松山。<br class="wp-txt">メガネに関することは何でもお気軽に<br class="sp">ご相談ください。</p>
			</div>
		</div>
	</section>
	<!-- /main-visual -->
	<section class="content">
		<div id="conts">
			<?php if(have_posts()): while (have_posts()) : the_post();?>
			<?php 
			if(has_post_thumbnail()&&get_the_post_thumbnail_url($post->ID,'full')!=''){
				$bgurl=get_the_post_thumbnail_url($post->ID,'full');
			}else{
				$bgurl=get_bloginfo('template_url').'/img/common/noimage.png';
			}
			$terms = get_the_terms($post->ID,'category'); 
			if($terms){
				$subcats = array();
				foreach($terms as $term){
					if($term->parent!=0){
						$subcats[] = $term;
					}
				}
				
			} 
			?>
			<div class="detail-box">
				<p class="date"><?php the_time('Y年n月j日'); ?></p>
				<h2 class="ttl"><?php if($subcats){?><?php foreach ($subcats as $subcat) {?>【<?php echo $subcat->name;?>】<?php }?><?php }?><?php the_title(); ?></h2>
				<?php the_content();?>
				<p class="link"><a href="<?php bloginfo('url');?>/blog">＜ブログ記事一覧は、こちら＞</a></p>
			</div>
			<?php endwhile; endif;?>
		</div>
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>