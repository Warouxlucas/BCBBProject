<?php
include 'nav.php';
?>





<?php


$grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;


    try {
        $bdd = new PDO('mysql:host=mysql;dbname=BCBB;charset=utf8mb4', 'root','root');
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
    <a href="topics.php">
        <button class="btn btn-primary">Retour aux topics</button>
    </a>
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

    <form class="form-group" action="topicsDetail.php?title=<?php echo urlencode($title) ?>&id=<?php echo $idTopics ?>"
        method="POST">
        <textarea name="message" id="" cols="30" rows="10" class="message form-control" required></textarea>
        <button type="submit" class="btn btn-outline-success">Envoyé</button>
    </form>

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

</body>

</html>