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

    if (!empty($_POST['note'])) {
        echo 'vous avez saisi une note';
        if ($_POST['note'] >= 17) {
            echo '<div class="alert alert-primary" role="alert">
                Excellent!
              </div> ';
        } else if ($_POST['note'] >= 16) {
            echo '<div class="alert alert-secondary" role="alert">
            Tres Bien
            </div>';
        } else if ($_POST['note'] >= 14) {
            echo '<div class="alert alert-success" role="alert">
            Bien!
          </div>';
        } else if ($_POST['note'] >= 12) {
            echo '<div class="alert alert-info" role="alert">
            Assez bien!
          </div>';
        } else if ($_POST['note'] >= 10) {
            echo '<div class="alert alert-light" role="alert">
            Passabble
          </div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">
            Mauvaise note!
          </div>';
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