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
    <title> Student Registration </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        section{
            margin-top: -20px; 
            height: 93vh;
            width: 1536px;
            background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.9)), url('images/S5.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .box{
            color: white;
            height: 400px;
            width: 450px;
            background-color: rgba(0,0,0,0.5);
            margin: 0px auto;
            padding: 20px;
            padding-top: 150px;
            opacity: .9;
        }
        label{
            font-weight: 600;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <section>
        <br><br><br><br><br>
        <div class="box">
            <form name="signup" action="" method="post">
                <b><p style="padding-left: 50px; font-size: 15px; font-weight: 700px;"> Sign Up as: </p></b>
                <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
                <label for="admin"> Admin </label>
                <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student"checked="">
                <label for="student"> Student </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                <button class="btn btn-default" type="submit" name="submit1" style="color: black; font-weight: 700;
                width: 70px; height: 30px;">
                Ok 
                </button>
            </form>
        </div>
        <?php
        if(isset($_POST['submit1'])){
            if($_POST['user']=='admin'){
                ?>
                    <script type="text/javascript">
                        window.location="admin/registration.php"
                    </script>
                <?php
            }
            else{
                ?>
                    <script type="text/javascript">
                        window.location="student/registration.php"
                    </script>
                <?php
            }
        }
        ?>
    </section>
</body>
</html>