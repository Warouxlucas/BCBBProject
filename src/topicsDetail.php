<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/topics.css">

</head>

<body>

    <?php

    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=bcbb;charset=utf8', 'root', 'root');
    } catch (Exception $err) {
        die('Erreur : ' . $err->getMessage());
    }

    $title = $_GET['title'];
    $topic = 'SELECT * FROM topics INNER JOIN users ON topics.users_id=users.id WHERE title = "' . $title . '"';

    $req = $bdd->query(
        $topic
    );

    while ($data = $req->fetch()) {
    ?>
        <div class="container">
            <div class="media">
                <img src="<?php echo $grav_url ?>" alt="" class="mr-3">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $data['title'] ?></h5>
                    <?php echo $data['content'] ?>
                </div>
            </div>

        <?php
    }

    $message = 'SELECT * FROM messages INNER JOIN users ON messages.users_id=users.id INNER JOIN topics ON messages.topics_id=topics.id WHERE title = "' . $title . '"';

    $reqMessage = $bdd->query(
        $message
    );

    while ($data = $reqMessage->fetch()) {
        ?>



            <div class="media mt-3">
                <a href="#" class="mr-3"></a>
                <img src="<?php echo $grav_url ?>" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $data['nickname'] ?></h5>
                    <?php echo $data['content_message'] ?>
                </div>
            </div>




        <?php
    }


        ?>



        </div>

</body>

</html>