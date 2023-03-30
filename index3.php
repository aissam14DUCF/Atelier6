<?php
  session_start();
  if(empty($_SESSION['id']) OR empty($_SESSION['pass'])){
    header('location:index.php');
  }
  if (strcmp($_SESSION['type'], "ADMIN") == 0 or strcmp($_SESSION['type'], "admin") == 0) {
    //  header('location:list.php');
} else {
    header('location:index.php');
}
  
?>
<?php 
?>
<html>
    <head>

    </head>
    <body>
        <form action=""method='POST'>
     <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"
    value="<?php if(isset($_GET['id']))
      {
      echo (trim($_GET['name']));
      }
   ?>"maxlength="20">
  
<label for="type">Type :</label>

<select name="type" id="type">
    <option value=""><?php if(isset($_GET['id'])){
        echo ($_GET['type']);
      }?></option>
    <option value="ADMIN">ADMIN</option>
    <option value="PROF">PROF</option>
    <!-- <option value="ETUDIANT">ETUDIANT</option> -->
    <option value="prof">prof</option>
    <option value="admin">admin</option>
    <option value="etudiant">etudiant</option>
</select>

    <label for="mot">Mot de pass :</label>
    <input type="text" id="mot" name="mot" 
    value="<?php if(isset($_GET['id']))
      {
        echo ($_GET['pass']);
      }
   ?>">
   <label for="login">Login :</label>
    <input type="text" id="login" name="login" 
    value="<?php if(isset($_GET['id']))
      {
        echo ($_GET['login']);
      }
   ?>">

    <div class="E1">
      <input type="submit" name="Valider" value="valider" class="D1">
      <input type="reset" value="Annuler" class="D1">
    </div>
    
        </form>
    </body>
</html>
<?php        
//Modifier User
if(!empty($_POST['mot']) AND !empty($_POST['type']) AND !empty($_POST['nom']) AND !empty($_POST['login']))
{
  if(isset($_POST['Valider'])AND isset($_GET['id']))
{
    $_SESSION['id_user']=$_GET['id'];
    $_SESSION['name_user']=$_POST['nom'];
    $_SESSION['pass_user']=$_POST['mot'];
    $_SESSION['type_user']=$_POST['type'];
    $_SESSION['login_user']=$_POST['login']; 
    header('location:modyUser.php');
}
if(isset($_SESSION['Ajout'])AND $_POST['Valider'])
{
  //Nouveau 
    //$_SESSION['id_user']=$_GET['id'];
    require('Connexion.php');
    $_SESSION['Nname_user']=$_POST['nom'];
    $_SESSION['Npass_user']=$_POST['mot'];
    $_SESSION['Ntype_user']=strtoupper($_POST['type']);
    $_SESSION['Nlogin_user']=$_POST['login'];
    $COUNT =$con ->query("SELECT max(id) FROM UTILISATEUR")->fetch();
    $_SESSION['id_New']=$COUNT[0]+1;
    header('location:AjoutUser.php');
   }

}
?>