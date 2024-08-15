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
    <title> Edit Profile</title>
    <style type="text/css">
        .form-control{
            width: 250px;
            height: 38px;
        }
        form{
            padding-left: 640px;
        }
        label{
            color: white;
        }
    </style>
</head>
<body style="background-color: #21091c; ">

    <h2 style="text-align: center; color: #fff;"> Edit Information</h2>
    <?php
        $sql= "SELECT * FROM student where username='$_SESSION[login_user]' ";
        $result= mysqli_query($db,$sql) or die (mysql_error());

        while($row = mysqli_fetch_assoc($result)){
            $first= $row['first'];
            $last= $row['last'];
            $username= $row['username'];
            $password= $row['password'];
            $email= $row['email'];
            $contact= $row['contact'];
        }
    ?>

    <div class="profile_info" style="text-align: center;">
        <span style="color: white;"> Welcome, </span>
        <h4 style="color: white;"><b><?php echo $_SESSION['login_user']; ?></b></h4>
    </div><br>

    <div class="form1">
        <form action="" method="post" enctype="multipart/form-data">

            <input class="form-control" type="file" name="file">

            <label><h5><b> First Name: </b></h5></label>
            <input class="form-control" type="text" name="first" value="<?php echo $first; ?>">
            <label><h5><b> Last Name: </b></h5></label>
            <input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
            <label><h5><b> Username: </b></h5></label>
            <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
            <label><h5><b> Password: </b></h5></label>
            <input class="form-control" type="text" name="password" value="<?php echo $password; ?>">
            <label><h5><b> Email: </b></h5></label>
            <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
            <label><h5><b> Contact No.: </b></h5></label>
            <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>"><br>
            <div style="padding-left: 100px;"> 
                <button class="btn btn-default" type="submit" name="submit" > save </button> 
            </div>
        </form>
    </div>
    <?php

        if(isset($_POST['submit'])){

            move_uploaded_file($_FILES['file']['tmp_name'], "images/".$_FILES['file']['name']);
            
            $first= $_POST['first'];
            $last= $_POST['last'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $email= $_POST['email'];
            $contact= $_POST['contact'];
            $pic= $_FILES['file']['name'];

            // $sql1= "UPDATE admin SET pic='$pic' first='$first', last='$last', username='$username', password='$password', 
            // email='$email' contact='$contact' WHERE username='".$_SESSION['login_user']."'; ";
            // UPDATE `admin` SET `pic`='user.png',`first`='Harry',`last`='potter',`username`='harry',`password`='harry',
            // `email`='harryp@gmail.com',`contact`='0123456789'

            $sql1= "UPDATE `student` SET `pic`='$pic',`first`='$first',`last`='$last',`username`='$username',
            `password`='$password',`email`='$email',`contact`='$contact' WHERE username='".$_SESSION['login_user']."'; ";

            if(mysqli_query($db,$sql1)){
                ?>
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        window.location="profile.php";
                    </script>
                <?php
            }
        }

    ?>
</body>
</html>