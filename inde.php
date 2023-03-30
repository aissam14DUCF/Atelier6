<?php
 session_start();
 $_SESSION['id_mo']='';
 echo "<h1>Bienvenue à nouveau ".$_SESSION['user'] ."! ". $_SESSION['type']."</h1>";
 //Verifier Si l'utlisateur passer sur l'endex
 // ---------------------------parter C--------------------------------

    if(empty($_SESSION['type']) OR empty($_SESSION['user'])){
      header('location:index.php');
    }
    require('Connexion.php');require('Etudiant.php');NouveauEtud();include('Mention.php');

//------------------------------------------------------------------------  
?>
  <!-- ---------------------------parter V--------------------------------- -!> -->

<!DOCTYPE html>
<html>
<head>
    <title>Resu</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="S1.css">

    <style>
      body{
        margin-left: 300px; 
        margin-top: 40px;            
      }
      table{
        width: 50%;
        height: 50%;
        font-size: 30px;
      }
      table th{border: solid 1px; color: #678;}
      table tr{border: solid 1px; color: #678;}
      table td{border: solid 1px; color: #678;}
      button{font-size: 25px;}


      #reset{
        background-color:#f12 ;
        font-size: 15px;
        margin-left: 15px;
        border-radius: 5px 5px 5px;
      }
      #nouv{
        background-color: green;
        font-size: 15px;
        border-radius: 5px 5px 5px;


      }
    </style>
</head>
<body>
  
       <div>
           <table>
           <tr>
            <th>Nom</th>
            <th>Maths</th>
            <th>Informatique</th>
            <th>Moyenne</th>
            <th>Mention</th>
            

          </tr>
          <form  method="post">
          <?php   if($_SESSION['type']=='ADMIN'OR $_SESSION['type']=='admin'){echo '<button type="submit" name="admin" value="admin">Getion d utilisateur</button>';echo '<br><br>';      
} ?>
          <?php if($_SESSION['type']=='ADMIN'OR $_SESSION['type']=='admin' OR $_SESSION['type']=='prof' OR $_SESSION['type']=='PROF'){
           echo '<button type="submit" name="nouv" value="nouv" id="nouv">NOUVEAUX</button>';}?>
            <button type="submit" name="reset" value="reset" id="reset">QUIT</button>
            <?php 
//liste de prof et admin et etud
//-------------------------parter C ----------------------------------------
if($_SERVER["REQUEST_METHOD"]=='POST'){
if(isset($_POST['admin'])){
header('location:list.php');
}
}

//---------------------------------------------------------------------------
//POUR SUPPRIMER
// ---------------------------parter C--------------------------------

              if(isset($_POST['delete']))
              {
                $_SESSION['dele']=$_POST['delete'];
                header('location:supp.php');

              }



// ---------------------------parter M--------------------------------

          $query = "SELECT * from ETUDIANT ORDER BY id";
            $Lign=$con->prepare($query);
            $Lign->execute();
            $i=0;
            $t=0;
//--------------------------------------------------------------------
// ---------------------------parter V--------------------------------

      while($ligne=$Lign->fetch()){
              $a=0;
              echo '<tr>';
               echo '<td>'.$ligne['name'].'</td>';
               echo '<td>'.$ligne['math'].'</td>';
               echo '<td>'.$ligne['info'].'</td>';
               $a=CalculerMoyenne(floatval($ligne['info']),floatval($ligne['math']));
               echo '<td>'.$a.'</td>';
               echo '<td>'.Mention($a).'</td>';
          if($_SESSION['type']=='ADMIN'OR $_SESSION['type']=='admin' OR $_SESSION['type']=='prof' OR$_SESSION['type']=='PROF'){echo '<td><button type="submit" name="Modify" value='.$ligne['id'].'>M</button></td>';
               echo '<td><button type="submit" name="delete" value='.$ligne['id'].'>S</button></td>';
               echo '<td><button type="submit" name="resuPDF" value='.$i.'>I</button></td>';

            echo '</tr>';}$_SESSION['tai']=$ligne['id'];
            $i++;
      }
      if(isset($_POST['resuPDF'])){
        $_SESSION['PDF']=$_POST['resuPDF'];
        header('location:Telecharger.php');
      } 

          $_SESSION['taille']=$i;

//-----------------------------------------------------------------------
//POUR MODIFY
// ---------------------------parter C--------------------------------

          if(isset($_POST['Modify'])){
            $_SESSION['id_mo']=$_POST['Modify'];
            unset($_SESSION['Ntype_user']);
           //unset($_SESSION['Ntype_user']);
            header('location:Modify.php');          
          }
//--------------------------------------------------------------------
//POUR AJOUTER
// ---------------------------parter C--------------------------------

          function NouveauEtud(){
            if(isset($_POST['nouv'])){
              unset($_SESSION['id_mo']);
              unset($_POST['Modify']);
              unset($_POST['delete']);
              header('location:index2.php');
            }
          elseif(isset($_POST['reset']))
          {die('Fin programme');}
          }
//-----------------------------------------------------------------------
            
?>
          </form> 
           </table> 

       </div>
       
    </body>
</html>


