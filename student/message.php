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
    <title>Message</title>

    <style type="text/css">
        body{
            background-image: url('../student/images/M2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;    
            position: relative;
        }
        .wrapper{
            height: 689px;
            width: 500px;
            background-color: black;
            opacity: 0.9;
            color: white;
            margin: -20px auto;
            padding: 10px;
        }
        .form-control{
            height: 47px;
            width: 76%;
        }
        .msg{
            height: 540px;
            overflow-y: scroll;
        }
        .btn-info{
            background-color: #239797;
        }
        .chat{
            display: flex;
            flex-flow: row wrap;
        }
        .user .chatbox{
            height: 60px;
            width: 390px;
            padding: 15px 10px;
            background-color: #940972;
            color: white;
            border-radius: 10px;
            order: -1;
        }
        .admin .chatbox{
            height: 60px;
            width: 390px;
            padding: 15px 10px;
            background-color: #690994;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            mysqli_query($db,"INSERT into `library`.`message` VALUES ('', '$_SESSION[login_user]', '$_POST[message]', 'no', 'student');");

            $res= mysqli_query($db,"SELECT * from `message` where username='$_SESSION[login_user]' ;");
        }
        else{
            $res= mysqli_query($db,"SELECT * from `message` where username='$_SESSION[login_user]' ;");
        }
        mysqli_query($db," UPDATE message set status='yes' where sender='admin' and username='$_SESSION[login_user]' ;");
    ?>

    <div class="wrapper">
        <div style="height: 70px; width: 100%; background-color: #239797; text-align: center; color: white;">
            <h3 style="margin-top: -5px; padding-top: 15px;"> Admin </h3>
        </div>
        <div class="msg">
            <?php
                while($row= mysqli_fetch_assoc($res)){
                    if($row['sender']=='student'){
            ?>
            <!---------------------------------------- STUDENT --------------------------------------------->
            <br><div class="chat user">
                <div style="float: left; padding: 5px;"> &nbsp;
                    <?php
                        echo "<img class='img-circle profile_img' height=40 width=40 src='images/". $_SESSION['pic']."'>";

                        // echo " ".$_SESSION['login_user'];
                    ?> &nbsp;
                </div>
                <div style="float: left;" class="chatbox">
                    <?php
                        echo $row['message'];
                    ?>
                </div>
            </div>
                <?php
                    } // If bracket Ends
                    else{ 
                ?>
            <!---------------------------------------- ADMIN ------------------------------------------------>
            <br><div class="chat admin">
                <div style="float: left; padding: 5px;"> 
                    &nbsp;
                    <img style="height: 40px; width: 40px; border-radius: 50%;" src="../student/images/user.png" alt="">
                    &nbsp;
                </div>
                <div style="float: left;" class="chatbox">
                    <?php
                        echo $row['message'];
                    ?>
                </div>
            </div>
            <?php
                    } // Else Bracket Ends
                } // While Bracket Ends
            ?>
        </div>
        <div style="height: 100px; padding-top: 10px;">
            <form action="" method="post">
                <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left;"> &nbsp;
                <button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span>&nbsp; Send </button>
            </form>
        </div>
    </div>
</body>
</html>