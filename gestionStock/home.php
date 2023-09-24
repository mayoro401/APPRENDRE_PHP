

<?php
session_start();
session_start();
if ($_SESSION["autoriser"] != "oui") {
    header("location:login.php");
    exit();
}


if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue dans votre espace personnel";
else
    $bienvenue = "Bonsoir et bienvenue dans votre espace personnel";
?>
<?php
   // Démarrer ou reprendre la session PHP en cours.
  

   // Récupérer les valeurs des champs de formulaire (nom_produit, quantite, valider)
   // soumises via la méthode POST et stocker ces valeurs dans des variables correspondantes,
   // en supprimant les notifications d'erreur avec "@".
   @$produit=$_POST["produit"];
   @$quantite=$_POST["quantite"];
   @$categorie=$_POST["categorie"];
   @$valider=$_POST["valider"];
   // Initialiser une variable $erreur vide qui sera utilisée pour stocker d'éventuels messages d'erreur.
   $erreur="";

   // Vérifier si le bouton de validation du formulaire a été soumis.
   if(isset($valider)){

      // Vérifier si l'un des champs obligatoires est vide et stocker un message d'erreur approprié.
      if(empty($produit)) $erreur="Nom du produit Obligatoire!";
      elseif(empty($quantite)) $erreur="Veuillez renseigner la quantité!";
      elseif(empty($categorie)) $erreur="Veuillez renseigner la catégorie!";

      // Si tous les champs sont remplis , continuer le traitement.
      else{
         // Inclure un fichier (probablement pour la gestion de la base de données).
         include("connexion.php");

         // Préparer une requête SQL pour vérifier si le login existe déjà dans la base de données.
         $sel=$pdo->prepare("select id from produits where produit=? limit 1");
         $sel->execute(array($produit));
         $tab=$sel->fetchAll();

         // Vérifier si le login existe déjà dans la base de données.
         if(count($tab)>0)
            $erreur="produit existe déjà!";
         else{
            // Si le login est unique, préparer une requête SQL pour insérer les données dans la table "utilisateurs".
            $ins=$pdo->prepare("insert into produits(produit,quantite,categorie) values(?,?,?)");

            // Exécuter la requête SQL en liant les valeurs de $nom, $prenom, $login et le mot de passe haché (md5($pass)).
            if($ins->execute(array($produit,$quantite,$categorie)))
               header("location:home.php"); // Rediriger vers la page de connexion en cas de succès.
         }   
      }
   }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicons -->
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
            color: red;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
        }

        .lien a {
            text-decoration: none;
            margin-right: 30px;
            color: black;
            font-style: normal;
        }
        input,
        select {
            border: solid 1px #AAAAAA;
            padding: 10px;
            font: 10pt verdana;
            color: #FB1313;
            outline: none;
            border-radius: 6px;
            width: 100%;
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
    <!-- onLoad="document.fo.login.focus()" -->
    <div class="container-fluid bg-light">
        <nav class="navbar">
            <div class="img">
                <a href="home.php"><img src="image/logo.png" width="100px" height="80px" alt=""></a>
            </div>
            <div class="lien">
                <a href="listeUser.php">Utilisateurs</a>
                <a href="produits">Produits</a>
                <a href="deconnexion.php">Se déconnecter</a>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <button type="button" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-cart-plus"></i> Ajouter</button>
       
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Produit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="p-4 p-md-7 " action="" method="post">
                        <!-- <fieldset> -->
                        <!-- <legend>Inscription</legend> -->
                        <?php if (!empty($erreur)) : ?>
                            <p class="message" style="color:red"><?= $erreur ?></p>
                        <?php endif; ?>
                        <div class="label">Nom Produit</div>
                        <div class="champ">
                            <input type="text" name="produit" value="<?php echo $produit ?>" />
                        </div>
                        <div class="label">Quantité</div>
                        <div class="champ">
                            <input type="number" name="quantite" value="<?php echo $quantite ?>" />
                        </div>
                        <div class="label">Catégorie</div>
                        <div class="champ">
                            <input type="text" name="categorie" value="<?php echo $categorie ?>" />
                        </div>
                        <div class="champ">
                            <input type="submit" name="valider" value="Valider l'inscription" />
                        </div>
                        <!-- </fieldset> -->
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                       
                    </div>
                </div>
            </div>
        </div>

    
        


    </div>

    <marquee behav ior="" direction="">
        <h1><?php echo $bienvenue ?></h1>
    </marquee>

</body>

</html>