<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=mabase","root","root");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>