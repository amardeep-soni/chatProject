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
    <title>Amardeep Chat App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Amardeep Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This is an error message!</div>
                <div class="success-txt">This is an success message!</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input image">
                    <label for="image">Select Profile Image</label>
                    <input type="file" id="image" name="image" required>
                </div>
                <div class="field input button">
                    <input type="submit" value="Create Account">
                </div>
            </form>
            <div class="hr"></div>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="js/passShowHide.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>