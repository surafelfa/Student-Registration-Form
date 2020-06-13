<?php
    include_once 'main.php';
        $pd= new ProcessingData;
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pd->updatedStudentId=$_POST["id"];
        }
        $sql="DELETE FROM studentdetail WHERE studentId=$pd->updatedStudentId";
           // $conn->query($sql);
        if(mysqli_query($conn,$sql)){
            $sql="DELETE FROM student WHERE id=$pd->updatedStudentId";
            //$conn->query($sql);
            if(mysqli_query($conn,$sql)){
                echo "Student's information deleted successfully";
                header("refresh:2; url=index.php"); 
            }
        }
        else{
            echo "Error deleting record:  ".$this->conn->error;
        }      
        $conn=null;
        
?>