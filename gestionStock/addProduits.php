<?php
   // Démarrer ou reprendre la session PHP en cours.
  
   session_start();
   if ($_SESSION["autoriser"] != "oui") {
       header("location:login.php");
       exit();
   }
   // Récupérer les valeurs des champs de formulaire (nom_produit, quantite, valider)
   // soumises via la méthode POST et stocker ces valeurs dans des variables correspondantes,
   // en supprimant les notifications d'erreur avec "@".
   @$produit=$_POST["produit"];
   @$quantite=$_POST["quantite"];
   @$valider=$_POST["valider"];
   // Initialiser une variable $erreur vide qui sera utilisée pour stocker d'éventuels messages d'erreur.
   $erreur="";

   // Vérifier si le bouton de validation du formulaire a été soumis.
   if(isset($valider)){

      // Vérifier si l'un des champs obligatoires est vide et stocker un message d'erreur approprié.
      if(empty($produit)) $erreur="Nom du produit Obligatoire!";
      elseif(empty($quantite)) $erreur="Veuillez renseigner la quantité!";

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
            $ins=$pdo->prepare("insert into produits(produit,quantite) values(?,?)");

            // Exécuter la requête SQL en liant les valeurs de $nom, $prenom, $login et le mot de passe haché (md5($pass)).
            if($ins->execute(array($produit,$quantite)))
               header("location:home.php"); // Rediriger vers la page de connexion en cas de succès.
         }   
      }
   }
?>
