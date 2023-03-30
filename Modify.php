<?php
//Stocker les variables pour modifiy
// ---------------------------parter M--------------------------------

session_start(); require('Connexion.php');
 if(isset($_SESSION['id_mo'])){
      $iid=$_SESSION['id_mo'];
      $req='SELECT * FROM ETUDIANT WHERE id=?';
      $st=$con->prepare($req);
      $st->bindParam(1,$iid);
      $st->execute();
      $etud_mod=$st->fetch();
      $_SESSION['nom']=trim($etud_mod['name']);
      $_SESSION['inf']=trim($etud_mod['info']);
      $_SESSION['mat']=trim($etud_mod['math']);
    header('location:index2.php');          
  }
?>