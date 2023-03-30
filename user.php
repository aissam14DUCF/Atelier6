 <?php
 class user{
   private $name;
   private $code;
   private $id;
   private $login;
   private $type;
   function __construct($a='',$b,$c='',$d='',$e=''){
    $this->name=$a;
    $this->id=$b;
    $this->login=$c;
    $this->code=$d;
    $this->type=$e;
   }
   function InsertToBd(){
    require('Connexion.php');
    $req="INSERT INTO UTILISATEUR  VALUES ($this->id,'$this->type',$this->code,'$this->name','$this->login')";
    $con->exec($req);
   }
   function UpdateInBd(){
    require('Connexion.php');
    $reqUP='UPDATE UTILISATEUR SET TYP=?,pass=?,nom=?,login=? WHERE id=?';
    $sta=$con->prepare($reqUP);
      $sta->bindParam(1,$this->type);
      $sta->bindParam(3,$this->name);
      $sta->bindValue(2,$this->code);
      $sta->bindParam(4,$this->login);
      $sta->bindValue(5,$this->id);
      $sta->execute();
   }
   function SuprimerInBd(){
    require('Connexion.php');
    $reqSup='DELETE FROM utilisateur WHERE id=?';
    $stat=$con->prepare($reqSup);
    $stat->bindParam(1,$this->id);
    $stat->execute();
   }

 }
 ?>