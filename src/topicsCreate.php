<?php

include 'connect/connect-signin.php';
include 'connect/login-out.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="style/topics.css">

</head>

<body>



    <?php

    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;

    try {
        $bdd = new PDO('mysql:host=g4yltwdo6z0izlm6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=svb7vo33swlkw6jp;charset=utf8mb4',
        'iicuafj3oduynv19','uqdhhz7xw60z5p06');
    } catch (Exception $err) {
        die('Erreur : ' . $err->getMessage());
    }



    ?>


    <div class="container">
        <a href="topics.php">
            <button class="btn btn-primary">Retour aux topics</button>
        </a>
        <form action="topicsCreate.php" method="POST">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required>
            <label for="content">Content</label>
            <textarea name="content" cols="30" rows="10" class="form-control" required></textarea>
            <label for="boards">Boards</label>
            <select name="boards" class="form-control">
                <option value="2">Developpement</option>
                <option value="3">General</option>
                <option value="4">Smaltalk</option>
                <option value="5">Events</option>
                <option value="6">verysecret</option>
            </select>
            <br>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>

    <?php

    $reqPostTopic = $db->prepare('INSERT INTO topics (title, content, boards_id, users_id) VALUES (:title, :content, :boards_id, :users_id)');

    if (isset($_POST['title']) and isset($_POST['content']) and isset($_POST['boards'])) {
        $reqPostTopic->execute(array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'boards_id' => $_POST['boards'],
            'users_id' => $_SESSION['sess_user_id']
        ));
        $reqPostTopic->closeCursor();

    ?>
    <div class="alert alert-succes" role="alert">
        Topics bien crée
    </div>
    <?php
    }
    ?>




</body>

</html>