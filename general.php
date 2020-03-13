<?php

include 'nav.php';

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
         WHERE boards_id = 3
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
                    <a href="topicsDetail.php?title=<?php echo urlencode($data['title']) ?>&id=<?php echo $data['topics_id'] ?>">
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
</div>
    <div class="test">
        `<?php include 'footer.php' ?>
    </div>
    </body>

    </html>