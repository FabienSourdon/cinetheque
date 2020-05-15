<?php 
$monCss = [];
$monCss[] = './css/supp.css';

include("./phtml/head.phtml");
include("./phtml/mainSupp.phtml");

$contJson = file_get_contents("test.json");
$tmpTab = json_decode($contJson, true);

for($i=0; $i < count($tmpTab); ++$i){
    if($_GET['sup'] == $tmpTab[$i]['title']){
        unset($tmpTab[$i]);
    }
}
//var_dump($tmpTab);

foreach($tmpTab as $value){
    $newTab[] = $value;
}

$newJson = json_encode($newTab);
file_put_contents("test.json", $newJson);

//var_dump($newJson);
include("./phtml/footList.phtml");
?>