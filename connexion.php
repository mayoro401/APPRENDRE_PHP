<?php

//on recupere les valeur saisies dans le formulaire
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];

$servername = 'localhost';
$username = 'root';
$password = 'root';
//On essaie de se connecter
try {
    $conn = new PDO("mysql:host=$servername;dbname=bdtest", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Connexion réussie';

//creer une base de donnee
    // $sql = "CREATE DATABASE pdodb";
    // $conn->exec($sql);
    // echo 'Base de données créée bien créée !';


//creer une table dans la base
    // $sql = "CREATE TABLE Clients(
    //     Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     Nom VARCHAR(30) NOT NULL,
    //     Prenom VARCHAR(30) NOT NULL,
    //     Adresse VARCHAR(70) NOT NULL,
    //     Ville VARCHAR(30) NOT NULL,
    //     Codepostal INT UNSIGNED NOT NULL,
    //     Pays VARCHAR(30) NOT NULL,
    //     Mail VARCHAR(50) NOT NULL,
    //     DateInscription TIMESTAMP,
    //     UNIQUE(Mail))";
    // $conn->exec($sql);
    // echo 'Table bien créée !';


//



//iserer des donnes dans la table clients
    // $sql = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
    //                     VALUES('Giraud','Pierre','Quai d\'Europe','Toulon',83000,'France','pierre.giraud@edhec.com')";
    // $conn->exec($sql);
    // echo 'Entrée ajoutée dans la table clients';

    // $conn->beginTransaction();

    // $sql1 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
    //         VALUES('Doe','John','Rue des Lys','Nantes',44000,'France','j.doe@gmail.com')";
    // $conn->exec($sql1);

    // $sql2 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
    //         VALUES('Dupont','Jean','Bvd Original','Bordeaux',33000,'France','jd@gmail.com')";
    // $conn->exec($sql2);

    // $conn->commit();
    // echo 'Entrées ajoutées dans la table';

//modifier une ligne

// ********************  table users ***************

    // ajouter a la base de donnee
    $insert= "insert into users(nom,prenom,tel) values('$nom','$prenom','$tel')";
    $conn->exec($insert);
    echo 'ligne enregistree';


    //recupere le dernier id inseree
    // $last_id = $conn->lastInsertId();
    // echo "New record created successfully. Last inserted ID is: " . $last_id;
    //recuperer  un users
  

    //modifier une ligne

}
/*On capture les exceptions si une exception est lancée et on affiche
            *les informations relatives à celle-ci*/ catch (PDOException $e) {
    $conn->rollBack();
    echo "Erreur : " . $e->getMessage();
}
