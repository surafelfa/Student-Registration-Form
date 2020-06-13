<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Register Courses</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .nav-link-wrapper a:hover,.nav-link-wrapper a:active,.nav-link-wrapper a[href="course.php"]{
        background-color: rgb(8,115,181);
        color: white;
        }
    </style>
</head>
<body>
    <body>
        <div class="header">
            <header>
                <div class="nav-wrapper">
                    <div class="left-side">
                        <div class=logo>
                            <img src=logo.png>
                        </div>
                    </div>
                    
                        <div class="right-side">
                            <div class="nav-link-wrapper"><a href=index.php>Register Student</a></div>
                            <div class="nav-link-wrapper"><a href="instructer.php">Register Instructer</a></div>
                            <div class="nav-link-wrapper"><a href="course.php">Register Course</a></div>
                        </div>
                    
                </div>
            </header>
        </div>
    <div class="container">

        <form accept-charset="UTF-8" method="post" >


            <div class="registration-form">
                <h1>Registration Form</h1>
            </div>
            <div class="info">
                <label for="name">Course name:</label><br>
                <input type="text" id="name" name="name" autofocus required><br>
            </div>
            <div class="info">
                <label for="code">Course code:</label><br>
                <input type="text" id="code" name="code"required><br>
            </div>
            <div class="info">
                <label for="chr">Credit hours:</label><br>
                <input type="number" id="chr" name="chr"required max="5" min="3"><br>
            </div>
            <div class="info">
                <label for="yr">Year the course is given:</label><br>
                <input type="number" id="yr" name="yr"required max="4" min="1"><br>
            </div>
            <div class="info">
                <label for="tr">Term the course is given:</label><br>
                <input type="number" id="tr" name="tr"required max="3" min="1"><br>
            </div>

           <!-- <div class="instructer">
                <label for="names">Instructed by:</label><br>
                <input id="option2" list="names" name="names" required>
                <datalist id="names" >
                </datalist><br>
            </div>-->
            <div class="info">
                <label for="names">Instructed by:</label><br>
                        <select id="option2" name="names" required>
                        </select>
            </div>
            <div class="btn">
                <input id="submit"type="submit" value="Submit">
                <input id="reset"type="reset">
            </div>
        </form>
        <footer>
            <div class="copy">
                <p>&copy; 2020-2021</p>
            </div>
        </footer>
    </div>
    <?php
        include_once 'main.php';
        $pd= new ProcessingData;
        $lecturersName=$pd->loadInstructers();
        $courseName=$courseCode=$creditHour=$yearTheCourseIsGiven=$termTheCourseIsGiven="";
        $instructedBy=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $courseName = $pd->test_input($_POST["name"]);
            $courseCode = $pd->test_input($_POST["code"]);
            $creditHour = $pd->test_input($_POST["chr"]);
            $yearTheCourseIsGiven = $pd->test_input($_POST["yr"]);
            $termTheCourseIsGiven = $pd->test_input($_POST["tr"]);
            $instructedBy=$_POST["names"];
            //print_r($pd->lecturers) ;
            
            $pd->courseName=$courseName;
            $pd->courseCode=$courseCode;
            $pd->creditHour=$creditHour;
            $pd->yearTheCourseIsGiven=$yearTheCourseIsGiven;
            $pd->termTheCourseIsGiven=$termTheCourseIsGiven;
            $pd->instructedBy=$instructedBy;
            $pd->insertCourse();
        }
    ?>
    <script> 
        var str= '<?php echo $lecturersName ?>'; // variable to store the options
        var my_list=document.getElementById("option2");
        my_list.innerHTML="";
        my_list.innerHTML= str;
    </script>
    
</body>
</html>