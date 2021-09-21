<?php $robotsIndex=isset($data['noindex']) && $data['noindex']?'noindex':'index'?>
<?php $robotsFollow=isset($data['nofollow']) && $data['nofollow']?'nofollow':'follow'?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="<?=$robotsIndex?>, <?=$robotsFollow?>">
    <title><?= $data['title'] ?></title>
    <meta name="description" content="<?= $data['description'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?=$_SERVER['REQUEST_SCHEME']?>://<?=$_SERVER['HTTP_HOST']?>">
    <link href="/public/css/style.css?<?=filemtime(dirname(dirname(dirname(dirname(__FILE__)))).'/public/css/style.css')?>" rel="stylesheet">
</head>
