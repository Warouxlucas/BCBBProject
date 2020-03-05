<?php

try {
    $bdd = new PDO('mysql:host=mysql;dbname=bcbb;charset=utf8', 'root', 'root');
} catch (Exception $err) {
    die('Erreur : ' . $err->getMessage());
}





$reqPostTopic = $bdd->prepare('INSERT INTO topics(title, content, boards_id) VALUES (?, ?, ?)');


try {
    $reqPostTopic->execute(array(
        $_POST['title'],
        $_POST['content'],
        $_POST['boards']
    ));
    echo $_POST['title'];
} catch (Exception $e) {
    echo ('Erreur:' . $e->getMessage());
}

// echo '<meta http-equiv="refresh" content="0">';

$reqPostTopic->closeCursor();
