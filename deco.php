<?php 
$monCss = [];
$monCss[] = './css/deco.css';

$contJson = file_get_contents("login.json");
$loginTab = json_decode($contJson, true);
$loginTab['login'] = false;
$newJson = json_encode($loginTab);
file_put_contents("login.json", $newJson);

include("./phtml/head.phtml");
include("./phtml/mainDeco.phtml");
//var_dump($loginTab);
include("./phtml/foot.phtml");
?>