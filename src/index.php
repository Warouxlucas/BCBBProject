<?php
include("connect.php");
$sql = "SELECT * FROM User_Details";

$stmp = $db->prepare($sql);
$stmp->execute();

$user = $stmp->fetchAll(PDO::FETCH_OBJ);
$stmp->closeCursor();
$stmp = null;
