<?php session_start(); ?>
    <?php
        include("connect.php");

    $msg = ""; 
    if(isset($_POST['submitBtnLogin'])) {
      $nickname = trim($_POST['nickname']);
      $password = trim($_POST['password']);
      var_dump($nickname);
      var_dump($password);
      if($nickname != "" && $password != "") {
        try {
          $query = "select * from `users` where `nickname`=:nickname and `password`=:password";
          $stmt = $db->prepare($query);
          $stmt->bindParam('nickname', $nickname, PDO::PARAM_STR);
          $stmt->bindValue('password', $password, PDO::PARAM_STR);
          $stmt->execute();
          $count = $stmt->rowCount();
          $row   = $stmt->fetch(PDO::FETCH_ASSOC);
          if($count == 1 && !empty($row)) {
            /******************** Your code ***********************/
            // $_SESSION['sess_user_id']  = $row['uid'];
            $_SESSION['sess_user_name'] = $row['username'];
            $_SESSION['sess_name'] = $row['name'];
            echo "hourra!";
           
          } else {
            $msg = "Invalid username and password!";
          }
        } catch (PDOException $e) {
          echo "Error : ".$e->getMessage();
        }
      } else {
        $msg = "Both fields are required!";
      }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Document</title>
</head>
<body>
<!-- <?php 

//foreach($user as $use){

  //  var_dump($use->username);
//}

?> -->

    <div class="login">
        <form class="login__form" action="" method="POST">
        <div class="login__form__element">
            <label for="id">Login: </label>
            <input type="text" name="nickname" id="id" required>
        </div>
        <div class="login__form__element">
            <label for="pwd">Password : </label>
            <input type="password" name="password" id="pwd" required>
        </div>
        <div class="form-example">
        <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="login!">
        </div>
        <span class="loginMsg">
    <?php echo @$msg;?>
        </span>
        </form>
    </div>

    
</body>
</html>