<?php
// CLASS D'ETUDIANR
class Connexion{
    public $db_username; 
    public $db_password ;
    public $db;
    //public static $conn;
    public static $i=NULL;
    function __construct($a,$b,$c){
     $this->db_username=$b;
     $this->db=$a;
     $this->db_password=$c;
     if(self::$i==NULL){
      self::$i = new PDO($this->db,$this->db_username,$this->db_password);
      self::$i->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
      self::$i->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
     return (self::$i);
   }  

   }
   try{
    //Connexion Avec Oracle
    $a=new connexion("oci:dbname=XE","XE",1234);
    $con=$a::$i;
    }catch(PDOException $e)
    {
      echo ' Error !!'.$e->getMessage().' '.$e->getCode();
      exit;
    } 
    ?>
   