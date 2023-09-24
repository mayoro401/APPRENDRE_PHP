<?php
// Démarrer ou reprendre la session PHP en cours.
session_start();

// Récupérer la valeur du champ de formulaire nommé "login" soumis via la méthode POST,
// la supprimer en cas d'erreur avec "@" et la stocker dans la variable $login.
@$login = $_POST["login"];

// Récupérer la valeur du champ de formulaire nommé "pass" soumis via la méthode POST,
// appliquer la fonction md5 pour hacher le mot de passe, et la stocker dans la variable $pass.
@$pass = md5($_POST["pass"]);

// Récupérer la valeur du champ de formulaire nommé "valider" soumis via la méthode POST
// et la stocker dans la variable $valider.

@$valider = $_POST["valider"];

// Initialiser une variable $erreur vide qui sera utilisée pour stocker d'éventuels messages d'erreur.
$erreur = "";

// Vérifier si le bouton de validation du formulaire a été soumis.
if (isset($valider)) {

    // Inclure un fichier (probablement pour la gestion de la base de données).
    include("connexion.php");

    // Préparer une requête SQL pour sélectionner les données de la table "utilisateurs"
    // où le champ "login" correspond à $login et le champ "pass" correspond à $pass (mot de passe haché).
    // Limiter les résultats à 1 enregistrement.
    $sel = $pdo->prepare("select * from utilisateurs where login=? and pass=? limit 1");

    // Exécuter la requête SQL en liant les valeurs de $login et $pass aux paramètres de la requête.
    $sel->execute(array($login, $pass));

    // Récupérer tous les résultats de la requête dans un tableau $tab.
    $tab = $sel->fetchAll();

    // Vérifier si au moins un enregistrement correspondant a été trouvé dans la base de données.
    if (count($tab) > 0) {

        // Si un enregistrement correspondant a été trouvé,
        // stocker le prénom et le nom de l'utilisateur dans une variable de session "prenomNom"
        // en les formatant avec ucfirst (pour la première lettre en majuscule) et strtoupper (pour tout en majuscules).
        $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["prenom"])) . " " . strtoupper($tab[0]["nom"]);

        // Stocker une autorisation (par exemple, "oui") dans une variable de session "autoriser".
        $_SESSION["autoriser"] = "oui";

        // Rediriger l'utilisateur vers la page "session.php".
        header("location:home.php");
    } else
        // Si aucun enregistrement correspondant n'a été trouvé, définir un message d'erreur.
        $erreur = "Mauvais login ou mot de passe!";
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

        <?php include 'header.php' ?>
        <div class="container col-xl-12 col-xxl-10 px-6 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3 text-lg-center">Se connetcer</h1>
                <div class="col-lg-6 text-center text-lg-center">
                    <p class="col-lg-10 fs-4">
                        <img src="image/register.svg" alt="">
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-start ">
                    <form class="p-4 p-md-7 " action="" method="post">
                        <!-- <fieldset> -->
                        <!-- <legend>Connexion</legend> -->
                        <?php if (!empty($erreur)) : ?>
                            <p style="color:red"><?= $erreur ?></p>
                        <?php endif; ?>
                        <div class="label">Username</div>
                        <div class="champ">
                            <input type="email" name="login" value="<?php echo $username ?>" />
                        </div>
                        <div class="label">Mot de passe</div>
                        <div class="champ">
                            <input type="password" name="pass" value="<?php echo $password ?>" />
                        </div>

                        <div class="champ">
                            <input type="submit" name="valider" value="Se Connecter" />
                        </div>
                        <!-- </fieldset> -->
                    </form>
                </div>
            </div>
        </div>
</body>

</html>
<!--  -->