<?php
session_start();
if (isset($_SESSION['unique_id'])) { // if user is logged in
    header("location: user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amardeep Chat App --> login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Amardeep Chat App</header>
            <form action="" autocomplete="off">
                <div class="error-txt">This is an error message!</div>
                <div class="field input">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link"><a href="forget-pass.php">Forget Password?</a></div>
            <div class="hr"></div>
            <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div>
        </section>
    </div>

    <script src="js/passShowHide.js"></script>
    <script src="js/login.js"></script>
</body>

</html>