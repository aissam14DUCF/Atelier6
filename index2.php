<?php
session_start();
require('Connexion.php');
require('Etudiant.php');
//la taille de table utilisateur




//Verifier Si l'utlisateur passer sur l'endex
// ---------------------------parter C--------------------------------

    if(empty($_SESSION['id']) OR empty($_SESSION['pass'])){
      header('location:index.php');
    }
    ?>
<!- // ---------------------------parter V--------------------------------

<!DOCTYPE html>
<html>
    <head>
        <title>Forme</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<form action="index2.php" method="POST">
    <label for="Etudiant">Etudiant :</label>
    <input type="text" id="Etudiant" name="Etudiant"
    value="<?php if(isset($_SESSION['id_mo']) and !isset($_SESSION['Ntype_user']))
      {
      echo (trim($_SESSION['nom']));
      }if(isset($_SESSION['Ntype_user']))
      {
        echo $_SESSION['Nname_user'];
      }
   ?>"maxlength="20">
    <label for="Maths">Maths :</label>
    <input type="number" id="Maths" name="Maths" 
    value="<?php if(isset($_SESSION['id_mo']) AND !isset($_SESSION['Ntype_user']))
      {
        echo ($_SESSION['mat']);
      }
  
   ?>" min='0' max='20'>
    <label for="Informatique">Informatique :</label>
    <input type="number" id="Informatique" name="Informatique" 
    value="<?php if(isset($_SESSION['id_mo']) AND !isset($_SESSION['Ntype_user']))
      {
        echo ($_SESSION['inf']);
      }
   ?>" min='0' max='20'>
    <div id="E1">
      <input type="submit" name="Résultat" value="Résultat" class="D1">
      <input type="reset" value="Annuler" class="D1">
    </div>
    
  </form>
</body>
  </html>
  <?php   
  // ---------------------------parter C--------------------------------
//Pour ajouter les etudiants
  if(!isset($_SESSION['Ntype_user'])&& !isset($_SESSION['id_mo']) && isset($_POST['Résultat']) AND !empty($_POST['Etudiant'])AND !empty($_POST['Maths'])AND !empty($_POST['Informatique']) ){
  $_SESSION['NouveauEtudiant']=$_POST['Etudiant'];
      $_SESSION['NouveauInfo']=$_POST['Informatique'];
      $_SESSION['NouveauMaths']=$_POST['Maths'];
      header('location:AjouterEtud.php');
  }

  //pour UPDATE LES VARS sur BD 
    // ---------------------------parter C--------------------------------
    //echo $_SESSION['Ntype_user'];
    if(!isset($_SESSION['Ntype_user'])&& isset($_SESSION['id_mo']) && isset($_POST['Résultat'])AND !empty($_POST['Etudiant'])AND !empty($_POST['Maths'])AND !empty($_POST['Informatique']))
    {
      $_SESSION['ModifyEtudiant']=$_POST['Etudiant'];
      $_SESSION['ModifyInfo']    =$_POST['Informatique'];
      $_SESSION['ModifyMaths']   =$_POST['Maths'];
      header('location:ModifyBD.php');
    }
    //ADMIN AJOUTER UN ETUDIANT
    //------------------------------ Parter C------------------------------------
    if(isset($_POST['Résultat'])AND !empty($_POST['Etudiant'])AND !empty($_POST['Maths'])AND !empty($_POST['Informatique']))
    {
      if(strcmp($_SESSION['Ntype_user'],'ETUDIANT')==0)
      {
      $_SESSION['NouveauEtudiant']=$_POST['Etudiant'];
      $_SESSION['NouveauInfo']    =$_POST['Informatique'];
      $_SESSION['NouveauMaths']   =$_POST['Maths'];
      header('location:AjouterEtud.php');
    }
  }

  ?>

