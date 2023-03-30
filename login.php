<?php
session_start();
echo 'login';
$_SESSION['type']='';

require 'Connexion.php';
//-----------------------parter M--------------------------------------------------------
$a=0;
$quer='SELECT * FROM UTILISATEUR';
$stat=$con->prepare($quer);
$stat->execute();
while($user=$stat->fetch()){
    if(strcmp($user['login'],$_SESSION['id'])==0 AND $user['pass']==$_SESSION['pass'] ){
               $_SESSION['type']=$user['typ'];
               $_SESSION['user']=$user['nom'];
               $a=0;
               break;
    }
    else
    {
        $a=1;
    }
}
if($a==0){
    header('location:inde.php');
}
else
{
    header('location:index.php');
    
}

?>