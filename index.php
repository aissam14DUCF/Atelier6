<?php session_start();
$_SESSION=array();
?>
<?php
$_SESSION['name']='';
$_SESSION['id']='';
$_SESSION['info']='';
$_SESSION['math']='';
$_SESSION['taille']=0;

?>
 <!-- ----------------------------------PARTER V---------------------------- --> 
<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire</title>
    <meta charset="UTF8">
    <link rel="stylesheet" href="Css/Style1.css">
    <style>
      p{color: red;}
    </style>
  </head>
<body>
  <center class="continue">
<div id="P1"></div>
<div id="P2">
  <br><br>
<form action="index.php" method="POST">
   <label for="Identifiant">Identifiant :</label>
    <input type="text" id="Identifiant" name="Iden" placeholder="ID : SMI"><br>
    <p><?php echo VerifierID(); ?></p>
  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="pass" placeholder="1234">
  <p><?php echo VerifierMod(); ?></p>
</div><br>
  <div id="P3"><?php  Valider("SMI",2023); ?>
    <input type="reset" value="Annuler" name="anul">
    <input type="submit" value="Valider" name="Valid">
  </div>
</form>
</center>
</body>
</html>
<?php

//----------------------------------PARTER C---------------------------- -!>

require('Connexion.php');
//  Pour calculler la taille de table Etudiant
 $query = "SELECT * from ETUDIANT";
 $COUNT =$con ->query("SELECT COUNT(*) FROM ETUDIANT")->fetch();
 $_SESSION['taille']=$COUNT[0];

function Valider($user,$pass){
  if(isset($_POST['Valid'])){
    if(!empty($_POST['Iden']) AND !empty($_POST['pass'])){
        $_SESSION['id']=$_POST['Iden'];
        $_SESSION['pass']=$_POST['pass'];
        header('location:login.php');
        
      }
    }
  }
  

function VerifierMod(){
  if(isset($_POST['Valid'])){
    if(empty($_POST['pass']))
    {
      return('SVP Saisir voutre password');
    }
  }
}
function VerifierID(){
  if(isset($_POST['Valid'])){
    if(empty($_POST['Iden']))
    {
      return('SVP Saisir voutre ID');
    }
  }

}
?>
