<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Verify email address</title>
    <style type="text/css">
        .box1{
            color: white;
            height: 500px;
            width: 350px;
            /* background-color: rgba(0,0,0,0.5); */
            margin: 0px auto;
            padding-top: 200px;
            opacity: .9;
        }
    </style>
</head>
<body style="background-color: #006956;">
    <div class="box1">
        <h2> Enter the OTP:- </h2>
        <form method="post" action="">
            <input style="width: 300px; height: 50px;" type="text" name="otp" class="form-control"
            required="" placeholder="Enter the OTP here..."><br>
            <button class="btn btn-default" type="submit" name="submit_v" style="font-weight: 700;">
             Verify 
            </button>
        </form>
    </div>
    <?php
    $ver1=0;
    if(isset($_POST['submit_v'])){
        $ver2= mysqli_query($db,"SELECT * FROM verify ;");
        while($row= mysqli_fetch_assoc($ver2)){
            if($_POST['otp']==$row['otp']){
                mysqli_query($db, "UPDATE student set status='1' where username='$row[username]' ;");
                $ver1=$ver1+1;
            }
        }
        if($ver1 == 1){
            header("location:login.php");
        }
        else{
            ?>
                <script type="text/javascript">
                    alert("Wrong OTP given. Try again.");
                </script>
            <?php
        }
    }
    ?>
</body>
</html>