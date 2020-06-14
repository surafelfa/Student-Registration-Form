<?php
    include_once 'main.php';
        //$pd= new ProcessingData;
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $updatedCourseId=$_POST["id"];
            $sql= "SELECT c.id FROM course c INNER JOIN studentdetail sd ON c.id= sd.courseId WHERE sd.courseId=$updatedCourseId";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0 ){
                echo "course information can not be deleted!!!";
                header("refresh:2; url=course.php");
            }
            else{
                $sql = "DELETE FROM course WHERE id=$updatedCourseId";
                if(mysqli_query($conn,$sql)){
                    echo "course's information deleted successfully";
                    header("refresh:2; url=course.php");
                }
            }
        }
        else{
            echo "Error deleting record:  ".$this->conn->error;
        }      
        $conn=null;
        
?>