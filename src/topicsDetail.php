<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/emojionearea/dist/emojionearea.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojione@4.0.0/extras/css/emojione.min.css" />

</head>

<body>


    <script src="https://kit.fontawesome.com/eba34fca06.js" crossorigin="anonymous"></script>

    <?php


    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;


    try {
        $bdd = new PDO(
            'mysql:host=g4yltwdo6z0izlm6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=svb7vo33swlkw6jp;charset=utf8mb4',
            'iicuafj3oduynv19',
            'uqdhhz7xw60z5p06'
        );
    } catch (Exception $err) {
        die('Erreur : ' . $err->getMessage());
    }

    $title = $_GET['title'];
    $topic = 'SELECT * FROM topics INNER JOIN users ON topics.users_id=users.users_id WHERE title = "' . $title . '"';

    $req = $db->query(
        $topic
    );

    while ($data = $req->fetch()) {
    ?>
        <div class="container top">
            <div class="returnTopics">
                <a href="topics.php">
                    <button class="btn btn-primary">Retour aux topics</button>
                </a>
            </div>
            <div class="media">
                <img src="<?php echo $grav_url ?>" alt="" class="mr-3">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $data['title'] ?></h5>
                    <?php echo $data['content'] ?>
                </div>
            </div>




        <?php
    }

    $message = 'SELECT * FROM messages INNER JOIN users ON messages.users_id=users.users_id INNER JOIN topics ON messages.topics_id=topics.topics_id WHERE title = "' . $title . '"';

    $reqMessage = $db->query(
        $message
    );

    $idTopics = (int) $_GET['id'];

    while ($data = $reqMessage->fetch()) {
        ?> <div class="media mt-3">
                <a href="#" class="mr-3"></a>
                <img src="<?php echo $grav_url ?>" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $data['nickname'] ?></h5>
                    <?php echo $data['content_message'] ?>
                    <p>
                        <div class="standalone"></div>
                    </p>
                </div>
            </div>
        <?php
    }


        ?>
        <script>
            $(document).ready(function() {
                $(".standalone").emojioneArea({
                    standalone: true,
                    autocomplete: false,
                    pickerPosition: "bottom"
                });
                // https://github.com/mervick/emojionearea
                // créer une bdd en utf8mb4
                // Besoin d'encore gérer le fait de pouvoir ajouter une réaction

                // document.querySelectorAll('.emojioneemoji').forEach(elt => {
                //     elt.addEventListener('click', () => {
                //         console.log(elt.src)
                //     })
                // })

            });

            // const emoji = $('.emojionearea-editor')[i].firstChild.alt;
        </script>

        <form class="form-group" action="topicsDetail.php?title=<?php echo urlencode($title) ?>&id=<?php echo $idTopics ?>" method="POST">
            <textarea name="message" id="message" cols="30" rows="10" class="message form-control" required></textarea>
            <button type="submit" class="btn btn-outline-success">Envoyé</button>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#message").emojioneArea();
            });
        </script>

        <?php

        $reqPostMessage = $db->prepare('INSERT INTO messages(content_message, users_id, topics_id) VALUES (:content_message, :users_id, :topics_id)');

        if (isset($_POST['message'])) {
            $reqPostMessage->execute(array(
                'content_message' => $_POST['message'],
                'users_id' => $_SESSION['sess_user_id'],
                'topics_id' => $_GET['id']
            ));

            echo '<meta http-equiv="refresh" content="0">';
            $reqPostMessage->closeCursor();
        }

        ?>

        </div>

        <script src="node_modules/jquery/dist/jquery.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/emojione@4.0.0/lib/js/emojione.min.js"></script>

        <script src="node_modules/emojionearea/dist/emojionearea.js"></script>

</body>

</html>