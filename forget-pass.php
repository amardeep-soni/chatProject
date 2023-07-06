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
        <section class="form forgetPass">
            <header>Amardeep Chat App</header>
            <form action=""  autocomplete="off">
                <div class="error-txt">This is an error message!</div>
                <div class="success-txt">This is an error message!</div>
                <div class="field input emailInput">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>
                <div id="hiddenField">
                    
                </div>
                <div class="field input button">
                    <input type="submit" value="Find Email">
                </div>
            </form>
            <div class="hr"></div>
            <div class="link"><a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="js/forget-pass.js"></script>
</body>

</html>