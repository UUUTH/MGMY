<?php 
$nowobject = get_queried_object();
?>
<div id="side-bar">
	<div class="search-box">
		<form action="<?php echo home_url( '/' ); ?>" method="get">
		<input type="hidden" name="post_type" value="post">
			<p class="flex-txt">
				<span class="txt"><input type="text" name="s" value="" placeholder="検索:"></span>
				<span class="submit"><input type="submit" value="検索"></span>
			</p>
		</form>
	</div>
	<p class="side-ttl">最近の投稿</p>
	<ul class="side-ul">
		<?php 
	query_posts('showposts=5');
if(have_posts()): while (have_posts()) : the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; endif; wp_reset_query();?>
	</ul>
	<p class="side-ttl">アーカイブ</p>
	<ul class="side-ul">
		<?php wp_get_archives('type=monthly&order=DESC');?>
	</ul>
	<p class="side-ttl">カテゴリー</p>
	<ul class="side-ul">
		<?php
		$args = array(
			'show_count' => 0,
			'hide_empty' => 0,
			'child_of' => 1,
			'title_li' => ''
		);
		wp_list_categories( $args );
		?>
	</ul>
</div>