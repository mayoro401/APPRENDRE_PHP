<?php
session_start();
// if ($_SESSION["autoriser"] != "oui") {
//     header("location:login.php");
//     exit();
// }
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue dans votre espace personnel";
else
    $bienvenue = "Bonsoir et bienvenue dans votre espace personnel";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;
        }

        a {
            color: #DD7700;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body onLoad="document.fo.login.focus()">
    
            <div class="container-fluid">
                <div class="d-flex bg-dark flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="image/logo.png" width="100px" height="50px" alt="">
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="#" class="nav-link text-secondary">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#home" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#table" />
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#grid" />
                                </svg>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="deconnexion.php" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#people-circle" />
                                </svg>
                                Deconnexion
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        
    <h1><?php echo $bienvenue ?></h1>
</body>

</html>