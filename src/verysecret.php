<?php session_start();
include "connect.php";
require_once "nav.php";
?>

<?php
$boardsql = "SELECT * FROM boards WHERE boards_id='6'";
$stmp = $db->prepare($boardsql);
$stmp->execute();
$boards = $stmp->fetchAll(PDO::FETCH_OBJ);
$boardspassword=$boards[0]->password;
$password=$_GET['password'];
//var_dump($boardspassword);
//var_dump($boards);
?>

<body id="secretbody">
    <?php
if($boardspassword==$password){
    ?>
    <div class="container top">

        <h1>Topics</h1>
        <a href="topicsCreate.php">
            <button class="btn btn-outline-info">Create a topic</button>
        </a>




        <?php

    $now = new DateTime();

    $req = $db->query(
        'SELECT *
         FROM topics 
         INNER JOIN users
         ON topics.users_id=users.users_id
         WHERE boards_id = 6
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
                    <a
                        href="topicsDetail.php?title=<?php echo urlencode($data['title']) ?>&id=<?php echo $data['topics_id'] ?>">
                        ...</br>
                        <button class="btn btn-primary">En savoir plus</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <?php
    }

    $req->closeCursor();
    ?>
    <?php }
else{
?>
    <h1>The secret board</h1>
    <p>You need to pass a password in the url to get in<br>
        this field can help</p>
    <form class="login__form" action="verysecret.php" method="GET">
        <div class="login__form__element">
            <label for="pwd">Password : </label>
            <input type="password" name="password" id="pwd" required>
        </div>
        <div class="form-example">
            <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="login!">
        </div>
    </form>

    <?php
}?>

</body>

<?php require_once 'footer.php'?>


</html>