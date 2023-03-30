<?php
//Modify sur BD
session_start();
require('Etudiant.php');
      $ID=$_SESSION['id_mo'];//ID De user que je veux Changer
      $nom=$_SESSION['ModifyEtudiant'];//nouveau nom
      $lmath=$_SESSION['ModifyMaths'];
      $linfo=$_SESSION['ModifyInfo'];
      $e=new Etudiant($ID,$nom,$lmath,$linfo);
      $e->UpdateToBd();
      unset($e);
      header('location:inde.php');
?>