
/*==================================================================================
　Aタグページスクロール
==================================================================================*/

$(function(){
  $('.page-top').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});


/*==================================================================================
　スクロール関連
==================================================================================*/

//PC スクロールするとサブボタン表示
$(function() {
    if (window.matchMedia('(min-width: 751px)').matches){
    var topBtn = $('#sideNav');    
    topBtn.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 1000) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
};
});

//SP スクロールするとサブボタン表示
$(function() {
    if (window.matchMedia('(max-width: 750px)').matches){
    var bottomBtn = $('#spBottomTab');    
    bottomBtn.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            bottomBtn.fadeIn();
        } else {
            bottomBtn.fadeOut();
        }
    });
};
});


//PC スクロールするとヘッダー固定
/*
var _window = $(window),
    _header = $('#header'),
    winScrollTop;
 
if (window.matchMedia('(min-width: 751px)').matches){
$(window).on('scroll',function(){
    winScrollTop = $(this).scrollTop();
    if(winScrollTop >= 1000){
        _header.addClass('UpMove');
        _header.removeClass('DownMove');
    } else {
        _header.removeClass('UpMove');
        _header.addClass('DownMove');
    }
})
};
 
_window.trigger('scroll');
*/

//PC スクロールするとコンテンツ表示
$(function(){
    $(window).scroll(function (){
        $('.view').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 200){
                $(this).addClass('scrollin');
            }
        });
    });
});


//sp フッター追従ナビ
$(window).on("scroll", function() {
    scrollHeight = $(document).height();
    scrollPosition = $(window).height() + $(window).scrollTop();
    footerHeight = $(".footer").innerHeight();
    if ( scrollHeight - scrollPosition  <= footerHeight ) {
      $("#footerNav").css({
        "position":"absolute",
        "bottom": footerHeight
      });
    } else {
      $("#footerNav").css({
        "position":"fixed",
        "bottom": "0px",
      });
    }
  });


/*==================================================================================
　ポップアップ
==================================================================================*/
$(function () {
  $('.sort-content__box img').on('click', function () {
    $(this).parent().parent().children('.popup').addClass('popUp-show');
});
$('.popup .close').on('click', function () {
    $('.popup').removeClass('popUp-show');
})
});



/*==================================================================================
　メニュー開閉
==================================================================================*/


$(function () {
    $('.navi__open').on('click', function () {
        $(this).toggleClass('close');
        $(this).next('.navi__link').slideToggle(350);
  })
});

$(function () {
  $('.header-sp').on('click', function () {
      if ($(this).hasClass('navi__open')) {
          $(this).removeClass('navi__open');
          $('.sp-navi').fadeOut();
      } else {
          $(this).addClass('navi__open');
          $('.sp-navi').fadeIn();

      }
  });
});


$(function(){
	$('a[href*=\\#]:not([href=\\#])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var $target = $(this.hash);
			$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				if($(this).parents('.menuBox').length){
					setTimeout(function(){
						var targetOffset = $target.offset().top - $('.header').innerHeight();
						$('html,body').animate({scrollTop: targetOffset}, 1000);
					},100);
				}else{
					var targetOffset = $target.offset().top - $('.header').innerHeight();
					$('html,body').animate({scrollTop: targetOffset}, 1000);
				}
				return false;
			}
		}
	});
});

$(window).on('load',function(){
	var localLink = window.location+'';
	if(localLink.indexOf("#") != -1 && localLink.slice(-1) != '#'){	
		localLink = localLink.slice(localLink.indexOf("#")+1);
		$('html,body').animate({scrollTop: $('#'+localLink).offset().top - $('.header').innerHeight()}, 500);
	}
});