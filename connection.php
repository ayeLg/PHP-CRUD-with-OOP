<?php

// $host = 'localhost';
// $dbname  = 'exercises';
// $db_user = "root";
// $db_pass = "password";


// $db_option = [
//   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
//   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
// ];

// function openConnection() {
//   global $host;
//   global $dbname;
//   global $db_user;
//   global $db_pass;
//   global $db_option;

//   try{
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_user, $db_pass,$db_option);

//     // var_dump($conn);
//     return $conn;
//   }
//   catch (Exception $ex) {
//     echo $ex->getMessage();
//   }

// }

// // openConnection();

class Conneciton {
  private $host = 'localhost';
  private $dbname  = 'exercises';
  private $db_user = "root";
  private $db_pass = "password";

  private $db_option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
  ];

  public $conn;

  public function getCon() {
    try{
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->db_user, $this->db_pass,$this->db_option);

    
    }
    catch (Exception $ex) {
      $this->conn = $ex->getMessage();
    }
  }
}
$db_con = new Conneciton();
$db_con->getCon();
