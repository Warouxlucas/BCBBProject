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

    <div class="container">

        <h1>Topics</h1>
        <a href="topicsCreate.php">
            <button class="btn btn-outline-info">Create a topic</button>
        </a>

    </div>


    <?php

    $now = new DateTime();


    try {
        $bdd = new PDO('mysql:host=mysql;dbname=bcbb;charset=utf8', 'root', 'root');
    } catch (Exception $err) {
        die('Erreur : ' . $err->getMessage());
    }

    $req = $bdd->query(
        'SELECT *
         FROM topics 
         INNER JOIN users
         ON topics.users_id=users.id
         ORDER BY creation_date DESC
    '
    );

    while ($data = $req->fetch()) {
        $date = new DateTime($data['creation_date']);
        $differenceDate =  $date->diff($now)->format("%d days ago ");
    ?>

        <div class="container">



            <ul class="list-group">
                <li class="list-group-item">
                    <?php

                    if ($differenceDate == 0) {
                        $differenceDate = 'today';
                    }
                    ?>

                    <h1>
                        <?php echo $data['title'] ?>
                    </h1>
                    <h5>
                        <?php echo $differenceDate ?>
                    </h5>
                    <p>Autor : <?php echo $data['nickname'] ?></p>

                    <?php echo substr($data['content'], 0, 100) ?>
                    <a href="topicsDetail.php?title=<?php echo urlencode($data['title']) ?>">
                        ...</br>
                        <button class="btn btn-primary">En savoir plus</button>
                    </a>

                </li>
            </ul>
        </div>
    <?php
    }

    $req->closeCursor();

    ?>

</body>

</html>