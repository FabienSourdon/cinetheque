<?php 

$monCss = [];
$monCss[] = './css/login.css';

include("./phtml/head.phtml");
include("./phtml/mainLogin.phtml");

$info = file_get_contents("user.json");
$tabInfo = json_decode($info, true);

if(!empty($_GET)){
    if($_GET['user'] == $tabInfo['username'] && $_GET['pass'] == $tabInfo['pass']){
        $verifLog = file_get_contents('login.json');
        $tabVerif = json_decode($verifLog, true);
        $tabVerif['login'] = true;
        $newJson = json_encode($tabVerif);
        file_put_contents("login.json", $newJson);
        header('location: list.php');
        exit();
    }
    elseif($_GET['user'] != $tabInfo['username'] && $_GET['pass'] != $tabInfo['pass']){
        echo("Mauvais nom d'utilisateur et mot de passe");
    }
    elseif($_GET['user'] != $tabInfo['username'] || $_GET['pass'] != $tabInfo['pass']){
        if($_GET['user'] != $tabInfo['username']){
            echo("Mauvais nom d'utilisateur");
        }
        elseif($_GET['pass'] != $tabInfo['pass']){
            echo("Mauvais mot de passe");
        }
        
    }
}

//var_dump($_GET, $tabInfo);

include("./phtml/footlist.phtml");

?>