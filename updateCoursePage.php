<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Register Courses</title>
    <link rel="stylesheet" href="main.css">
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
                </div>
            </header>
        </div>
    <div class="container">

        <form accept-charset="UTF-8" method="post" action="updateCourse.php">


            <div class="registration-form">
                <h1>Registration Form</h1>
            </div>
            <div class="info">
                <label for="id">Course id: <input type="button" id="searchButton" value="Search" onclick="selectedCourse()"></label><br>
                <input type="number" id="id" name="id" autofocus required min="1"><br>
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
            <div class="info">
                <label for="names">Instructed by:</label><br>
                        <select id="option2" name="names" required>
                        </select>
            </div>
            <div class="btn">
                    <input id="update"type="submit" value="Update" >
                    <input id="delete"type="submit" value="Delete" formaction="deleteCourse.php">
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
        $pd->loadCourse();
        $coursesCode=$pd->coursesCode;
        $creditHours=$pd->creditHours;
        $years=$pd->years;
        $terms=$pd->terms;
        $courseNames=$pd->courseNames;
        $instructersId=$pd->instrucresId;
        $lecturersName=$pd->loadInstructers();
        
    ?>
    <script> 
        var str= '<?php echo $lecturersName ?>'; // variable to store the options
        var my_list=document.getElementById("option2");
        my_list.innerHTML="";
        my_list.innerHTML= str;

        var courseNames = <?php echo json_encode($courseNames); ?>;
        var coursesCode = <?php echo json_encode($coursesCode); ?>;
        var creditHours = <?php echo json_encode($creditHours); ?>;
        var years= <?php echo json_encode($years); ?>;
        var terms = <?php echo json_encode($terms); ?>;
        var instructersId = <?php echo json_encode($instructersId); ?>;

        function selectedCourse(){
            for(courseInfo in courseNames){
                if(courseInfo==document.getElementById('id').value){
                    document.getElementById('name').value=courseNames[courseInfo];
                    document.getElementById('code').value=coursesCode[courseInfo];
                    document.getElementById('chr').value=creditHours[courseInfo];
                    document.getElementById('yr').value=years[courseInfo];
                    document.getElementById('tr').value=terms[courseInfo];
                    document.getElementById('option2').value=instructersId[courseInfo];
                    document.getElementById('id').setAttribute('readonly', 'readonly');
                }
            }
        }
    </script>
    <div class="div-tooltip"></div>
    <script src=toolTipForCourse.js></script>
</body>
</html>