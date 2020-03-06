<?php 

include 'connect/connect-signin.php';
include 'connect/login-out.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General</title>
    

    <!-- new log in  -->
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
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="./script.js"></script>
<link rel="stylesheet" href="nav/style.css">
    
</head>
<body>
    <header class="header">

            <h1 class="n-logo">The Weaver</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="">General</a></li>
                    <li><a href="development.php">Development</a></li>
                    <li><a href="smalltalk.php">Smalltalk</a></li>
                    <li><a href="events.php">Events</a></li>
                </ul>
            </nav>
            <div id="btns">
            <?php if(isset($_SESSION['nickname'])) { ?>
            <div class="profile">
                <li class="logedin"><a href="profile.php" class="nav-nickname"><?php echo $_SESSION['nickname']?></a></li>
                <img src="img/user.png" alt="">  
            </div>
            <div class="logout">
                <form action="connect/login-out.php" method="POST">
                    <button type="submit"  name="logout_btn" class="logout-button"> Logout </button>
                    <img src="img/logout.png" class="logout-icon" alt="">
                </form>
            </div>
            <!-- <div class="logout">
                <li><a href="#" class="nav-nickname">Logout </a></li>
                <img src="img/logout.png" class="logout-icon" alt="">
            </div>  -->
            <?php } else { ?>
            <!-- <a href="sign-up.php"><button class="signin-btn">Sign up</button></a>
            <a href="sign-in.php"><button class="signin-btn">Sign in</button></a> -->
            <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Sign in
        </a>


        <div class="dropdown-menu">
            <form class="px-4 py-3" action="" method="POST">
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nickname"
                    value="<?php if(isset($_COOKIE["member_nickname"])) { echo $_COOKIE["member_nickname"]; } ?>">
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" name="pwd" class="form-control" id="exampleDropdownFormPassword1"
                        placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"];}?>">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="dropdownCheck" name="remember">
                        <label class="form-check-label" for="dropdownCheck">
                            Remember me
                        </label>
                    </div>
                </div>
                <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="login!">
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="sign-up/sign-up.php">New around here? Sign up</a>
        </div>

    </div>
            <?php } ?>    
        </div>
    </header>
            

    <!-- New slider -->
    <div class="slider">
        <div class="sliderchild">
            <div class="imagesli">
                <a href="last.php"><div class="slide-content">
                    <h1 class="first-slide-h1">General</h1>
                    <h2 class="first-slide-h2">Last article</h2> 
                    <p class="first-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!</p>
                </div></a>
            </div>
            <div class="imagesli">
            <div class="slide-content">
                    <h1 class="second-slide-h1">Development</h1>
                    <h2 class="second-slide-h2">Last article</h2> 
                    <p class="second-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!</p>
                </div>
            </div>
            <div class="imagesli">
            <div class="slide-content">
                    <h1 class="third-slide-h1">Small talk</h1>
                    <h2 class="third-slide-h2">Last article</h2> 
                    <p class="third-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!</p>
                </div>
            </div>
            <div class="imagesli">
            <div class="slide-content">
                    <h1 class="fourth-slide-h1">Events</h1>
                    <h2 class="fourth-slide-h2">Last article</h2> 
                    <p class="fourth-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!</p>
                </div>
            </div>
            <div class="imagesli">
            <div class="slide-content">
                    <h1 class="first-slide-h1">General</h1>
                    <h2 class="first-slide-h2">Last article</h2> 
                    <p class="first-silde-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio at ea distinctio aperiam aspernatur! At commodi quaerat reprehenderit? Rerum inventore non ratione.!</p>
                </div>
            </div>
        </div>
    </div>






</body>




</html>