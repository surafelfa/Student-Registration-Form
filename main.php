<?php
class Connection{
    
    public function getConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
        $conn = new PDO("mysql:host=$servername;dbname=studentregistrationform", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
}
class Lecturer{
    public $fname,$lname,$gender,$eaddress,$pnumber,$level,$active=1;
    public function insert(){
        $db= new Connection;
        $conn = $db->getConnection();
        try{
            $sql = "INSERT INTO lecturer (firstname, lastname,gender,email,phoneNumber,LOE,active)
                    VALUES ('{$this->fname}', '{$this->lname}', '{$this->gender}', 
                            '{$this->eaddress}', '{$this->pnumber}', '{$this->level}', '{$this->active}')";
          // use exec() because no results are returned
            $conn->query($sql);
            
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          $conn=null;       
    }
}
?>