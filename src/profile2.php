<?php
        include("connect/connect.php");

if(isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $nickname = $_POST['nickname'];
  $gender = $_POST['gender'];
  $signature = $_POST['signature'];
  $password = hash('sha512',$_POST['password1']);
  $birthdate = $_POST['birthdate'];

  $pdoQuery = "UPDATE users SET pwd='$password',firstname='$firstname', lastname='$lastname',nickname= '$nickname' ,gender='$gender' ,signature='$signature', birthday='$birthdate' WHERE id='1' "; //il faut générer avec le $session le numero d'id
  
  $pdoQuery_run = $db->prepare($pdoQuery);
  $pdoQuery_run -> execute([$password,$firstname,$lastname,$nickname,$gender,$signature]);
   
  
  if ($pdoQuery_run) {
     echo '<script> alert("Data inserted"); </script>'; //window.location.href="http://localhost/profile.php"
    
  }
  else {
    echo '<script> alert("Data not inserted") </script>';
  }
  
  } 
$sql = 'SELECT * FROM users WHERE id="1"'; // need to make change so the id is related to the person connected

$stmp = $db->prepare($sql);
$stmp->execute();

$user = $stmp->fetchAll(PDO::FETCH_OBJ);
$stmp->closeCursor();
$stmp= null; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script type="text/javascript">

  // polyfill for RegExp.escape
  if(!RegExp.escape) {
    RegExp.escape = function(s) {
      return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&'); // whithout it, if the contents of pwd1 contain a '*' or other special regular expression characters, the pattern for pwd2 can become invalid.
    };
  }

</script>
<a href="index.php">Home</a> | <?php echo $user[0]->firstname;echo " "; echo $user[0]->lastname; ?>'s Profile        
    <h3>Edit Your Personal Information  <?php    $visitor = $_SESSION['username'];
           if ($user == $visitor)
{ ?>            <a href="edit-profile.php?user=<?php echo $users['nickname'] ?>">Edit Profile</a>            <?php
}
        ?>        </h3>  
                    <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $user[0]->email ) ) ) ?>" /> 
                    <button onclick="window.location.href='https://www.gravatar.com'" type="button">Edit your photo </button>  
           
        <table>
                    <tr>
                        <td>Email:</td><td><?php echo $user[0]->email?></td> 
                    </tr>
                    <form action='' method='POST'>
                    <tr>                
                      <td>Password:</td><td><input type="password" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="form.password2.pattern = RegExp.escape(this.value);" required /></td> <!-- password must contain at least 6char with 1 number, 1 lowercase, 1 uppercase -->
                    </tr>   <!-- deuxieme champ password pour vérifier qu'ils sont identiques + la fonction de verif qui va avec -->
                    <tr>                
                      <td>Re-type Password:</td><td><input type="password" name="password2" required/></td>
                    </tr>  
                     <tr>                
                     <td>Firstname:</td><td><input type="text" name="firstname" value=<?php echo $user[0]->firstname?> required/></td>   
                    </tr>
                    <tr>                
                     <td>Lastname:</td><td><input type="text" name="lastname" value=<?php echo $user[0]->lastname?> required/></td>   
                    </tr>
                    <tr>                
                     <td>Birthdate:</td><td><input type="date" name="birthdate" placeholder= "yyyy-mm-dd" value=<?php echo $user[0]->birthdathe?> required/></td>   
                    </tr>
                    <tr>                
                     <td>Nickname:</td><td><input type="text" name="nickname" value=<?php echo $user[0]->nickname?> required/></td> <!-- il faut vérifier que le nickname soit unique  -->
                    </tr> 
                    <tr>
                        <td>Gender:</td><td><label for="gender"><input type="radio" name="gender" value="1" checked/>male</label> <label for="gender"><input type="radio" name="gender" value="0" />female</label></td>
                    </tr>
                    <tr>
                        <td>Signature:</td><td><input type="text" name="signature" value=<?php echo $user[0]->signature?> required/></td> 
                    </tr></br></table>
                    <p><input name="submit" type="submit" value="Validate your infos" ></p> </form>
                    <button onclick="location.href='http://localhost/profile.php'" type="button">
         return to your profile</button>
         
    
</body>
</html>