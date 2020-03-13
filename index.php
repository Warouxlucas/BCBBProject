<?php
//inclure la connection a la db
        include("connect.php");

// requete recup users
$usersql = "SELECT * FROM users";

$stmp = $db->prepare($usersql);
$stmp->execute();
$user = $stmp->fetchAll(PDO::FETCH_OBJ);

// requete recup boards
$boardsql = "SELECT * FROM boards";
$stmp = $db->prepare($boardsql);
$stmp->execute();
$boards = $stmp->fetchAll(PDO::FETCH_OBJ);

// requete recup topics
// $topicsql = "SELECT *
// FROM boards
// INNER JOIN topics
// WHERE boards.id = topics.boards_id";
// $stmp = $db->prepare($topicsql);
// $stmp->execute();
// $topics = $stmp->fetchAll(PDO::FETCH_OBJ);

 // requete recup topics join boards
 
// $topicsql = "SELECT *
// FROM topics

// INNER JOIN boards
// WHERE topics.boards_id = boards.id
// ORDER BY creation_date DESC";
// // LIMIT 3 ;
// $stmp = $db->prepare($topicsql);
// $stmp->execute();
// $topics = $stmp->fetchAll(PDO::FETCH_OBJ);

 // recup les noms des boards, le title et dates de créations des topics, et le nickname l'users
$topicsql = "SELECT boards.name, topics.title, topics.creation_date, users.nickname
FROM ((topics
INNER JOIN users ON users.id = topics.users_id)
INNER JOIN boards ON boards.id = topics.boards_id); 
ORDER BY creation_date DESC";
// LIMIT 3 ;
$stmp = $db->prepare($topicsql);
$stmp->execute();
$topics = $stmp->fetchAll(PDO::FETCH_OBJ);
 
//close connection
$stmp->closeCursor();
$stmp= null; 


var_dump($topics[0]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>home</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>
</head>

<body>
        <main>
                <!-- boucle on boards to show them all -->
                <?php 
        echo "<ul class='boards_list_container'>";
                foreach($boards as $board){
                        $boardsname= $board->name;
                        echo 
                                "<li><div class='boards_list_title'><a href='#'>".                                
                                $boardsname. 
                                "</a></div>". 
                                "<div class='boards_list_author'>". 
                                "</div>".
                                "<ul>";
                                $i=0;
                                        foreach($topics as $topic){
                                        $topicname=$topic->name;
                                        // var_dump($boardsname);
                                        
                                                if($boardsname == $topicname && $i<3){
                                                        $i++;
                                                echo  "<li><div class='topics_list_title'>".                         
                                $topic->title.
                                "</div>". 
                                "<div class='topics_list_author'>". 
                                $topic->nickname.
                                "</div>".
                                "</li>";}
                        }
                                        
                                echo "</ul>".
                                "</li>";
                                
                };
                echo "</ul>";
        ?>


        </main>

</body>

</html>