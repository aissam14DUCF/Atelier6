<?php 
//Fonction Pour Calculer Moyenne et Mention
function CalculerMoyenne($a,$b){
    return ($a+$b)/2;
} 
function Mention($mou){
    if($mou<10)
    {
      return('N.V');
    }elseif(10<=$mou&& $mou<=12)
    {
      return('A.D');
    }elseif(12<$mou && $mou<=14){
      return('A.B');
    }elseif(14<$mou && $mou<=16){
      return('T.B');
    }else
    return('T.T.B');
  } 
  ?>