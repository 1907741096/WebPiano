<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/WebPiano/Public/js/danmu/css/scojs.css" rel="stylesheet">
    <link href="/WebPiano/Public/js/danmu//css/colpick.css" rel="stylesheet">
    <link href="/WebPiano/Public/js/danmu//css/bootstrap.css" rel="stylesheet">
    <link href="/WebPiano/Public/js/danmu//css/main.css" rel="stylesheet">
</head>
<body>

<div id="danmup" style="left: 50%;margin-left:60px;margin-top:20px"></div>
<div style="display: none">
    <span class="glyphicon" aria-hidden="true">&#xe072</span>
    <span class="glyphicon" aria-hidden="true">&#xe073</span>
    <span class="glyphicon" aria-hidden="true">&#xe242</span>
    <span class="glyphicon" aria-hidden="true">&#xe115</span>
    <span class="glyphicon" aria-hidden="true">&#xe111</span>
    <span class="glyphicon" aria-hidden="true">&#xe096</span>
    <span class="glyphicon" aria-hidden="true">&#xe097</span>
</div>
<div class="video-detail">
    <div class="video-name"><?php echo ($video["name"]); ?></div>
    <div class="video-author">by <?php echo ($video["author"]); ?></div>
    <div class="video-info">视频简介 : <?php echo ($video["info"]); ?></div>
</div>

<script src="/WebPiano/Public/js/danmu/js/jquery-2.1.4.min.js"></script>
<script src="/WebPiano/Public/js/danmu/js/jquery.shCircleLoader.js"></script>
<script src="/WebPiano/Public/js/danmu/js/sco.tooltip.js"></script>
<script src="/WebPiano/Public/js/danmu/js/colpick.js"></script>
<script src="/WebPiano/Public/js/danmu/js/jquery.danmu.js"></script>
<script src="/WebPiano/Public/js/danmu/js/main.js"></script>
<!--<script src="/WebPiano/Public/js/danmu/dist/js/danmuplayer.min.js"></script>-->
<script>
    $("#danmup").DanmuPlayer({
        id:<?php echo ($video["video_id"]); ?>,
        src:"/webpiano<?php echo ($video["address"]); ?>",
        height: "480px", //区域的高度
        width: "800px" //区域的宽度
        ,urlToGetDanmu:"/webpiano/index.php?c=danmu&a=query"
        ,urlToPostDanmu:"/webpiano/index.php?c=danmu&a=stone"
    });
    $(".full-screen").click(function(){
        if(window.parent.$(".news_right").css('display')=='block'){
            window.parent.$(".news_right").css('display','none');
        }else{
            window.parent.$(".news_right").css('display','block');
        }
    });
</script>
</body>
</html>