
<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $database = "basiks";
    private $user = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
  
        return $this->conn;
    }
}
?>