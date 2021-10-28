<?php
class Words
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "profanity";
   // object properties
   public $id;
   public $word;
   public $grace;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   function read()
   {
       // select all query
       $query = "SELECT * FROM " . $this->table_name;
       $result = $this->conn->query($query);
       return $result;
   }
   function create(){
    // select all query
   $query = "UPDATE * FROM " . $this->table_name;
   $result = $this->conn->query($query);
   return $result;
   echo $result;
}
function update(){
    // select all query
   $query = "UPDATE * FROM " . $this->table_name;
   $result = $this->conn->query($query);
   return $result;
   echo $result;
}
function delete(){
    // select all query
   $query = "DELETE * FROM " . $this->table_name;
   $result = $this->conn->query($query);
   return $result;
   echo $result;
}
}