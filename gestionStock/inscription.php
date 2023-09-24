
<?php

include("connexion.php");

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
    $stmt = $con->prepare($sql);
    
    $result = $stmt->execute(['email' => $email, 'username' => $username, 'password' => $password]);


    if ($result) {
        $message = 'Inscription réussie!';
        header('Location: login.php');
    } else {
        $message = 'Erreur lors de l\'inscription.';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        fieldset {
            /* border: solid 1px #FB1313; */
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            /* align-items: center; */
            /* text-align: center; */
        }

        legend {
            font: bold 16pt arial;
            color: #FB1313;
        }

        input,
        select {
            border: solid 1px #AAAAAA;
            padding: 10px;
            font: 10pt verdana;
            color: #FB1313;
            outline: none;
            border-radius: 6px;
            width: 80%;
        }

        input[type="submit"] {
            border: none;
            background-color: #FB1313;
            color: #FFFFFF;
            width: 200px;
            cursor: pointer;
        }

        .label {
            margin-bottom: 4px;
            font: 10pt arial;
            color: #AAAAAA;
        }

        .champ {
            margin-bottom: 20px;
        }

        .erreur {
            font: 10pt arial;
            color: #DD0000;
            background-color: #EEEEEE;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .rappel {
            font: 10pt arial;
            color: #888888;
            background-color: #EEEEEE;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include 'header.php' ?>
        <div class="container col-xl-12 col-xxl-10 px-6 py-5">
            <div class="row align-items-center g-lg-5 py-5">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3 text-lg-center">S'inscrire</h1>
                <div class="col-lg-6 text-center text-lg-center">
                    <!-- <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Register</h1> -->
                    <p class="col-lg-10 fs-4">
                        <img src="image/register.svg" alt="">
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-start ">
                        <?php if (!empty($message)): ?>
                            <p class="message" style="color:red"><?= $message ?></p>
                        <?php endif; ?>
                       <form class="p-4 p-md-7 " action="inscription.php" method="post">
                        <!-- <fieldset> -->
                            <!-- <legend>Inscription</legend> -->
                            <div class="label">Username</div>
                            <div class="champ">
                                <input type="text" name="username" value="<?php echo $username ?>" />
                            </div>
                            <div class="label">Email</div>
                            <div class="champ">
                                <input type="text" name="email" value="<?php echo $email ?>" />
                            </div>
                            <div class="label">Mot de passe</div>
                            <div class="champ">
                                <input type="password" name="password" value="<?php echo $password ?>" />
                            </div>
                          
                            <div class="champ">
                                <input type="submit" name="valider" value="Valider l'inscription" />
                            </div>
                        <!-- </fieldset> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>