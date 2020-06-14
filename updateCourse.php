<?php
    include_once 'main.php';
    $pd= new ProcessingData;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pd->updatedCourseId=$pd->test_input($_POST["id"]);
        $pd->courseName = $pd->test_input($_POST["name"]);
        $pd->courseCode = $pd->test_input($_POST["code"]);
        $pd->creditHour = $pd->test_input($_POST["chr"]);
        $pd->yearTheCourseIsGiven = $pd->test_input($_POST["yr"]);
        $pd->termTheCourseIsGiven = $pd->test_input($_POST["tr"]);
        $pd->instructedBy=$_POST["names"];

        $pd->updateCourse();

        echo "Course's information updated successfully";
        header("refresh:2; url=course.php"); 
    }
?>