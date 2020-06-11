<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Register Lectuters</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .nav-link-wrapper a:hover,.nav-link-wrapper a:active,.nav-link-wrapper a[href="instructer.php"]{
        background-color: rgb(8,115,181);
        color: white;
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
        
        <form accept-charset="UTF-8" method="post" name="instructer-form">

            <div class="registration-form">
                <h1>Registration Form</h1>
            </div>
            <div class="info">
                <label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname" autofocus required><br>
            </div>
            <div class="info">
                <label for="lname">Last name:</label><br>
                <input type="text" id="lname" name="lname"required><br>
            </div>
            <div class="year">
                <label>Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" checked>
                <label for="male">Male</label><br>
                <input type="radio" id="woman" name="gender" value="woman">
                <label for="woman">Woman</label><br>
            </div>
            <div class="info">
                <label for="eaddress">Email address:</label><br>
                <input type="email" id="eaddress" name="eaddress"required><br>
            </div>
            <div class="info">
                <label for="pnumber">Phone number:</label><br>
                <input type="text" id="pnumber" name="pnumber"required><br>
            </div>
            <div class="info">
                <label for="level">Level of education:</label><br>
                <input type="text" id="level" name="level"required><br>
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
        include 'main.php';
        $fname = $lname=$gender=$eaddress = $pnumber=$level= "";
        $pd= new ProcessingData;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $pd->test_input($_POST["fname"]);
            $lname = $pd->test_input($_POST["lname"]);
            $gender = $pd->test_input($_POST["gender"]);
            $eaddress = $pd->test_input($_POST["eaddress"]);
            if (!filter_var($eaddress, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
            $pnumber = $pd->test_input($_POST["pnumber"]);
            $level = $pd->test_input($_POST["level"]);
            
            $pd->fname=$fname;
            $pd->lname=$lname;
            $pd->gender=$gender;
            $pd->eaddress=$eaddress;
            $pd->pnumber=$pnumber;
            $pd->level=$level;
            $pd->insertInstructer();
        }

    ?>
    
</body>
</html>


