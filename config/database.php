<?php
class Database{
   // Database instellingen
   private $host = "localhost";
   private $db_name = "profanity";
   private $username = "root";
   private $password = "";
   public $conn;

   public function __construct(){
      $this->getConnection();
   }
   
   public function getConnection(){
      $this->conn = null;
      try{
         $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
      }
      catch(Exception $e)
      {
         echo "Fout tijdens verbinden: " . $e->getMessage();
      }
      return $this->conn;
   }
}