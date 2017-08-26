//分享
$(document).ready(function(e) {
    $('#Share li').each(function() {
        $(this).hover(function(e) {
            $(this).find('a').animate({ marginTop: 2}, 'easeInOutExpo');
            $(this).find('span').animate({opacity:0.2},'easeInOutExpo');
        },function(){
            $(this).find('a').animate({ marginTop: 12}, 'easeInOutExpo');
            $(this).find('span').animate({opacity:1},'easeInOutExpo');
        });
    });
    var share_url = encodeURIComponent(location.href);
    var share_title = encodeURIComponent(document.title);
    var share_pic = "http://www.smohan.net/images/smohan.png";  //默认的分享图片
    var share_from = encodeURIComponent("水墨寒个人官方网站"); //分享自（仅用于QQ空间和朋友网，新浪的只需更改appkey 和 ralateUid就行）
    //Qzone
    $('#Share li a.share1').click(function(e) {
        window.open("http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+share_url+"&title="+share_title+"&pics="+share_pic+"&site="+share_from+"","newwindow");
    });
    //Sina Weibo
    $('#Share li a.share2').click(function(e) {
    var param = {
        url:share_url ,
        appkey:'678438995',
        title:share_title,
        pic:share_pic,
        ralateUid:'3061825921',
        rnd:new Date().valueOf()
      }
      var temp = [];
      for( var p in param ){
        temp.push(p + '=' + encodeURIComponent( param[p] || '' ) )
      }
    window.open('http://v.t.sina.com.cn/share/share.php?' + temp.join('&'));
    });
    //renren
    $('#Share li a.share3').click(function(e) {
    window.open('http://widget.renren.com/dialog/share?resourceUrl='+share_url+'&title='+share_title+'&images='+share_pic+'','newwindow');
    });
    //pengyou
    $('#Share li a.share4').click(function(e) {
    window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?to=pengyou&url='+share_url+'&pics='+share_pic+'&title='+share_title+'&site='+share_from+'','newwindow');
    });
    //tq
    $('#Share li a.share5').click(function(e) {
    window.open('http://share.v.t.qq.com/index.php?c=share&a=index&title='+share_title+'&site='+share_from+'&pic='+share_pic+'&url='+share_url+'','newwindow');
    });
    //kaixin
    $('#Share li a.share6').click(function(e) {
    window.open('http://www.kaixin001.com/repaste/bshare.php?rtitle='+share_title+'&rurl='+share_url+'&from=小振博客','newwindow');
    });
});