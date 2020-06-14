<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Register Lectuters</title>
    <link rel="stylesheet" href="main.css">
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
                </div>
            </header>
        </div>
    <div class="container">
        
        <form accept-charset="UTF-8" method="post" action="updateInstructer.php">

            <div class="registration-form">
                <h1>Registration Form</h1>
            </div>
            <div class="info">
                <label for="id">Instructer Id: <input type="button" id="searchButton" value="Search" onclick="selectedInstructer()"></label><br>
                <input type="number" id="id" name="id" autofocus required min="1"><br>
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
                <input type="radio" id="female" name="gender" value="female">
                <label for="woman">Female</label><br>
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
                <label for="level"></label>
                    <select id="level" name="level">                           
                        <option value="Masters degree">Masters degree</option>
                        <option value="Doctoral degree">Doctoral degree</option>
                        <option value="Professional degree">Professional degree</option>
                    </select>
            </div>
            <div class="info">
                <div class="active">
                    <label for="active"></label>
                    <select id="active" name="active">                           
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                
            </div>
            <div class="btn">
                <input id="updatebtn" type="submit" value="Update" >
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
        $instructersFirstName=$instructersLastName=$instructersEmail=$instructersPhoneNumber=[];
        $instructersGender=$LOE=$instructersStatus=[];
        $pd= new ProcessingData;
        $pd->loadInstructer();
        $instructersFirstName=$pd->instructersFirstName;
        $instructersLastName=$pd->instructersLastName;
        $instructersEmail=$pd->instructersEmail;
        $instructersPhoneNumber=$pd->instructersPhoneNumber;
        $instructersGender=$pd->instructersGender;
        $LOE=$pd->LOE;
        $instructersStatus=$pd->instructersStatus;
        /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        }*/

    ?>
    <script>
        
        var instructersFirstName = <?php echo json_encode($instructersFirstName); ?>;
        var instructersLastName = <?php echo json_encode($instructersLastName); ?>;
        var instructersEmail = <?php echo json_encode($instructersEmail); ?>;
        var instructersPhoneNumber = <?php echo json_encode($instructersPhoneNumber); ?>;
        
        var instructersGender = <?php echo json_encode($instructersGender); ?>;
        
        var LOE = <?php echo json_encode($LOE); ?>;
        var instructersStatus = <?php echo json_encode($instructersStatus); ?>;
        function selectedInstructer(){
            for(insInfo in instructersFirstName){
                if(insInfo==document.getElementById('id').value){
                    document.getElementById('fname').value=instructersFirstName[insInfo];
                    document.getElementById('lname').value=instructersLastName[insInfo];
                    if(instructersGender[insInfo]=="male"){
                        document.getElementById('male').checked=true;
                        console.log(instructersGender[insInfo]);
                    }
                    else{
                        document.getElementById('female').checked=true;
                    }
                    document.getElementById('eaddress').value=instructersEmail[insInfo];
                    document.getElementById('pnumber').value=instructersPhoneNumber[insInfo];
                    document.getElementById('level').value=LOE[insInfo];
                    document.getElementById('active').value=instructersStatus[insInfo];
                    document.getElementById('id').setAttribute('readonly', 'readonly');
                }
            }
        }
    </script>
    <div class="div-tooltip"></div>
    <script src=toolTip.js></script>
</body>
</html>


