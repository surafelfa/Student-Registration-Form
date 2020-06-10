<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Surafel Fantu">
    <title>Registration Form | Welcome</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .nav-link-wrapper a:hover,.nav-link-wrapper a:active,.nav-link-wrapper a[href="index.php"]{
            background-color: rgb(8,115,181);
            color: white;
        }
        .main{
            display: flex;
        }
        @media(max-width: 768px){
            .main{
                display: inline;
            }
        }
    </style>
</head>
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

        <form accept-charset="UTF-8"  method="post" name="index-form">
            

            <div class="registration-form">
                <h1>Registration Form</h1>
            </div>
            <div class="main">
                <div class="left">
                    <div class="info">
                        <label for="fname">First name:</label><br>
                        <input type="text" id="fname" name="fname" autofocus required><br>
                    </div>
                    <div class="info">
                        <label for="lname">Last name:</label><br>
                        <input type="text" id="lname" name="lname"required><br>
                    </div>
                    <div class="info">
                        <label for="eaddress">Email address:</label><br>
                        <input type="email" id="eaddress" name="eaddress"required><br>
                    </div>
                    <div class="info">
                        <label for="pnumber">Phone number:</label><br>
                        <input type="text" id="pnumber" name="pnumber"required><br>
                    </div>

                </div>
                <div class="middle">
                    
                    <div class="year">
                        <label>Year student currently is in:</label><br>
                        <input type="radio" id="first" name="year" value="1" checked onclick="handleClick(this);">
                        <label for="first">First year</label><br>
                        <input type="radio" id="second" name="year" value="2" onclick="handleClick(this);">
                        <label for="second">Second year</label><br>
                        <input type="radio" id="third" name="year" value="3" onclick="handleClick(this);">
                        <label for="third">Third year</label><br>
                        <input type="radio" id="fouth" name="year" value="4" onclick="handleClick(this);">
                        <label for="fourth">Fouth year</label><br>
                    </div>
                </div>
                <div class="right">
                    <div class="term">
                        <label for="option1">Term student currently is in:</label><br>
                        <select id="option1" name="option1" onchange="selectedOption()" required>
                            
                            <option value="1">First Term</option>
                            <option value="2">Second Term</option>
                            <option value="3">Third Term</option>
                        </select>
                    </div>
                    
                    <div class="course" id="course">
                        <label>Courses to be taken:</label><br>
                        <!--<input type="checkbox" id="course1" name="course1" value="Programming One">
                        <label for="course1"> Programming One</label><br>
                        <input type="checkbox" id="course2" name="course2" value="ICT">
                        <label for="course2"> ICT</label><br>
                        <input type="checkbox" id="course3" name="course3" value="Calculus">
                        <label for="course3"> Calculus</label><br>
                        <input type="checkbox" id="course4" name="course4" value="Sophomore">
                        <label for="course4"> Sophomore</label><br>-->
                    </div>
                </div>
                
            <br>
            </div>
            
            <div class="btn">
                <input id="submit"type="submit" value="Submit">
                <input id="reset"type="reset">
            </div>
        </form>
        <footer>
            <div class="copy">
                <p>&copy; 2020-2012</p>
            </div>
        </footer>
        
    </div>
    <?php
        include_once 'main.php';
        $courseName=$years=$terms=[];
        $pd=new ProcessingData;
        $pd->loadCourse();
        $courseName= $pd->courseName;
        $years=$pd->years;
        $terms=$pd->terms; 
        //print_r ($courseName) ;
    ?>
    <script>
        var courseName = <?php echo json_encode($courseName); ?>;
        var years = <?php echo json_encode($years); ?>;
        var terms = <?php echo json_encode($terms); ?>;
        var year=term=1;
        function handleClick(yr) {
            year=yr.value;
            console.log("year "+year);
            if(document.getElementById('option1').value!="" && year>0 ){
                createInnerHTML();
            }
            
        }
        function selectedOption(){
            term=document.getElementById('option1').value;
            console.log(document.getElementById('option1').value);
            if(document.getElementById('option1').value!="" && term>0 ){
                createInnerHTML();
            }
            if(document.getElementById('option1').value==""){
                document.getElementById("course").innerHTML="";
                document.getElementById("course").innerHTML='<label>Courses to be taken:</label><br>';
            }
        }
        function createInnerHTML(){
            document.getElementById("course").innerHTML="";
            document.getElementById("course").innerHTML='<label>Courses to be taken:</label><br>';
            for(cnk in courseName){
                if(years[cnk]==year){
                    for(cnk2 in courseName){
                        if(terms[cnk]==term){
                            var myDiv = document.getElementById("course");
                            var checkbox = document.createElement("input"); 
                            checkbox.setAttribute("type", "checkbox");
                            checkbox.setAttribute("name", cnk);
                            checkbox.setAttribute("value", cnk);
                            //checkbox.checked = true; 
                            myDiv.appendChild(checkbox);
                            var newlabel = document.createElement("Label");
                            newlabel.setAttribute("for",cnk);
                            newlabel.innerHTML = courseName[cnk]+"<br>";
                            myDiv.appendChild(newlabel);
                            break;
                        }
                        
                    }
                        
                }

            }
        }
        createInnerHTML();

    </script>
</body>
</html>