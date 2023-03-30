<?php
//CLASS ETDIANT
class Etudiant{
  private $id;
  private $name;
  private $info;
  private $math;
  public function UpdateToBd()
  {
    require 'Connexion.php';
    $reqUp='UPDATE ETUDIANT SET name=?,info=?,math=? WHERE id=?';
      $stat=$con->prepare($reqUp);
      $stat->bindParam(1,$this->name);
      $stat->bindValue(3,$this->math);
      $stat->bindValue(2,$this->info);
      $stat->bindValue(4,$this->id);
      $stat->execute();
  }
  public function InsertTOBd()
  {
    require 'Connexion.php';
    $req="INSERT INTO ETUDIANT (id,name,info,math) VALUES ($this->id,'$this->name',$this->info,$this->math)";
      $con->exec($req);
  }
function __construct($i,$a,$b,$c)
{
  $this->id=$i;
  $this->name=$a;
  $this->info=$b;
  $this->math=$c;
}
  function __toString()
  {
    return($this->name.' '.$this->info.' '.$this->math);
  }        
  function SetName($n){
    $this->name=$n;
  }
  function SetInfo($i){
    $this->info=$i;
  }
 
  function SetMath($m){
    $this->math=$m;
  }
  function GetName(){
    return $this->name;
  }
  function GetInfo(){
    return $this->info;
  }
  function GetMath(){
    return $this->math;
  }
  function GetId(){
    return $this->id;
  }
  function SetId($nn){
    $this->id=$nn;
  }

 
}

?>