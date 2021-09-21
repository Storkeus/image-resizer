<?php
    $isNoIndex=isset($data['noindex']) && $data['noindex'];
    $isNoFollow=isset($data['nofollow']) && $data['nofollow'];
    $isSeoTitle=isset($data['seoTitle'])&&!empty($data['seoTitle']);
    $isSeoDesc=isset($data['seoDesc'])&&!empty($data['seoDesc']);
?>
<!DOCTYPE html>
<html lang='en'>
<?= $this->module('head', ['title' => $isSeoTitle?$data['seoTitle']:'', 'description' => $isSeoDesc?$data['seoDesc']:'','noindex'=>$isNoIndex,'nofollow'=>$isNoFollow]); ?>
<body>
<div class="main-container">
<?=$this->module('header');?>