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

        <form accept-charset="UTF-8" action="index.php" method="post" name="main-form">
            

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
                        <input type="radio" id="first" name="year" value="First year">
                        <label for="first">First year</label><br>
                        <input type="radio" id="second" name="year" value="Second year">
                        <label for="second">Second year</label><br>
                        <input type="radio" id="third" name="year" value="Third year">
                        <label for="third">Third year</label><br>
                        <input type="radio" id="fouth" name="year" value="Fouth year">
                        <label for="fourth">Fouth year</label><br>
                    </div>
                </div>
                <div class="right">
                    <div class="term">
                        <label>Term student currently is in:</label><br>
                        <input id="option" list="term">
                        <datalist id="term">
                            <option value="First Term">
                            <option value="Second Term">
                            <option value="Third Term">
                        </datalist><br>
                    </div>
                    
                    <div class="course">
                        <label>Courses to be taken:</label><br>
                        <input type="checkbox" id="course1" name="course1" value="Programming One">
                        <label for="course1"> Programming One</label><br>
                        <input type="checkbox" id="course2" name="course2" value="ICT">
                        <label for="course2"> ICT</label><br>
                        <input type="checkbox" id="course3" name="course3" value="Calculus">
                        <label for="course3"> Calculus</label><br>
                        <input type="checkbox" id="course4" name="course4" value="Sophomore">
                        <label for="course4"> Sophomore</label><br>
                    </div>
                </div>
                

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
    
</body>
</html>