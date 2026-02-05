<?php 
    include("backend.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeniusLink</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> 
</head>
<body>
    <div class="container" id="signupContainer">
        <h1 class="form-title">Sign Up</h1>
       
            <form action="control-center.php" method="post" onsubmit="return validateForm()">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="FirstName" autocomplete="off" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="LastName" autocomplete="off" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="EmailAddress" autocomplete="off" required>
                <label for="EAddress">Email Address</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn" name="signUp" id="signupButton" onclick="displayLoader()"><span class="changeText">Sign Up</span> <span class="loader" style="display: none;"></span></button>

            <?php if (isset($error_message)) { echo "<p style='color: red; margin-top: 5px;'>$error_message</p>"; } ?>

        </form>
        <p class="or">----------or-----------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-github"></i>
        </div>
        <div class="links">
            <p>Already have an account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <div class="container" id="signinContainer" style="display: none;" class="form">
        <h1 class="form-title">Sign In</h1>
        <form action="control-center.php" method="post">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="EmailAddress" required>
                <label for="signInEmail">Email Address</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="signInPassword">Password</label>
            </div>
            <div class="recover">
                <a href="#">Recover Password</a>
            </div>

            <button type="submit" class="btn" name="signIn" id="signinButton" onclick="displayLoader()"><span class="changeText">Sign Up</span> <span class="loader" style="display: none;"></span></button>

            <?php if (isset($error_message)) { echo "<p style='color: red; margin-top: 5px;'>$error_message</p>"; } ?>
        </form>
        <p class="or">----------or-----------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-github"></i>
        </div>
        <div class="links">
            <p>Don't have an account yet?</p>
            <button id="signUpButton">Sign Up</button>
        </div>
    </div>

    <script src="script.js"></script> 
</body>
</html>
