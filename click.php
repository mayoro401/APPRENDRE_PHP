<?php
   @$comm=$_POST["comm"];
   @$valider=$_POST["valider"];
   $commt="";
   if(isset($valider)){
      $tabl=explode("\n",$comm);
      foreach($tabl as $ligne){
         $tabm=explode(" ",$ligne);
         for($i=0;$i<count($tabm);$i++){
            if(preg_match("#^www\.#",$tabm[$i]))
               $tabm[$i]='<a href="http://'.$tabm[$i].'" target="_blank">'.$tabm[$i].'</a>';
            elseif(preg_match("#^http://#",$tabm[$i]))
               $tabm[$i]='<a href="'.$tabm[$i].'" target="_blank">'.$tabm[$i].'</a>';
            $nligne=implode(" ",$tabm);
         }
         $commt.=$nligne."<br />";
      }   
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <style>
         *{
            font-family:arial, sans-serif;
            color:#888888;
         }
         textarea{   
            border:solid 1px #EE6600;
            padding:10px;
            outline:none;
         }
         input{
            background-color:#EE6600;
            color:#FFFFFF;
            padding:10px;
            border:none;
            outline:none;
         }
         a{
            color:#EE6600;
            text-decoration:none;
         }
         a:hover{
            text-decoration:underline;
         }
      </style>
   </head>
   <body>
      <form name="fo" method="post" action="">
         <textarea name="comm" cols="50" rows="6">
         </textarea><br />
         <input type="submit" name="valider" value="Valider le commentaire" /><br />
      </form>
      <?php
         echo $commt;
      ?>
   </body>
</html>