<?php
//Supp sur bd oracle
  // ---------------------------parter M--------------------------------

session_start();require('Connexion.php');
 if(isset($_SESSION['dele']))
 {
   $id_delete=$_SESSION['dele'];//ID Que Je veux Supp
   $sql="SELECT * FROM ETUDIANT WHERE id=?";
   $st=$con->prepare($sql);
   $st->bindParam(1,$id_delete);
   $st->execute();
   $etud_Supp=$st->fetch();
   $sql1='DELETE FROM ETUDIANT WHERE id=?';
   $st=$con->prepare($sql1);
   $st->bindParam(1,$id_delete);
   $st->execute();
   unset($_SESSION['dele']);
   header('location:inde.php');
 }

?>