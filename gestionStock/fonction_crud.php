<?php

//fonction d'affichhage
function affiche_produits(){
    include 'connexion.php';
//Fetch_NUM
    $req1="select prenom,nom,adresse,telephone from etudiant"; 
    if($result=$con->query($req1)){
        echo "Nous avons " .$result->rowCount(). "enregistrement <br/>"; 
    while($donnee=$result->fetch(PDO::FETCH_NUM))
    {
        echo $donnee[0] ." ". $donnee[1] ." ". $donnee[2] ." ". $donnee[3]. "<br/>"; }
    }

 //Fetch_ASSOC   
    // $req1="select prenom,nom,adresse,telephone from etudiant"; if($result=$con->query($req1))
    // {
    // echo "Nous avons " .$result->rowCount(). "enregistrement <br/>"; while($donnee=$result->fetch(PDO::FETCH_ASSOC))
    // {
    // echo $donnee['prenom'] ." ". $donnee['nom'] ." ". $donnee['adresse'] ." ". $donnee['telephone']. "<br/>"; }
    // }

//Fetch_OBJ
    // $req1="select prenom,nom,adresse,telephone from etudiant"; if($result=$con->query($req1))
    // {
    // echo "Nous avons " .$result->rowCount(). "enregistrement <br/>"; while($donnee=$result->fetch(PDO::FETCH_OBJ))
    // {
    // echo $donnee->prenom ." ". $donnee->nom ." ". $donnee->adresse ." ". $donnee->telephone. "<br/>"; }
    // }

//fetchObject
    // $req1="select prenom,nom,adresse,telephone from etudiant"; 
    // if($result=$con->query($req1))
    // {
    // echo "Nous avons " .$result->rowCount(). "enregistrement <br/>"; 
    // while($donnee=$result->fetchObject())
    // {
    // echo $donnee->prenom ." ". $donnee->nom ." ". $donnee->adresse ." ". $donnee->telephone. "<br/>"; }
    // }

}
//fonction d'enregistrement
function enregistrer_produits(){

}

//fonction de modification
function modifier_produits(){
    include 'connexion.php';
    $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
    // Prepare statement
    $stmt = $con->prepare($sql);
    // execute the query
    $stmt->execute();
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
}

//fonction de suppression
function supprimer_produits(){
    include 'connexion.php';
    $req1="delete from etudiant where id_etudiant=1"; 
    if($con->exec($req1)!== false){
        echo "suppression bien effectuée";
    } 
    else {
        echo "échec de suppression";
    }
}
