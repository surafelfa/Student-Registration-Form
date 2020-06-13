<?php
    include_once 'main.php';
        $pd= new ProcessingData;
        $conn = mysqli_connect("localhost", "root", "", "studentregistrationform");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pd->updatedInstructerId=$_POST["id"];
            $pd->fname = $pd->test_input($_POST["fname"]);
            $pd->lname = $pd->test_input($_POST["lname"]);
            $pd->eaddress = $pd->test_input($_POST["eaddress"]);
            $pd->pnumber = $pd->test_input($_POST["pnumber"]);
            $pd->gender = $_POST["gender"];
            $pd->level= $_POST["level"];
            $pd->active=$_POST["active"];
            $sql= "SELECT c.id FROM course c INNER JOIN lecturer l ON c.instructerId= l.id WHERE c.instructerId= $pd->updatedInstructerId";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0 ){
                $sql = "UPDATE lecturer
                        SET firstName='$pd->fname', lastName='$pd->lname',gender='$pd->gender',
                            email='$pd->eaddress',phoneNumber = '$pd->pnumber',LOE='$pd->level'
                        WHERE id='$pd->updatedInstructerId'";
                if(mysqli_query($conn,$sql)){
                    echo "Instructer's information updated successfully";
                    header("refresh:2; url=instructer.php");
                }
            }
            else{
                $sql = "UPDATE lecturer
                        SET firstName='$pd->fname', lastName='$pd->lname',gender='$pd->gender',
                            email='$pd->eaddress',phoneNumber = '$pd->pnumber',LOE='$pd->level',
                            active='$pd->active'
                        WHERE id='$pd->updatedInstructerId'";
                if(mysqli_query($conn,$sql)){
                    echo "Instructer's information updated successfully";
                    header("refresh:2; url=instructer.php");
                }
            }
        }
        else{
            echo "Error deleting record:  ".$this->conn->error;
        }      
        $conn=null;
        
?>