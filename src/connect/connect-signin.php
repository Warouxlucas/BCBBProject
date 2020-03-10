<?php
session_start();
// if(($_COOKIE['member_login']== NULL && $_COOKIE['member_password'] == NULL)){
//   10 * 365 * 24 * 60 * 60
//   setcookie ("member_login", "",time()+ 3600);
//   setcookie ("member_password","",time()+ 3600);

//   }

try {
  $db = new PDO('mysql:host=mysql;dbname=BCBB;charset=utf8mb4', 'root', 'root');
  //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
} catch (PDOException $e) {
  echo "Connection failed : " . $e->getMessage();
}



$msg = "";
if (isset($_POST['submitBtnLogin'])) {
  $nickname = trim($_POST['nickname']);
  $password = trim($_POST['pwd']);
  // var_dump($nickname);
  // var_dump($password);


  if ($nickname != "" && $password != "") {
    try {
      $query = "select * from `users` where `nickname`=:nickname and `pwd`=:pwd";
      $stmt = $db->prepare($query);
      $stmt->bindParam('nickname', $nickname, PDO::PARAM_STR);
      $stmt->bindValue('pwd', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);


      if ($count == 1 && !empty($row)) {
        $_SESSION['sess_user_id'] = $row['users_id'];
        $_SESSION['nickname'] = $row['nickname'];
        $_SESSION['password'] = $row['pwd'];
        if (!empty($_POST["remember"])) {
          $_SESSION["admin_name"] = $name;

          setcookie("member_password", $row['pwd'], time() + (10 * 365 * 24 * 60 * 60));
          setcookie("member_nickname", $row['nickname'], time() + (10 * 365 * 24 * 60 * 60));
          var_dump($row['pwd']);
          var_dump($_COOKIE['member_password']);
          //$_COOKIE['member_login']= $row['nickname'];
          //$_COOKIE['member_password']=$row['pwd'];


        } else {
          if (isset($_COOKIE["member_login"])) {
            setcookie("member_login", "");
          }
          if (isset($_COOKIE["member_password"])) {
            setcookie("member_password", "");
          }
        }
      } else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : " . $e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
