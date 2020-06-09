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

        <form accept-charset="UTF-8" action="index.php" method="post" name="main-form">


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
                <input type="number" id="chr" name="chr"required max="5"><br>
            </div>
            <div class="info">
                <label for="yr">Year the course is given:</label><br>
                <input type="number" id="yr" name="yr"required max="4"><br>
            </div>
            <div class="info">
                <label for="tr">Term the course is given:</label><br>
                <input type="number" id="tr" name="term"required max="3"><br>
            </div>

            <div class="instracter">
                <label>Instructed by:</label><br>
                <input id="option" list="term">
                <datalist id="term">
                    <option value="Abera">
                    <option value="Alemu">
                    <option value="Kebede">
                </datalist><br>
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