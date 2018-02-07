<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   <!--
    <meta http-equiv="Content-Security-Policy" content="script-src www.13520v.com:30340 test.13520v.com; style-src www.13520v.com:30340 test.13520v.com;">
    --> 
    <meta name="description" content="<?php echo isset($description) ? $description : '我的抓取小站,bilibili,youtube'; ?>">
    <meta name="author" content="zxr">
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : '抓取,youtube,bilibili,php,python'; ?>">
    <title><?php echo isset($title) ? $title : '我的抓取站'; ?></title>

    <?php foreach ($static['style'] as $key => $value) {
      $cssLink = $static_url.'/static/'.$value.'?version='.$static_version;
      echo sprintf('<link rel="stylesheet" href="%s"  type="text/css">',$cssLink);
   } ?>
    <link href="https://player.qiniucc.com/sdk/latest/qiniuplayer.min.css" rel="stylesheet">
    <script src="https://player.qiniucc.com/sdk/latest/qiniuplayer.min.js"></script>
</head>
