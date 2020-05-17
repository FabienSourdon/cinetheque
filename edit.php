<?php 
$monCss = [];
$monCss[] = './css/edit.css';

include("./phtml/head.phtml");
include("./phtml/mainEdit.phtml");

$contJson = file_get_contents("test.json");
$tmpTab = json_decode($contJson, true);

//var_dump($_GET);
if(array_key_exists('edit', $_GET)){
    for($i = 0; $i < count($tmpTab); ++$i){
        if($_GET['edit'] == $tmpTab[$i]['title']){
            $editTab = [$tmpTab[$i]];
            echo('
            <form action="edit.php" method="get">
                <div class="divForm">
                    <label for="title">Titre :</label>
                    <input type="text" name="title" value="'.$editTab[0]['title'].'">
                </div>
                <div class="divForm">
                    <label for="image">Image :</label>
                    <input type="file" accept=".jpg, .gif, .png" name="image">
                </div>
                <div class="divForm">
                    <label for="desc">Description :</label>
                    <textarea name="desc" id="descFilm" cols="30" rows="10">'.$editTab[0]['desc'].'</textarea>
                </div>
                <div class="divForm">
                    <label for="date">Date de sortie :</label>
                    <input type="date" name="date">
                </div>
                <input type="hidden" name="hidVal" value="'.$i.'">
                <button>Ajouter</button>
            </form>
            ');
        }
    }
}
elseif(array_key_exists('hidVal', $_GET)){
    for($i=0; $i < count($tmpTab); ++$i){
        if($_GET['hidVal'] == $i){
            
            $tmpTab[$i]['title'] = $_GET['title'];
            if(!empty($_GET['image'])){
                $tmpTab[$i]['image'] = $_GET['image'];
            }
            $tmpTab[$i]['desc'] = $_GET['desc'];
            if(!empty($_GET['date'])){
                $tmpTab[$i]['date'] = $_GET['date'];
            }
            //var_dump($tmpTab);

        }
    }
    $newJson = json_encode($tmpTab);
    file_put_contents("test.json", $newJson);
    echo('Modification réussie');
}


//var_dump($editTab);
include("./phtml/footList.phtml");


?>