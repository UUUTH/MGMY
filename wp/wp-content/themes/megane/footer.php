<!-- ------------------------フッター------------------------ -->
<footer class="footer">
    <div id="footerNav" class="footer-nav">
        <a href="<?php bloginfo('url');?>/shop" class="footer-nav-contactlens">店舗情報</a>
        <a href="<?php bloginfo('url');?>/contact" class="footer-nav-contact">お問い合わせ</a>
    </div>
    <div class="footer-inner">
        <p class="footer-logo"><img src="<?php bloginfo('template_url');?>/img/common/footer-logo.png"></p>

        <div class="footer-list-box">
            <div class="footer-list">
                <h4 class="footer-list-h4"><a href="<?php bloginfo('url');?>/eyewear">メガネ</a></h4>
                <ul class="footer-list-ul">
                    <li><a href="<?php bloginfo('url');?>/eyewear">・こだわりのブランドフレーム</a></li>
                    <li><a href="<?php bloginfo('url');?>/eyewear/usage">・メガネの使い分け</a></li>
                    <li><a href="<?php bloginfo('url');?>/eyewear/lens">・レンズの機能</a></li>
                    <li><a href="<?php bloginfo('url');?>/eyewear/choice">・似合うメガネの選び方</a></li>
                    <li><a href="<?php bloginfo('url');?>/eyewear/welfare-system">・眼鏡の福祉制度</a></li>
                </ul>
            </div>
            <div class="footer-list">
                <h4 class="footer-list-h4"><a href="<?php bloginfo('url');?>/aid">補聴器</a></h4>
                <ul class="footer-list-ul">
                    <li><a href="<?php bloginfo('url');?>/aid/process">・補聴器選びの流れ</a></li>
                    <li><a href="<?php bloginfo('url');?>/aid/audibility">・聴力の低下と難聴について</a></li>
                    <li><a href="<?php bloginfo('url');?>/aid/type-level">・難聴の種類と程度について</a></li>
                    <li><a href="<?php bloginfo('url');?>/aid/aid-type">・補聴器の種類と特徴</a></li>
                    <li><a href="<?php bloginfo('url');?>/aid/both-ears">・両耳装用のメリット</a></li>
                    <li><a href="<?php bloginfo('url');?>/aid/subsidy">・補聴器と補助金</a></li>
                </ul>
                <h4 class="footer-list-h4"><a href="<?php bloginfo('url');?>/contact-lens">コンタクトレンズ</a></h4>
            </div>
            <div class="footer-list">
                <h4 class="footer-list-h4"><a href="<?php bloginfo('url');?>/shop">店舗情報</a></h4>
                <ul class="footer-list-ul">
                    <li><a href="<?php bloginfo('url');?>/shop/#a01">・メガネの松山（亀岡本店）</a></li>
                    <li><a href="<?php bloginfo('url');?>/shop/#a02">・ハートアップ亀岡</a></li>
                    <li><a href="<?php bloginfo('url');?>/shop/#a03">・メガネの松山（園部店）</a></li>
                    <li><a href="<?php bloginfo('url');?>/shop/#a04">・STYLISH 松山（猪名川）</a></li>
                </ul>
                <h4 class="footer-list-h4 footer-blog"><a href="<?php bloginfo('url');?>/blog">ブログ</a></h4>
            </div>
        </div>
    </div>
    <a href="#" class="page-top"></a>
</footer>
<div class="copyright">
    <small>&copy; megane salon matsuyama all right risarved</small>
</div>
<script src="<?php bloginfo('template_url');?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.matchHeight-min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/common.js"></script>
<?php if(getPageName()&&getPageName()=='contact-lens'&&!is_page('contact-lens')){?>
<script>
    $(function(){
        $('.pro-list .image').matchHeight();
        $('.pro-list .title + p').matchHeight();
		
		$('.pro-list').each(function(index, element) {
			if(!$(this).children('li:hidden').length){
				$(this).next('.com-btn').hide();
			}
		});
		
	
		$('.com-btn a').click(function(){
			var list = $(this).parent().prev('.pro-list');
			list.children('li:hidden:lt(2)').fadeIn();
			if(!list.children('li:hidden').length){
				$(this).parent().hide();
			}
			return false;
		});
    });
</script>
<?php }?>
<?php if(getPageName()&&getPageName()=='aid'){?>
<script>
	$(function(){
		$('.pro-list .image').matchHeight();
	});
</script>
<?php }?>
<?php wp_footer(); ?>
</body>
</html>