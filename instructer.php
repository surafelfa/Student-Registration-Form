<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Register Lectuters</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="instructer.css">
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
                            <div class="nav-link-wrapper"><a href=index.html>Register Student</a></div>
                            <div class="nav-link-wrapper"><a href="instructer.html">Register Instructer</a></div>
                            <div class="nav-link-wrapper"><a href="course.html">Register Course</a></div>
                        </div>
                    
                </div>
            </header>
        </div>
    <div class="container">
        
        <form accept-charset="UTF-8" method="post" name="main-form">

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
                <p>&copy; 2020-2012</p>
            </div>
        </footer>
    </div>
    <?php
        include_once 'connection.php';
        $fname = $lname=$gender=$eaddress = $pnumber=$level= "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $gender = test_input($_POST["gender"]);
            $eaddress = test_input($_POST["eaddress"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
            $pnumber = test_input($_POST["pnumber"]);
            $level = test_input($_POST["level"]);
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $cl= new Lecturer;
        $cl->fname=$fname;
        $cl->lname=$lname;
        $cl->gender=$gender;
        $cl->eaddress=$eaddress;
        $cl->pnumber=$pnumber;
        $cl->level=$level;
        $cl->insert();

    ?>
    
</body>
</html>


