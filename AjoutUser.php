<?php
require('user.php');
session_start();
try{

//$req="INSERT INTO UTILISATEUR VALUES (?,'$NouvTyp',$NouvPass,'$NouvName','$NouvLogin')";
 $NouvName=    $_SESSION['Nname_user'];
 $NouvPass =   $_SESSION['Npass_user'];
 $NouvTyp  =   $_SESSION['Ntype_user'];
 $NouvLogin=   $_SESSION['Nlogin_user'];
 $NouvId=$_SESSION['id_New'];
 echo ' '.$NouvName.' '.$NouvTyp.' '.$NouvPass.' '.$NouvLogin.' '.$NouvId;
 $e=new user($NouvName,$NouvId,$NouvLogin,$NouvPass,$NouvTyp);
 $e->InsertToBd();
}
catch(PDOException $e){echo 'Error Sur ajouter utilisateur '. $e->getMessage();}
if($_SESSION['Ntype_user']=='ETUDIANT'){
header('location:index2.php');
}
else{
header('location:list.php');
}
?>