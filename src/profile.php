<?php session_start()?>

<?php
include("connect/connect.php");    
$userid=$_SESSION['sess_user_id'];
$sql = "SELECT * FROM users WHERE users_id=$userid";
var_dump($userid);
$stmp = $db->prepare($sql);
$stmp->execute();

$user = $stmp->fetchAll(PDO::FETCH_OBJ);
$stmp->closeCursor();
$stmp= null; 
var_dump($user);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo $user[0]->firstname;echo " "; echo $user[0]->lastname; ?>'s Profile</title>
</head>

<body>
    <a href="index.php">Home</a> | <?php echo $user[0]->firstname;echo " "; echo $user[0]->lastname; ?>'s Profile
    <h3>Personal Information <?php  //  $visitor = $_SESSION['username'];
          // if ($user == $visitor)
{ ?> <?php
}
        ?> </h3>
    <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $user[0]->email ) ) ) ?>" />
    <table>

        <tr>
            <td>Email:</td>
            <td><?php echo $user[0]->email?></td>
        </tr>
        <tr>
            <td>Full name:</td>
            <td><?php echo $user[0]->firstname;echo" "; echo $user[0]->lastname; ?></td>
        </tr>
        <tr>
            <td>Birthdate:</td>
            <td><?php echo $user[0]->birthday?></td> <!-- need to change the date format to that dd-mm-yyyy-->
        </tr>
        <tr>
            <td>Nickname:</td>
            <td><?php echo $user[0]->nickname?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?php if($user[0]->gender == 1)echo 'male'; else echo 'female' ?></td>
        </tr>
        <tr>
            <td>Signature:</td>
            <td><?php echo $user[0]->signature?></td>
        </tr></br>

    </table>
    <button onclick="location.href='http://localhost/profile2.php'" type="button">
        edit your profile</button>

</body>

</html>