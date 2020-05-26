<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>WebPiano</title>
    <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/WebPiano/Public/css/page.css">
    <script src="/WebPiano/Public/js/jquery.js"></script>
    <script src="/WebPiano/Public/js/layer/layer.js"></script>
    <script type="text/javascript" src="/WebPiano/Public/js/dialog.js"></script>
</head>
<body>
<div class="video-left">
    <div class="news_content_top_select" style="width: 100%;">
        <div class="opern_order"><a href="index.php?c=video&a=main">时间排序↓</a></div>
        <div class="opern_order"><a href="index.php?c=video&a=orderbyplay">播放排序↓</a></div>
        <div class="opern_order"><a href="index.php?c=video&a=orderbydanmu">弹幕排序↓</a></div>
        <form action="index.php" method="get" style="float: right;margin-right: 50px;">
            <input type="hidden" name="c" value="video">
            <input type="hidden" name="a" value="index">
            <div class="search">
                <input type="text" name="name" id="select" placeholder="视频搜索" value="<?php echo ($name); ?>">
                <button type="submit" id="wp-select" style="height: 30px;"><img src="/WebPiano/Public/image/icon/search.png" width="20px"></button>
            </div>
        </form>
    </div>
    <?php if(is_array($videos)): $i = 0; $__LIST__ = $videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?><a href="index.php?c=video&a=detail&id=<?php echo ($video["video_id"]); ?>">
            <div class="video-one">
                <img src="/webpiano<?php echo ($video["thumb"]); ?>" title="<?php echo ($video["name"]); ?>">
                <div><?php echo ($video["name"]); ?> - <?php echo ($video["author"]); ?></div>
                <span class="video-play">播放数:<?php echo ($video["play_num"]); ?></span>
                <span class="video-danmu">弹幕数:<?php echo ($video["danmu_num"]); ?></span>
            </div>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="green-black" style="clear: both;margin-top: 30px;"><?php echo ($pageRes); ?></div>

</div>
<script type="text/javascript" src="/WebPiano/Public/js/common.js"></script>
<script type="text/javascript">
    var SCOPE={

    }
</script>
</body>
</html>