<?php
session_start();


// if (isset($_POST['submitBtnLogin'])) {
//     header('location:index.php');
// }


if(isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['nickname']);
    header('location:../index.php');
}

