<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Registration </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        section{
            margin-top: -20px;
        }
    </style>
</head>
<body>
    <!-- <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">
                    ONLINE LIBRARY MANAGEMENT SYSTEM 
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php"> HOME </a></li>
                <li><a href=""> BOOKS </a></li>
                <li><a href=""> FEEDBACK </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN </span></a></li>
                <li><a href="student_login.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a></li>
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP </span></a></li>
            </ul>
        </div>
    </nav> -->

<!-- </head>
<body>
    <header style="height: 120px">
        <div class="logo">
            <img src="images/9.png" alt=""> 
            <h1 style="color: white ;font-size: 25px; word-spacing: 7px; line-height: 50px; margin-top: 27px;">
                 ONLINE LIBRARY MANAGEMENT SYSTEM 
            </h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html"> HOME </a></li>
                <li><a href=""> BOOKS </a></li>
                <li><a href="student_login.html"> STUDENT-LOGIN </a></li>
                <li><a href="registration.html"> REGISTRATION </a></li>
                <li><a href=""> FEEDBACK </a></li>
            </ul>
        </nav>
    </header> -->
    
    <section>
        <div class="reg_img">
            <div class="box2">
                <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">
                Library Management System  
                </h1>
                <h1 style="text-align: center; font-size: 25px;">
                    User Registration Form
                </h1>
                <form name="Registration" action="" method="post">
                    <div class="login">
                        <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
                        <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
                        <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                        <!-- <input class="form-control" type="text" name="roll" placeholder="Roll No." required=""> <br> -->
                        <input class="form-control" type="email" name="email" placeholder="Email" required> <br>
                        <input class="form-control" type="text" name="contact" placeholder="Phone No." required> <br>
                        <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; 
                        width: 70px; height: 30px;">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php
        if(isset($_POST['submit'])){
            $count=0;
            $sql='SELECT username from `admin`';
            $res=mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res)){
                if($row['username']==$_POST['username']){
                    $count=$count+1;
                }
            }

        if($count==0){
            mysqli_query($db,"INSERT INTO `admin`  VALUES('','$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]',
            '$_POST[email]', '$_POST[contact]', 'user.png', '');");
    ?>
        <script type="text/javascript">
            alert("Registration Successfull");
            window.location="../login.php"
        </script>
    <?php
        }
        else{
    ?>
        <script type="text/javascript">
            alert("The username already exists.");
        </script>
    <?php
        }
    }
    ?>
</body>
</html>