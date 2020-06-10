
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
class ProcessingData{
    public $fname,$lname,$gender,$eaddress,$pnumber,$level,$active=1,$lecturers=[];
    public $courseName,$courseCode,$creditHour,$yearThecourseIsGiven,$termTheCourseIsGiven,$instructedBy;
    public $years=[];
    public $terms=[];
    public function insertInstructer(){
        $db= new Connection;
        $conn = $db->getConnection();
        try{
            $sql = "INSERT INTO lecturer (firstname, lastname,gender,email,phoneNumber,LOE,active)
                    VALUES ('{$this->fname}', '{$this->lname}', '{$this->gender}', 
                            '{$this->eaddress}', '{$this->pnumber}', '{$this->level}', '{$this->active}')";
            $conn->query($sql);
            
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          $conn=null;       
    }
    public function loadInstructers(){
        
        $str="";
        //$db= new Connection;
        //$conn = $db->getConnection();
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        $sql="SELECT id, firstname,lastname FROM lecturer";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            
            $lecturer=array();
            while($row=mysqli_fetch_assoc($result)){
                $lecturer=array($row["id"]=>$row["firstname"]." ".$row["lastname"]);
                $str .= '<option value="'.$row["firstname"]." ".$row["lastname"].'" />';
                $this->lecturers=$this->lecturers+$lecturer;
                //$this->lecturers=array_merge($this->lecturers,$lecturer);             
                
            }
        }
        $conn=null; 
        return $str;
    }
    public function insertCourse(){
        $db= new Connection;
        $conn = $db->getConnection();
        try{
            $sql = "INSERT INTO course (courseName, courseCode,creditHour,yearTheCourseIsGiven,termTheCourseIsGiven,instructerId)
                    VALUES ('{$this->courseName}', '{$this->courseCode}', '{$this->creditHour}','{$this->yearThecourseIsGiven}', 
                    '{$this->termTheCourseIsGiven}', '{$this->instructedBy}')";

            $conn->query($sql);
            
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          $conn=null;       
    }
    public function loadCourse(){
        $this->courseName=[];
        //$db= new Connection;
        //$conn = $db->getConnection();
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        $sql="SELECT id,courseName, yearTheCourseIsGiven,termTheCourseIsGiven FROM course";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){

            while($row=mysqli_fetch_assoc($result)){
                $year=array($row["id"]=>$row["yearTheCourseIsGiven"]);
                $term=array($row["id"]=>$row["termTheCourseIsGiven"]);
                $courseName=array($row["id"]=>$row["courseName"]);
                $this->years = $this->years+$year;
                $this->terms = $this->terms+$term;
                $this->courseName=$this->courseName+$courseName;

                //$str .= '<option value="'.$row["id"].'" >'.$row["courseName"].'" <\\option>';           
                
            }
        }
        $conn=null; 
    }
}
?>