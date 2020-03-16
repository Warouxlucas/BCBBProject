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
      $nickename = $_POST['nickname'];
      $gender = $_POST['male'];
      $birthday = $_POST['birthday'];
      $email = $_POST['email'];
      $password = $_POST['pwd'];

      $pdoQuery = "INSERT INTO users(firstname, lastname, nickname, birthday, email, pwd) VALUES (:firstname,:lastname,:nickname,:birthday,:email,:pwd)";
      
      $pdoQuery_run = $db->prepare($pdoQuery);
      $pdoQuery_exec = $pdoQuery_run->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":nickname"=>$nickename, ":birthday"=>$birthday, ":email"=>$email, ":pwd"=>$password));
      
      //var_dump(($pdoQuery_run));":male"=>$gender, male,:male
      var_dump($password);
      var_dump($lastname);
      var_dump($nickename);
      var_dump($gender);
      var_dump($_POST['male']);
      var_dump($email);
      var_dump($birthday);


      if ($pdoQuery_exec) {
        echo '<script> alert("Data inserted") </script>';
      }
      else {
        echo '<script> alert("Data not inserted") </script>';
      }
      
      }
?>