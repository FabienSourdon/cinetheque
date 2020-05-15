<?php 
$monCss = [];
$monCss[] = './css/add.css';

include("./phtml/head.phtml");
include("./phtml/mainAdd.phtml");

if(!empty($_GET)){
    $contJson = file_get_contents("test.json");
    if(!empty($contJson)){
        $tmpTab = json_decode($contJson, true);
        $tmpTab[] = $_GET ;
    }
    else{
        $tmpTab[] = $_GET;
    }
    $newJson = json_encode($tmpTab);
    file_put_contents("test.json", $newJson);
}

include("./phtml/foot.phtml") ;
?>