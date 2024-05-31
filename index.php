<?php
require_once __DIR__ . '/vendor/autoload.php';
use App\ParseFactory;


$factory = new ParseFactory();
$dantri = $factory->createParse();
var_dump($dantri->getUrl("https://dantri.com.vn/giao-duc/hieu-truong-phu-huynh-dau-khau-o-le-tong-ket-sap-thanh-tra-dot-xuat-20240530082800821.htm"));
echo $dantri->getArticle("https://dantri.com.vn/giao-duc/hieu-truong-phu-huynh-dau-khau-o-le-tong-ket-sap-thanh-tra-dot-xuat-20240530082800821.htm");
?>