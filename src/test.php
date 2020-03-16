<?php session_start(); 
if(!isset($_COOKIE['member_login'] || $_COOKIE['member_password'])){
             setcookie ("member_login", "",time()+ (10 * 365 * 24 * 60 * 60));
             setcookie ("member_password","",time()+ (10 * 365 * 24 * 60 * 60)); 
}
            // setcookie ("member_login",$nickname,time()+ (10 * 365 * 24 * 60 * 60));
            // setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));

$_SESSION['id']="1";
var_dump($_SESSION['id']) ?>
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
            /******************** mdp ok ***********************/
            $_SESSION['sess_user_id']  = $row['id'];
            $_SESSION['nickname'] = $row['nickname'];
            $_SESSION['password'] = $row['password'];
            echo "hourra!";
            var_dump($_SESSION['password']);
            // si remember me est coché recup info dans cookie
             if(!empty($_POST["remember"])){

             $_SESSION["admin_name"] = $name;
             $_COOKIE['member_login']= $row['nickname'];
             $_COOKIE['member_password']=$row['password'];
             }
             else
             {
             if(isset($_COOKIE["member_login"]))
             {
             setcookie ("member_login","");
             }
             if(isset($_COOKIE["member_password"]))
             {
             setcookie ("member_password","");
             }
             }
           
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
<html lang="en">

<head>
    <title>I hate bootstrap</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
</head>

<body>

    <!-- Bootstrap dropdown -->
    <div class="dropdown">
        <!-- btn declancheur du drop down menu -->
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Sign in
        </a>
        <div class="dropdown-menu">
            <!-- insertion formulaire -->
            <form class="px-4 py-3" action="" method="POST">
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" name="nickname"
                        value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"
                        class="form-control" id="nickname" placeholder="Nickname">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" name="password"
                        value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"
                        class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="dropdownCheck">
                        <label class="form-check-label" for="dropdownCheck">
                            Remember me
                        </label>
                    </div>
                </div>
                <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="login!">
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">New around here? Sign up</a>
            <a class="dropdown-item" href="#">Forgot password?</a>
        </div>

    </div>



</body>

</html>