<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   <!--
    <meta http-equiv="Content-Security-Policy" content="script-src www.13520v.com test.13520v.com; style-src www.13520v.com test.13520v.com player.qiniucc.com;">
   -->
    <meta name="description" content="<?php echo isset($description) ? $description : '黑狗视频 我的抓取站,抓取youtube上的天文,科学,电子产品,计算机等频道的视频。还有更多youtube精彩视频等你来看哟!!!抓取,youtube,bilibili,php,python, Science, Electronic, Computer, Astronomical, NASA, MinuteEarth, UFO, Scientific American Space Lab,apple,review,tech,unboxing,education,learn,Samsung, Tom Scott, SciShow, Linus Tech Tips, ColdFusion, Unbox Therapy, Austin Evans, AsapSCIENCE, TechnoBuffalo, CrashCourse, The 8-Bit Guy, Computerphile, Tampatec'; ?>">
    <meta name="author" content="zxr">
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : '黑狗视频 抓取,youtube,bilibili,php,python, Science, Electronic, Computer, Astronomical, NASA, MinuteEarth, UFO, Scientific American Space Lab,apple,review,tech,unboxing,education,learn,Samsung, Tom Scott, SciShow, Linus Tech Tips, ColdFusion, Unbox Therapy, Austin Evans, AsapSCIENCE, TechnoBuffalo, CrashCourse, The 8-Bit Guy, Computerphile, Tampatec'; ?>">
    <title><?php echo isset($title) ? $title : '黑狗视频 我的抓取站,抓取youtube上的天文,科学,电子产品,计算机等频道的视频,还有更多youtube精彩视频等你来看。'; ?></title>
    <?php foreach ($static['style'] as $key => $value) {
      $cssLink = $static_url.'/static/'.$value.'?version='.$static_version;
      echo sprintf('<link rel="stylesheet" href="%s"  type="text/css">',$cssLink);
   } ?>
    <link href="https://player.qiniucc.com/sdk/latest/qiniuplayer.min.css" rel="stylesheet">
    <script src="https://player.qiniucc.com/sdk/latest/qiniuplayer.min.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?0d45c1d430964264f2b901f25b353f34";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
