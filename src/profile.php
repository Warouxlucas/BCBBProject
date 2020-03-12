<?php session_start()?> 

<?php
include("connect/connect.php");    
$_SESSION['userid'] = 1;
$userid=$_SESSION['userid'];
$sql = "SELECT * FROM users WHERE id=$userid";

$stmp = $db->prepare($sql);
$stmp->execute();

$user = $stmp->fetchAll(PDO::FETCH_OBJ);
$stmp->closeCursor();
$stmp= null; 

?>

<!DOCTYPE html>
<html>    
<head>        
 <meta charset="UTF-8">
 <link rel="stylesheet" href="style/profile.css">
 <link rel="stylesheet" href="footer/footer-style/footer.css">
         <title><?php echo $user[0]->firstname;echo " "; echo $user[0]->lastname; ?>'s Profile</title>
</head>
    <body class="body">
        <div class="profile">
            <div class="j-profile">
                <?php include 'navbar/nav.php'?>

                <!-- <a href="index.php">Home</a> | <?php //echo $user[0]->firstname;echo " "; echo $user[0]->lastname; ?>'s Profile         -->
                <h3>Personal Information  <?php  //  $visitor = $_SESSION['username'];
                    // if ($user == $visitor)
            { ?>                       <?php
            }
                    ?>        </h3>
                    <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $user[0]->email ) ) ) ?>" />       
                    <table>
                                
                                <tr>
                                    <td>Email:</td><td><?php echo $user[0]->email?></td> 
                                </tr>
                                <tr>                
                                <td>Full name:</td><td><?php echo $user[0]->firstname;echo " "; echo $user[0]->lastname; ?></td>   
                                </tr>
                                <tr>
                                <td>Birthdate:</td><td><?php echo $user[0]->birthday?></td>  <!-- need to change the date format to that dd-mm-yyyy-->
                                </tr>
                                <tr>                
                                <td>Nickname:</td><td><?php echo $user[0]->nickname?></td> 
                                </tr> 
                                <tr>
                                    <td>Gender:</td><td><?php if($user[0]->gender == 1)echo 'male'; else echo 'female' ?></td>
                                </tr>
                                <tr>
                                    <td>Signature:</td><td><?php echo $user[0]->signature?></td> 
                                </tr></br>  
                                    
                    </table> 
                    <button onclick="location.href='http://localhost/profile2.php'" type="button">
                    Edit your profile</button>
                </div>

            
            
        </div>
        <?php include('footer/footer.php') ?>
    </body>
</html> 
