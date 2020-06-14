
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
    public $courseName,$courseCode,$creditHour,$yearTheCourseIsGiven,$termTheCourseIsGiven,$instructedBy;
    public $courseNames=[],$updatedStudentId;
    public $years=[];
    public $terms=[];
    public $selectedCourses=[];
    public $studentsFirstName=[], $studentsLastName=[], $studentsEmail=[],$studentsPhoneNumber=[];
    public $instructersFirstName=[], $instructersLastName=[], $instructersEmail=[],$instructersPhoneNumber=[];
    public $instructersGender=[],$LOE=[],$instructersStatus=[],$updatedInstructerId,$updatedCourseId;
    public $coursesCode=[],$creditHours=[],$instrucresId=[];
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
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
        $sql="SELECT id, firstname,lastname FROM lecturer WHERE active=1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            
            $lecturer=array();
            while($row=mysqli_fetch_assoc($result)){
                $lecturer=array($row["id"]=>$row["firstname"]." ".$row["lastname"]);
                //$str .= '<option value="'.$row["firstname"]." ".$row["lastname"].'" />';

                $str.='<option value="'.$row["id"].'">'.$row["firstname"]." ".$row["lastname"].'</option>';

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
                    VALUES ('{$this->courseName}', '{$this->courseCode}', '{$this->creditHour}','{$this->yearTheCourseIsGiven}', 
                    '{$this->termTheCourseIsGiven}', '{$this->instructedBy}')";

            $conn->query($sql);
            
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          $conn=null;       
    }
    public function loadCourse(){
        $this->courseNames=[];
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        $sql="SELECT id,courseName,courseCode,creditHour, yearTheCourseIsGiven,termTheCourseIsGiven,instructerId FROM course";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){

            while($row=mysqli_fetch_assoc($result)){
                $courseCode=array($row["id"]=>$row["courseCode"]);
                $creditHour=array($row["id"]=>$row["creditHour"]);
                $year=array($row["id"]=>$row["yearTheCourseIsGiven"]);
                $term=array($row["id"]=>$row["termTheCourseIsGiven"]);
                $courseName=array($row["id"]=>$row["courseName"]);
                $instructerId=array($row["id"]=>$row["instructerId"]);
                $this->coursesCode=$this->coursesCode+$courseCode;
                $this->creditHours=$this->creditHours+$creditHour;
                $this->years = $this->years+$year;
                $this->terms = $this->terms+$term;
                $this->courseNames=$this->courseNames+$courseName;
                $this->instrucresId=$this->instrucresId+$instructerId;
            }
        }
        $conn=null; 
    }
    public function insertStudent(){
        $db= new Connection;
        $conn = $db->getConnection();
        try{
            $sql = "INSERT INTO student (firstName, lastName,email,phoneNumber)
                    VALUES ('{$this->fname}', '{$this->lname}', '{$this->eaddress}','{$this->pnumber}')";

            $conn->query($sql);
            
            $last_id = $conn->lastInsertId();

                foreach($this->selectedCourses as $courseId){
                        $sql = "INSERT INTO studentdetail (studentId, courseId,yearStudentCurrentlyIsIn,termStudentCurrentlyIsIn)
                                VALUES ('{$last_id}', '{$courseId}', '{$this->yearTheCourseIsGiven}','{$this->termTheCourseIsGiven}')";
                        $conn->query($sql);
            

                }
            
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          $conn=null;       
    }
    public function loadStudent(){
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        $sql="SELECT id,firstName, lastName,email,phoneNumber FROM student";
        $student = mysqli_query($conn, $sql);
        /*$sql="SELECT studentId,courseId,yearStudentCurrentlyIsIn,termStudentCurrentlyIsIn,courseName
              FROM studentdetail INNER JOIN course ON studentdetail.courseId=course.id";
        $studentDetail = mysqli_query($conn, $sql);*/
        if(mysqli_num_rows($student) > 0 ){

            while($row=mysqli_fetch_assoc($student)){
                $studentFirstName=array($row["id"]=>$row["firstName"]);
                $studentLastName=array($row["id"]=>$row["lastName"]);
                $studentEmail=array($row["id"]=>$row["email"]);
                $studentPhoneNumber=array($row["id"]=>$row["phoneNumber"]);
                $this->studentsFirstName=$this->studentsFirstName+$studentFirstName;
                $this->studentsLastName=$this->studentsLastName+$studentLastName;
                $this->studentsEmail=$this->studentsEmail+$studentEmail;
                $this->studentsPhoneNumber=$this->studentsPhoneNumber+$studentPhoneNumber;
            }
            /*
            while($row=mysqli_fetch_assoc($studentDetail)){
                $year=array($row["studentId"]=>$row["yearStudentCurrentlyIsIn"]);
                $term=array($row["studentId"]=>$row["termStudentCurrentlyIsIn"]);
                $beingTakenCourse=array($row["courseId"]=>$row["studentId"]);
                $courseName=array($row["courseId"]=>$row["courseName"]);
                $this->selectedYears = $this->selectedYears+$year;
                $this->selectedTerms = $this->selectedTerms+$term;
                $this->beingTakenCourses=$this->beingTakenCourses+$beingTakenCourse;
                $this->previouslySelectedCoursesName=$this->previouslySelectedCoursesName+$courseName;                          
            }*/
            
        }
        $conn=null; 
    }
    function updateStudent(){
        $db= new Connection;
        $conn = $db->getConnection();
        try{
            $sql = "UPDATE student
                    SET firstName='$this->fname', lastName='$this->lname', email='$this->eaddress',phoneNumber = '$this->pnumber'
                    WHERE id='$this->updatedStudentId'";

            $conn->query($sql);
            $sql="DELETE FROM studentdetail WHERE studentId=$this->updatedStudentId";
            $conn->query($sql);
            foreach($this->selectedCourses as $courseId){
                $sql = "INSERT INTO studentdetail (studentId, courseId,yearStudentCurrentlyIsIn,termStudentCurrentlyIsIn)
                VALUES ('{$this->updatedStudentId}', '{$courseId}', '{$this->yearTheCourseIsGiven}','{$this->termTheCourseIsGiven}')";
                $conn->query($sql);
            }          
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          $conn=null;       
    }
    public function loadInstructer(){
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        $sql="SELECT id,firstName,lastName,gender,email,phoneNumber,LOE,active FROM lecturer";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){

            while($row=mysqli_fetch_assoc($result)){
                $instructerFirstName=array($row["id"]=>$row["firstName"]);
                $instructerLastName=array($row["id"]=>$row["lastName"]);
                $instructerGender=array($row["id"]=>$row["gender"]);
                $instructerEmail=array($row["id"]=>$row["email"]);
                $instructerPhoneNumber=array($row["id"]=>$row["phoneNumber"]);
                $LOE=array($row["id"]=>$row["LOE"]);
                $instructerStatus=array($row["id"]=>$row["active"]);
                $this->instructersFirstName=$this->instructersFirstName+$instructerFirstName;
                $this->instructersLastName=$this->instructersLastName+$instructerLastName;
                $this->instructersGender=$this->instructersGender+$instructerGender;
                $this->instructersEmail=$this->instructersEmail+$instructerEmail;
                $this->instructersPhoneNumber=$this->instructersPhoneNumber+$instructerPhoneNumber;
                $this->LOE=$this->LOE+$LOE;
                $this->instructersStatus=$this->instructersStatus+$instructerStatus;
            }
        }
        $conn=null; 
    }
    function updateCourse(){
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        $updatedCourseId=$this->updatedCourseId;
        $sql= "SELECT c.id FROM course c INNER JOIN studentdetail sd ON c.id= sd.courseId WHERE sd.courseId=$updatedCourseId";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0 ){
            //do not update
        }
        else{
           $name=$this->courseName;
           $code=$this->courseCode;
           $crhr=$this->creditHour;
           $YCG=$this->yearTheCourseIsGiven;
           $TCG=$this->termTheCourseIsGiven;
           $instructedBy=$this->instructedBy;
           $sql = "UPDATE course
                    SET courseName='$name', courseCode='$code',creditHour='$crhr',
                        yearTheCourseIsGiven='$YCG',termTheCourseIsGiven = '$TCG',instructerId='$instructedBy'
                    WHERE id='$updatedCourseId'";
            mysqli_query($conn, $sql);
        }
          $conn=null;   
    }    
}
?>