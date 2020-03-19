<?php

include 'nav.php';

    // <!-- BOOTSTRAP -->
    // <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    //     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    // <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    //     integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    // </script>
    // <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    //     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    // </script>
    // <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    //     integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    // </script>

?>

<div class="container top">

    <h1>Topics</h1>
    <a href="topicsCreate.php">
        <button class="btn btn-outline-info">Create a topic</button>
    </a>




    <?php

    $now = new DateTime();


    try {
        $bdd = new PDO('mysql:host=g4yltwdo6z0izlm6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=svb7vo33swlkw6jp;charset=utf8mb4',
        'iicuafj3oduynv19','uqdhhz7xw60z5p06');
    } catch (Exception $err) {
        die('Erreur : ' . $err->getMessage());
    }

    $req = $bdd->query(
        'SELECT *
         FROM topics 
         INNER JOIN users
         ON topics.users_id=users.users_id
         WHERE boards_id = 4
         ORDER BY creation_date DESC 
    '
    );

    while ($data = $req->fetch()) {
        $date = new DateTime($data['creation_date']);
        $differenceDate =  $date->diff($now)->format("%d days ago ");
    
    ?>

    <div class="container" id="topic-container">



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
                <a
                    href="topicsDetail.php?title=<?php echo urlencode($data['title']) ?>&id=<?php echo $data['id_topics'] ?>">
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