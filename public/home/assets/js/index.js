$(function(){
	//首页banner
	setBannerH();
	//首页banner音乐播放
	musicPlay();
	//注册登录眼睛移入
	setTimeout(moveeye, 800);
	
	/**
	 * 返回顶部
	 */
	document.querySelector('#returntop').addEventListener('click',function(e){
		e.preventDefault();
		$('html,body').animate({scrollTop:0},300);
	});
	$(window).scroll(function(){
		var iScrollTop = $(window).scrollTop();
		if(iScrollTop >= 100){
			$('#returntop').addClass('show');
		}else{
			$('#returntop').removeClass('show');
		}
	});
})
/**
 * 首页banner
 */
function setBannerH(){
	var oBanner = $('.banner_wrap .banner_bg');
	var oGoBack = oBanner.find('.gobtn');
	var iHeaderH = $('.hd_nav').height();
	var iWindowH = $(window).height();
	oBanner.css('height',iWindowH-iHeaderH);
	oGoBack.click(function(){
		$('html,body').animate({scrollTop:iWindowH-iHeaderH},400,'linear');
	})
}
/**
 * banner 音乐播放
 */
function musicPlay(){
	var oMusicIcon = $('.banner_bg .music_icon');
	var oAudio = document.querySelector('#music');
	oMusicIcon.click(function(){
		if(oAudio.paused){
			oAudio.play();
			$(this).addClass('play');
		}else{
			oAudio.pause();
			$(this).removeClass('play');
		}
	});
}
/**
 * 注册登录眼睛移入
 */
function moveeye(){
	var oLogo = $('.eye_bg'),
		aEye = oLogo.find('.eye'),
		oLogoP = oLogo.offset(), //背景对象logo 位置 left 和 top 
		eyeW = aEye.width()/2,//对象宽度一半
		eyeH = aEye.height()/2; //对象高度一半
		// console.log('x'+oLogoP.left+'y'+oLogoP.top);
		n = [{
			el: aEye.eq(0),
			cenX: 60,
			minX: 56,
			maxX: 64,
			cenY: 81,
			minY: 76,
			maxY: 86
			},
			{
			el: aEye.eq(1),
			cenX: 94,
			minX: 90,
			maxX: 98,
			cenY: 81,
			minY: 76,
			maxY: 86
		}];
		var m = {
				x: n[0].cenX + (n[1].cenX - n[0].cenX) / 2, //60+(94-60)/2 = 74
				y: n[0].cenY //81
			},
			X = {
				x: m.x + oLogoP.left,//959.5
				y: m.y + oLogoP.top //y = 181
			},
			o = 240;
			$(document).on("mousemove",function(e) {
				var c = 0;
				if (e.pageY >= X.y) { //鼠标在眼睛下边
					var a = Math.min((e.pageY - X.y) / o, 1);
					c = (a && (n[0].maxY - n[0].cenY) * a) + n[0].cenY - eyeH
					//console.log(c);
				} else { //鼠标在眼睛上边
					var a = Math.min((X.y - e.pageY) / o, 1);
					c = n[0].cenY - eyeH - (a && (n[0].cenY - n[0].minY) * a)
				}
				if (n[0].el.css("top", c), n[1].el.css("top", c), e.pageX >= X.x) { //鼠标在眼睛右边
					var a = Math.min((e.pageX - X.x) / o, 1);
					n[0].el.css("left", (a && (n[0].maxX - n[0].cenX) * a) + n[0].cenX - eyeW),
					n[1].el.css("left", (a && (n[1].maxX - n[1].cenX) * a) + n[1].cenX - eyeW)
				} else { //鼠标在眼睛左边
					var a = Math.min((X.x - e.pageX) / o, 1);
					n[0].el.css("left", n[0].cenX - eyeW - (a && (n[0].cenX - n[0].minX) * a)),
					n[1].el.css("left", n[1].cenX - eyeW - (a && (n[1].cenX - n[1].minX) * a))
				}
			});

}

