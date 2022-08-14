<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=extranet_gbaf","root","root",
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>