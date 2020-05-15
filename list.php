<?php 
$monCss = [];
$monCss[] = './css/list.css';

include("./phtml/head.phtml");
include("./phtml/mainList.phtml");

$contJson = file_get_contents("test.json");
$tmpTab = json_decode($contJson, true);


for($i = 0; $i < count($tmpTab); ++$i){
    echo('
    <div class = "card">
        <img src="./img/'.$tmpTab[$i]['image'].'">
        <div class="content">
            <h4>'. $tmpTab[$i]['title'].'</h4>
            <p>'.$tmpTab[$i]['date'].'</p>
        </div>
        <p>'.$tmpTab[$i]['desc'].'
    </div>
    ');
}
//var_dump($tmpTab);
include("./phtml/footList.phtml"); 

?>
