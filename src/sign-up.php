<?php

include 'connect/connect-signup.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/sign-up.css">
        <title>Sign up</title>
</head>

<body>

        <header>

                <h1 class="n-logo"> <a href="../index.php">The weaver</a> </h1>
                <nav>
                        <ul class="nav-links">
                                <li><a href="../index.php">General</a></li>
                                <li><a href="development.php">Development</a></li>
                                <li><a href="smalltalk.php">Smalltalk</a></li>
                                <li><a href="events.php">Events</a></li>
                        </ul>
                </nav>
                <span></span>
                <!-- <div id="btns">
        <a href="sign-up.php"><button class="signin-btn">Sign up</button></a>
        <a href="sign-in.php"><button class="signup-btn">Sign in</button></a>
        </div> -->
        </header>
        <div class="container">
                <!-- <div class="else">
                        <H2 class="let">Let's get you </H2> <h1>Signed up</h1>

                </div> -->



                <div id="content">
                        <h1 class="title">Create Account</h1>
                        <div class="signup">

                                <form action="Sign-up/connect-signup.php" method="POST">

                                        <!-- First name - Last name -->

                                        <label for="first-name">First name</label>
                                        <input type="text" id="first-name" name="firstname" class="elements" placeholder="First name"> <br> <br>
                                        <label for="last-name">Last name</label>
                                        <input type="text" id="last-name" name="lastname" class="lastname elements" placeholder="Last name"> <br> <br>
                                        <label for="nickname">Nickname</label>
                                        <input type="text" id="nickname" name="nickname" class="nickname elements" placeholder="Nickname"> <br> <br>

                                        <!-- Genders -->

                                        <div class="gender">
                                                <input type="radio" name="gender" id="male" value="1" checked>
                                                <label for="gender"> Male </label>
                                                <input type="radio" name="gender" id="female" value="0">
                                                <label for="gender">Female</label> <br><br>
                                        </div>

                                        <!-- Birthday -->

                                        <label for="birthday:">Birthday</label>
                                        <input type="date" id="birthday" name="birthday" value="20/1/1999" min="01/01/1950" max="01/01/2012" class="elements"> <br> <br>

                                        <!-- Email -->

                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="elements" placeholder="Example@me.com"> <br> <br>

                                        <!-- password -->

                                        <label for="pwd">Password</label>
                                        <input type="password" id="pwd" name="pwd" class="elements" placeholder="Password"> <br> <br>

                                        <!-- sign up button  -->

                                        <div id="wrapper">
                                                <input type="submit" name="signupsubmit" id="singup-button" value="Sign up">
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
</body>

</html>