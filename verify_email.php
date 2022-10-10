<?php
session_start();
$email = $_SESSION['email'];
if (!$email) { // if session email is not exist then redirect user in login.php
    header("location: login.php");
}
if (isset($_SESSION['unique_id'])) { // if unique_id session is exist means user is logged in and redirect him to user page
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
        <section class="form verify">
            <header>Amardeep Chat App</header>
            <h3 style="margin-top: 20px;text-align: center;">Verify Your Email to Login <br> Please check your Mail</h3>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This is an error message!</div>
                <div class="success-txt">This is an success message!</div>
                <div class="field input">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" readonly value="<?php echo $email; ?>">
                </div>
                <div class="field input">
                    <label for="code">Enter Code</label>
                    <input type="text" id="code" name="code" placeholder="Enter code" required>
                </div>
                <div class="field input button">
                    <input type="submit" value="Verify">
                </div>
            </form>
            <div class="link">Didn't get Code Yet? <a href="javascript:window.location.reload(true)">Send Again</a></div>
        </section>
    </div>

    <script src="js/verify_email.js"></script>
</body>

</html>