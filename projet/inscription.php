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
      elseif(empty($login)) $erreur="Login laissé vide!";
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
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
   </head>
   <body>
      <h1>Inscription</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
         <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom?>" /><br />
         <input type="text" name="login" placeholder="Login" value="<?php echo $login?>" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
      </form>
   </body>
</html>