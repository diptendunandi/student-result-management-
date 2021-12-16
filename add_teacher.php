<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Teacher</title>
</head>
<body>
        
    <div class="title">
        <!-- <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a> -->
        <span class="heading">Graphic Era Result Management System</span>
        <!-- <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a> -->
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="#">Manage Results &nbsp
                            <span class="fa fa-angle-down"></span>
                    </a>                            
                            <div class="dropdown-content" id="4">
                                <a href="delete_result.php">&nbsp &nbsp &nbsp Delete Result</a>
                                <a href="update_result.php">&nbsp &nbsp &nbsp Update Result</a>
                            </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <!-- <fieldset> -->
                <legend>Add Teacher</legend>
                <input type="text" name="userid" placeholder="Teacher Name">
                <input type="password" name="password" placeholder="password">
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        // echo '<select name="class_name">';
                        // echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        // $display=$row['name'];
                        // echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Submit">
            <!-- </fieldset> -->
        </form>
    </div>

    <!-- <div class="footer">
         <span>&copy Designed & Coded By Jibin Thomas</span> 
    </div> -->
    <hr>
    <div class="footer">
        <a href="logout.php" style="color: red"><img src="https://img.icons8.com/ios/20/000000/exit.png"/>Logout</span></a>
    </div>
</body>
</html>

<?php

    if(isset($_POST['userid'],$_POST['password'])) {
        $name=$_POST['userid'];
        $rno=$_POST['password'];
        // if(!isset($_POST['class_name']))
        //     $class_name=null;
        // else
        //     $class_name=$_POST['class_name'];

        // validation
        if (empty($name) or empty($rno) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter userid</p>';
            // if(empty($class_name))
            //     echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your password</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid password (Numeric)</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in userid</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `admin_login` (`userid`, `password`) VALUES ('$name', '$rno')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }

    }
?>