<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container col-6">
        <p><h1>EXERCICE: MENTION</h1></p>
    <form action="" method="post">
        <!-- <label for="nom">Nom :</label><br/>
        <input type="text" name="nom" placeholder="votre nom"><br>
        <label for="prenom">Prenom :</label><br>
        <input type="text" name="prenom" placeholder="votre prenom"><br>
        <input type="submit" value="valider"> -->

        <label for="note"> Donner la note :</label>
        <input type="number" name="note" placeholder="la note">
        <input type="submit" name="valider">
    </form>

    <?php
    // $nom=$_POST['nom'];
    // $prenom= $_POST['prenom'];
    // echo 'bonjour ' .$nom. ' '.$prenom ;
    $mention=array('Excellent', 'Tres Bien', 'Bien', 'Assez Bien', 'Passable', 'Pas de Mention');
    $decision=['ADMIS','ELIMINE'];
    
    //  print_r($decision) ;
    // print_r($mention);

  // Affichage des valeurs d'un tableau
    // foreach($decision as $valeur) 
    // {  
    //     echo $valeur ,'<br/>';
    // }

    
    //  // Affichage des valeurs d'un tableau
    // foreach($mention as $valeur) 
    // {  
    //     echo $valeur ,'<br/>';
    // }

    if (!empty($_POST['note'])) {
        // echo 'vous avez saisi une note';
        if ($_POST['note'] >= 17) {
            echo '<div class="alert alert-success" role="alert">
                '.$mention[0].', vous etes '.$decision[0].'! </div> ';
        } else if ($_POST['note'] >= 16) {
            echo '<div class="alert alert-primary" role="alert">
            '.$mention[1].', vous etes '.$decision[0].'! </div> ';
        } else if ($_POST['note'] >= 14) {
            echo '<div class="alert alert-secondary" role="alert">
            '.$mention[2].', vous etes '.$decision[0].'! </div> ';
        } else if ($_POST['note'] >= 12) {
            echo '<div class="alert alert-info" role="alert">
            '.$mention[3].', vous etes '.$decision[0].'! </div> ';
        } else if ($_POST['note'] >= 10) {
            echo '<div class="alert alert-warning" role="alert">
            '.$mention[4].', vous etes '.$decision[0].'! </div> ';
        } else {
            echo '<div class="alert alert-danger" role="alert">
            '.$mention[5].', vous etes '.$decision[1].'! </div> ';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Aucune note n est saisi!
      </div>';
    }
    ?>


    </div>

</body>

</html>