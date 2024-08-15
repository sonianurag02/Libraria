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
    <title> Change Password </title>

    <style type="text/css">
        body{
            width: 100%;
            height: 650px;
            /* background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.9)), url('../student/images/L2.jpg'); */
            background-image: url('../student/images/L2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .wrapper{
            width: 400px;
            height: 400px;
            background-color:black;
            margin: 100px auto;
            opacity: .7;
            color: white;
            padding: 10px;
        }
        .form-control{
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div style="text-align: center;">
            <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">
                Library Management <br> System  
            </h1>
            <h1 style="text-align: center; font-size: 20px; font-family: Lucida Console;">
                Change Your Password  
            </h1>
        </div>
        <div style="padding-left: 37px;">
            <form action="" method="post">
                <input type="text" name="username" class="form-control" placeholder="Username" required=""> <br>
                <input type="text" name="email" class="form-control" placeholder="Email" required=""> <br>
                <input type="text" name="password" class="form-control" placeholder="New Password" required=""> <br>
                <button class="btn btn-default" type="submit" name="submit"> Update </button>
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
            if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;")){
                ?>
                    <script type="text/javascript">
                        alert("The Password Updated Successfully.");
                    </script>
                <?php
            }
        }
    ?>
</body>
</html>

<!-- part-24 completed -->