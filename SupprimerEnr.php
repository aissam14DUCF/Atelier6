<?php
require('user.php');
//Supp LES utilisateurs
//------------------parter M-----------------------------
$i=$_GET['id'];
try{
   $ee= new user('',$i);
   $ee->SuprimerInBd();
   unset($ee);
header('location:list.php');
}
catch(PDOException $e){
    echo $e->getMessage().' '.$e->getCode();
}
?>