<?php 
    try {
      $db = new PDO('mysql:host=mysql;dbname=BCBB;charset=utf8mb4','root','root');
      //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
    } catch (PDOException $e) {
      echo "Connection failed : ". $e->getMessage();
    }

    // Sign Up
    
    if(isset($_POST['singupsubmit']))
    {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $nickname = $_POST['nickname'];
      $gender = 1;
      $birthday = $_POST['birthday'];
      $email = $_POST['email'];
      $password = $_POST['pwd'];
//$_POST['male']
      $pdoQuery = "INSERT INTO users(firstname, lastname, nickname, male, birthday, email, pwd) VALUES (:firstname,:lastname,:nickname,:male,:birthday,:email,:pwd)";
     



      $pdoQuery_run = $db->prepare($pdoQuery);
      $pdoQuery_exec = $pdoQuery_run->execute(array("firstname"=>$firstname, "lastname"=>$lastname, "nickname"=>$nickname, "male"=>$gender, "birthday"=>$birthday, "email"=>$email, "gpwd"=>$password));
      //
      var_dump(($pdoQuery_exec));
      var_dump(($birthday));
      var_dump(($firstname));
      var_dump(($lastname));
      var_dump(($nickname));
      var_dump(($gender));
      var_dump(($email));
      var_dump(($password));

      if ($pdoQuery_exec) {
        echo '<script> alert("Data inserted") </script>';
      }
      else {
        echo '<script> alert("Data not inserted") </script>';
      }
      
      }
?>