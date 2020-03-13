<?php
//inclure la connection a la db
        include("connect/connect.php");

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
INNER JOIN users ON users.users_id = topics.users_id)
INNER JOIN boards ON boards.boards_id = topics.boards_id); 
ORDER BY creation_date DESC";
// LIMIT 3 ;
$stmp = $db->prepare($topicsql);
$stmp->execute();
$topics = $stmp->fetchAll(PDO::FETCH_OBJ);
 
//close connection
$stmp->closeCursor();
$stmp= null; 


//var_dump($topics[0]);
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
        <script src="./script.js"></script>
        <link rel="stylesheet" href="nav/style.css">
        <link rel="stylesheet" href="css/home.css">
</head>

<body>
        <main>
                <!-- New slider -->
                <div class="slider">
                        <div class="sliderchild">
                                <?php 
                    foreach($boards as $board){
                    $boardsname= $board->name;
                    $boardsdescription= $board->description;
                    echo "<div class='imagesli'>".
                    "<div class='slide-content'>".
                    "<h1 class='first-slide-h1'>".$boardsname."</h1>".
                    // "<h2 class='first-slide-h2'>Description</h2>".
                    "<p class='first-silde-p'>".$boardsdescription."</p>".
                    "</div>".
                    "</div>";
                    }
                    
                    echo "<div class='imagesli'>".
                        "<div class='slide-content'>".
                            "<h1 class='first-slide-h1'>".$boards[0]->name."</h1>".
                            //"<h2 class='first-slide-h2'>Description</h2>".
                            "<p class='first-silde-p'>".$boards[0]->description."</p>".
                            "</div>".
                        "</div>";
                    ?>
                                <!-- <div class="imagesli">
                <a href="last.php">
                    <div class="slide-content">
                        <h1 class="first-slide-h1">General</h1>
                        <h2 class="first-slide-h2">Last article</h2>
                        <p class="first-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea
                            distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non
                            ratione.!</p>
                    </div>
                </a>
            </div>
            <div class="imagesli">
                <div class="slide-content">
                    <h1 class="second-slide-h1">Development</h1>
                    <h2 class="second-slide-h2">Last article</h2>
                    <p class="second-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea
                        distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!
                    </p>
                </div>
            </div>
            <div class="imagesli">
                <div class="slide-content">
                    <h1 class="third-slide-h1">Small talk</h1>
                    <h2 class="third-slide-h2">Last article</h2>
                    <p class="third-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea
                        distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!
                    </p>
                </div>
            </div>
            <div class="imagesli">
                <div class="slide-content">
                    <h1 class="fourth-slide-h1">Events</h1>
                    <h2 class="fourth-slide-h2">Last article</h2>
                    <p class="fourth-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea
                        distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!
                    </p>
                </div>
            </div>
            <div class="imagesli">
                <div class="slide-content">
                    <h1 class="first-slide-h1">General</h1>
                    <h2 class="first-slide-h2">Last article</h2>
                    <p class="first-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea
                        distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!
                    </p>
                </div>
            </div> -->
                        </div>
                </div>



                <div class="container">
                        <!-- boucle on boards to show them all -->
                        <?php 
        echo "<div class='container'>";
                foreach($boards as $board){
                        $boardsname= $board->name;
                        echo 
                                "<div class='card'>
                                    <div class='card-header'><a href='#'>".
                                $boardsname. 
                                "</a></div>". 
                                "<div class='col'>". 
                                "</div>".
                                "<ul class='list-group list-group-flush'>";
                                $i=0;
                                        foreach($topics as $topic){
                                        $topicname=$topic->name;
                                        // var_dump($boardsname);
                                        
                                                if($boardsname == $topicname && $i<3){
                                                        $i++;
                                                echo "<li class='list-group-item'><div>".
                                $topic->title.
                                "</div>". 
                                "<div class='blockquote-footer'>".
                                $topic->nickname.
                                "</div>".
                                "</li>";}
                        }
                                        
                                echo "</ul>".
                                "</li>".
                                "<a href='".$boardsname.".php' class='btn btn-primary'>See more</a>".
                                "</div>";
                };
                echo "</ul>";
        ?>
                </div>
        </main>

</body>

</html>