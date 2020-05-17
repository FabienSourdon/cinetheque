<?php 
$monCss = [];
$monCss[] = './css/list.css';

include("./phtml/head.phtml");
include("./phtml/mainList.phtml");

$contJson = file_get_contents("test.json");
$tmpTab = json_decode($contJson, true);

$ifLogin = file_get_contents("login.json");
$tabIfLogin = json_decode($ifLogin, true);


if($tabIfLogin['login']){
    //var_dump($tabIfLogin);
    for($i = 0; $i < count($tmpTab); ++$i){
        echo('
        <div class = "card">
            <img src="./img/'.$tmpTab[$i]['image'].'">
            <div class="content">
                <h4>'. $tmpTab[$i]['title'].'</h4>
                <p>'.$tmpTab[$i]['date'].'</p>
            </div>
            <p>'.$tmpTab[$i]['desc'].'
            <form action="edit.php" method="get">
                <button name="edit" value="'. $tmpTab[$i]['title'] .'">Modifier<button>
            </form>
            <form action="supp.php" method="get" name="testToto">
                <button name="sup" value="'. $tmpTab[$i]['title'] .'">Supprimer<button>
            </form>
        </div>
        ');
    }
}
else{
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
}

include("./phtml/footList.phtml"); 

?>
