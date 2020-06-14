<?php
    include_once 'main.php';
    $pd=new ProcessingData;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fname = $pd->test_input($_POST["fname"]);
        $lname = $pd->test_input($_POST["lname"]);
        $eaddress = $pd->test_input($_POST["eaddress"]);
        if (!filter_var($eaddress, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        $pnumber = $pd->test_input($_POST["pnumber"]);
        $yearTheCourseIsGiven = $_POST["year"];
        $termTheCourseIsGiven= $_POST["option1"];
        $selectedCourses=$_POST["course"];
        $pd->updatedStudentId=$_POST["id"];
        $pd->fname=$fname;
        $pd->lname=$lname;
        $pd->eaddress=$eaddress;
        $pd->pnumber=$pnumber;
        $pd->selectedCourses=$selectedCourses;
        $pd->yearTheCourseIsGiven=$yearTheCourseIsGiven;
        $pd->termTheCourseIsGiven=$termTheCourseIsGiven;
        $pd->updateStudent();
        echo "Student's information updated successfully";
        header("refresh:2; url=index.php"); 
    }

?>