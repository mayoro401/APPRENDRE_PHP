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
        header("location:session.php");
    } else
        // Si aucun enregistrement correspondant n'a été trouvé, définir un message d'erreur.
        $erreur = "Mauvais login ou mot de passe!";
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;
        }

        input {
            border: solid 1px #2222AA;
            margin-bottom: 10px;
            padding: 16px;
            outline: none;
            border-radius: 6px;
        }

        .erreur {
            color: #CC0000;
            margin-bottom: 10px;
        }

        a {
            font-size: 12pt;
            color: #EE6600;
            text-decoration: none;
            font-weight: normal;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body onLoad="document.fo.login.focus()">
    <h1>Authentification [ <a href="inscription.php">Créer un compte</a> ]</h1>
    <div class="erreur"><?php echo $erreur ?></div>
    <form name="fo" method="post" action="">
        <input type="text" name="login" placeholder="Login" /><br />
        <input type="password" name="pass" placeholder="Mot de passe" /><br />
        <input type="submit" name="valider" value="S'authentifier" />
    </form>
</body>

</html>