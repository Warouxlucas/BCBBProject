<<<<<<< HEAD
<?php 
    try {
      $db = new PDO('mysql:host=mysql;dbname=BCBB;charset=utf8mb4','root','root');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
    } catch (PDOException $e) {
      echo "Connection failed : ". $e->getMessage();
    }

    
    
    if(isset($_POST['singupsubmit']))
    {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $nickname = $_POST['nickname'];
      $gender = $_POST['gender'];
      $birthday = $_POST['birthday'];
      $email = $_POST['email'];
      $password = $_POST['pwd'];

      $pdoQuery = "INSERT INTO users(firstname, lastname, nickname, male, birthday, email, pwd) VALUES (:firstname,:lastname,:nickname,:male,:birthday,:email,:pwd)";
      
      $pdoQuery_run = $db->prepare($pdoQuery);
      $pdoQuery_exec = $pdoQuery_run->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":nickname"=>$nickname, ":male"=>$gender, ":birthday"=>$birthday, ":email"=>$email, ":pwd"=>$password));
      //var_dump(($pdoQuery_run));
      //var_dump(($password));

      if ($pdoQuery_exec) {
        echo '<script> alert("Data inserted") </script>';
      }
      else {
        echo '<script> alert("Data not inserted") </script>';
      }
      
      
      }
?>
=======
<?php
try {
  $db = new PDO(
    'mysql:host=g4yltwdo6z0izlm6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=svb7vo33swlkw6jp;charset=utf8mb4',
    'iicuafj3oduynv19',
    'uqdhhz7xw60z5p06'
  );
  //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
} catch (PDOException $e) {
  echo "Connection failed : " . $e->getMessage();
}



$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$nickname = $_POST['nickname'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$password = $_POST['pwd'];

if (isset($_POST['signupsubmit'])) {
  $signUpQuery = $db->prepare('INSERT INTO users (email, pwd, nickname, firstname, lastname, birthday, gender) VALUES (:email, :pwd, :nickname, :firstname, :lastname, :birthday, :gender)');

  $signUpQuery->execute(array(
    'email' => $email,
    'pwd' => $password,
    'nickname' => $nickname,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'birthday' => $birthday,
    'gender' => $gender
  ));
}



$signUpQuery->closeCursor();
>>>>>>> ajoutsTom
