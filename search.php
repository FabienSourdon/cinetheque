<?php 
$monCss = [];
$monCss[] = './css/search.css';

include("./phtml/head.phtml");
include("./phtml/mainSearch.phtml");

$contJson = file_get_contents("test.json");
$tmpTab = json_decode($contJson, true);
$input = json_encode($_GET['recherche']);
$tabResult = [];

for($i = 0; $i < count($tmpTab);++$i){
    $tmpResult[] = implode("|",$tmpTab[$i]);
    if(preg_match($input, $tmpResult[$i])){
        $tabResult[] = explode("|",$tmpResult[$i]);
    } 
}
foreach($tabResult as $key => $value){
    echo('
    <div class = "card">
    <img src="./img/'.$tabResult[$key][1].'">
    <div class="content">
        <h4>'.$tabResult[$key][0].'</h4>
        <p>'.$tabResult[$key][3].'</p>
    </div>
    <p>'.$tabResult[$key][2].'
    </div>
    ');
}
//var_dump($tabResult);


include("./phtml/footlist.phtml");
?>