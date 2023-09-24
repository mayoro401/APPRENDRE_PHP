<?php
   // Démarrer ou reprendre la session PHP en cours.
   session_start();

   // Récupérer les valeurs des champs de formulaire (nom, prénom, login, pass, repass, valider)
   // soumises via la méthode POST et stocker ces valeurs dans des variables correspondantes,
   // en supprimant les notifications d'erreur avec "@".
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$login=$_POST["login"];
   @$pass=$_POST["pass"];
   @$repass=$_POST["repass"];
   @$valider=$_POST["valider"];

   // Initialiser une variable $erreur vide qui sera utilisée pour stocker d'éventuels messages d'erreur.
   $erreur="";

   // Vérifier si le bouton de validation du formulaire a été soumis.
   if(isset($valider)){

      // Vérifier si l'un des champs obligatoires est vide et stocker un message d'erreur approprié.
      if(empty($nom)) $erreur="Nom laissé vide!";
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      // Il y a une répétition ici, vous pouvez supprimer cette ligne.
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      elseif(empty($login)) $erreur="Email laissé vide!";
      elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
      elseif($pass!=$repass) $erreur="Mots de passe non identiques!";

      // Si tous les champs sont remplis et les mots de passe sont identiques, continuer le traitement.
      else{
         // Inclure un fichier (probablement pour la gestion de la base de données).
         include("connexion.php");

         // Préparer une requête SQL pour vérifier si le login existe déjà dans la base de données.
         $sel=$pdo->prepare("select id from utilisateurs where login=? limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();

         // Vérifier si le login existe déjà dans la base de données.
         if(count($tab)>0)
            $erreur="Login existe déjà!";
         else{
            // Si le login est unique, préparer une requête SQL pour insérer les données dans la table "utilisateurs".
            $ins=$pdo->prepare("insert into utilisateurs(nom,prenom,login,pass) values(?,?,?,?)");

            // Exécuter la requête SQL en liant les valeurs de $nom, $prenom, $login et le mot de passe haché (md5($pass)).
            if($ins->execute(array($nom,$prenom,$login,md5($pass))))
               header("location:login.php"); // Rediriger vers la page de connexion en cas de succès.
         }   
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

                    <form class="p-4 p-md-7 " action="inscription.php" method="post">
                        <!-- <fieldset> -->
                        <!-- <legend>Inscription</legend> -->
                        <?php if (!empty($erreur)) : ?>
                            <p class="message" style="color:red"><?= $erreur ?></p>
                        <?php endif; ?>
                        <div class="label">Nom</div>
                        <div class="champ">
                            <input type="text" name="nom" value="<?php echo $nom ?>" />
                        </div>
                        <div class="label">Prenom</div>
                        <div class="champ">
                            <input type="text" name="prenom" value="<?php echo $prenom ?>" />
                        </div>
                        <div class="label">Email</div>
                        <div class="champ">
                            <input type="email" name="login" value="<?php echo $login ?>" />
                        </div>
                        <div class="label">Mot de passe</div>
                        <div class="champ">
                            <input type="password" name="pass" value="<?php echo $pass ?>"/>
                        </div>
                        <div class="label">Confirmer mot de passe</div>
                        <div class="champ">
                            <input type="password" name="repass" />
                        </div>
                        <div class="champ">
                            <input type="submit" name="valider" value="Valider l'inscription" />
                        </div>
                        <!-- </fieldset> -->
                    </form>
                </div>
            </div>
        </div>
</body>

</html>