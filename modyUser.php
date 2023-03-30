<?php
    require('Connexion.php');
    session_start();
    $id_user=$_SESSION['id_user'];
    $name_user=$_SESSION['name_user'];
    $pass_user=$_SESSION['pass_user'];
    $type_user=$_SESSION['type_user'];
    $login_user=$_SESSION['login_user'];
    try{
      $ee=new user($name_user,$id_user,$login_user,$pass_user,$type_user);
      $ee->UpdateInBd();
      unset($ee);
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
      // unset($_SESSION['id_user']);
      // unset($_SESSION['name_user']);
      // unset($_SESSION['pass_user']);
      // unset($_SESSION['type_user']);
      // unset($_SESSION['login_user']);
       if($_SESSION['type_user']=='ETUDIANT'){
        $_SESSION['Nid_user']=$_SESSION['id_user'];
        $_SESSION['Nname_user']=$_SESSION['name_user'];
        $_SESSION['Npass_user']=$_SESSION['pass_user'];
        $_SESSION['Ntype_user']=$_SESSION['type_user'];
        $_SESSION['Nlogin_user']=$_SESSION['login_user'];
        header('location:index2.php');}
        else{
      header('location:list.php');}
      
?>