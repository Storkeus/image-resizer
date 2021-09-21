<?php
ini_set('display_errors','1');
session_start();
require_once '../app/vendor/autoload.php';
require_once '../app/config.php';

$app=new \Page\App\Core\App();