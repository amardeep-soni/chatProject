<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amardeep Chat App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background-image: url(img/back.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 0%;
            backdrop-filter: blur(5px);
            color: white;
        }

        img {
            border-radius: 100px 30px;
        }
    </style>
</head>

<body class="p-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <img src="img/chatImg.jpg" width="90%" alt="Chat Img">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                <h1>Welcome to, <br> &nbsp;&nbsp; Amardeep Chat WebApp</h1>
                <h5 class="text-center my-2">Here you can Chat privately with your Friends And Family</h5>

                <div class="button d-flex align-items-center">
                    <a href="signup.php" class="btn btn-primary px-5 py-2 mt-4">Signup</a>
                    <a href="login.php" class="btn btn-warning px-5 py-2 ml-3 mt-4">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>