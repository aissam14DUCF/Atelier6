<?php 
session_start();
if(empty($_SESSION['id']) OR empty($_SESSION['pass'])){
  header('location:index.php');
}

//Pour insert sur BD
  // ---------------------------parter M--------------------------------

require('Etudiant.php');
$name=trim($_SESSION['NouveauEtudiant']);
$info=trim(doubleval($_SESSION['NouveauInfo']));
$math=trim(doubleval($_SESSION['NouveauMaths']));
  $ide=$_SESSION['tai']+1;// Pointer sur la dirnier element
  $e=new Etudiant($ide,$name,$info,$math);
  $e->InsertTOBd();
  unset($_SESSION['NouveauInfo']);
  unset($_SESSION['NouveauMaths']);
  unset($_SESSION['NouveauEtudiant']);

  unset($_SESSION['Ntype_user']);

  
  unset($e);
  header('location:inde.php');


?>