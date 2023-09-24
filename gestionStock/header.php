<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 0px;
        }

        a {
            color: #DD7700;
            text-decoration: none;
        }

        a:hover {
            color:red;
        }
        .navbar{
            display: flex;
            justify-content: space-between;
        }
         .lien  a{
            text-decoration: none;
            margin-right: 30px;
            color: black;
            font-style: normal;
         }
    </style>
</head>
<body>
<div class="container-fluid bg-light">
        <nav class="navbar">
            <div class="img">
            <a href="index.php"><img src="image/logo.png" width="100px" height="80px" alt=""></a>
            </div>
            <div class="lien">
            <a class="navbar-brand" href="login.php">Se connecter</a>
            <a class="navbar-brand " href="inscription.php">S'inscrire</a>
            </div>
        </nav>
    </div>
</body>
</html>
