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
    <title>Messages</title>
    <style type="text/css">
        .left_box{
            height: 690px;
            width: 500px;
            float: left;
            background-color: #8ecdd2;
            margin-top: -20px;
        }
        .left_box2{
            height: 690px;
            width: 350px;
            background-color: #537890;
            border-radius: 20px;
            float: right;
        }
        .left_box input{
            width: 150px;
            height: 50px;
            background-color: #537890;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        }
        .list{
            height: 600px;
            width: 350px;
            background-color: #537890;
            float: right;
            color: white;
            padding: 10px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .right_box{
            height: 690px;
            width: 1050px;
            background-color: #8ecdd2;
            margin-left: 486px;
            margin-top: -20px;
            padding: 10px;
        }
        .right_box2{
            height: 690px;
            width: 850px;
            margin-top: -20px;
            margin-left: 20px;
            padding: 20px;
            border-radius: 20px;
            background-color: #537890;
            float: left;
            color: white;
        }
        tr:hover{
            background-color: #1e3f54;
            cursor: pointer;
        }
        .form-control{
            height: 47px;
            width: 78%;
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
            width: 700px;
            padding: 15px 10px;
            background-color: #940972;
            color: white;
            border-radius: 10px;
        }
        .admin .chatbox{
            height: 60px;
            width: 700px;
            padding: 15px 10px;
            background-color: #690994;
            color: white;
            border-radius: 10px;
            order: -1;
        }
    </style>
</head>
<body style="width: 1536px; height: 595px;">
<?php
    $sql1= mysqli_query($db,"SELECT student.pic,message.username FROM student INNER JOIN message 
    ON student.username=message.username GROUP BY username ;"); // ORDER BY status
?>
<!------------------------------------ LEFT BOX ----------------------------------->
<div class="left_box">
    <div class="left_box2">
        <div style="color: #fff">
            <form method="post" enctype="multipart/form-data" action="">
                <input type="text" name="username" id="uname">
                <button type="submit" name="submit" class="btn btn-default">SHOW</button>
            </form>
        </div>
        <div class="list">
            <?php
                echo "<table id='table' class='table'> ";
                while($res1= mysqli_fetch_assoc($sql1)){
                    echo "<tr>"; 
                        echo "<td width=65>"; 
                            echo "<img class='img-circle profile_img' height=60 width=60 src='../admin/images/user.png'>"; //'../admin/images/".$res1['pic']."'
                        echo "</td>";
                        echo "<td style='padding-top: 30px;'>"; echo $res1['username']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>
    </div>
</div>
<!------------------------------------ RIGHT BOX ---------------------------------->
<div class="right_box">
    <div class="right_box2"> 
        <?php
            /*---------------------- If submit is pressed ----------------------*/
            if(isset($_POST['submit'])){
                $res=mysqli_query($db,"SELECT * from message where username='$_POST[username]' ;");

                mysqli_query($db,"UPDATE message SET status='yes' WHERE sender='student' and username='$_POST[username]' ;");

                if($_POST['username'] !=''){
                    $_SESSION['username']= $_POST['username'];
                }

            ?>
                <div style="height: 70px; width: 100%; text-align: center; color: white;">
                    <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username']; ?></h3>
                </div>

                <!----------------------------------- show message -------------------------->
                <div class="msg">
                    <?php
                        while($row= mysqli_fetch_assoc($res)){
                            if($row['sender']=='student'){
                    ?>
                    <!---------------------------------------- STUDENT --------------------------------------------->
                    <br><div class="chat user">
                        <div style="float: left; padding: 5px;"> &nbsp;
                            <img style="height: 40px; width: 40px; border-radius: 50%;" src="../admin/images/user.png" alt="">    
                        &nbsp;
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
                            <?php
                                echo "<img class='img-circle profile_img' height=40 width=40 src='../admin/images/". $_SESSION['pic']."'>";

                                // echo " ".$_SESSION['login_user'];
                            ?>
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

                <div style="height: 50px; padding-top: 10px;">
                    <form action="" method="post">
                        <input type="text" name="message" class="form-control" required="" 
                        placeholder="Write Message..." style="float: left; width: 690px;"> &nbsp; &nbsp;
                        <button class="btn btn-info btn-lg" type="submit" name="submit1">
                            <span class="glyphicon glyphicon-send"></span>&nbsp; Send 
                        </button>
                    </form>
                </div>
            <?php
            }
                /*---------------------- If submit is not pressed ----------------------*/
                else{
                    
                    if(!(isset($_POST['submit'])) && !(isset($_POST['submit1'])) && ($_SESSION['username'] == 'hermione')){ // $_SESSION['username'] -> Doesn't find image tag
                        ?>
                            <img style="margin: 120px 100px; border-radius: 50%; padding-left: 60px;" src="../admin/images/tenor.gif" alt="animated">
                        <?php
                    }
                    else{
                        if(isset($_POST['submit1'])){
                            mysqli_query($db,"INSERT into `library`.`message` VALUES ('', '$_SESSION[username]', 
                            '$_POST[message]', 'no', 'admin') ;");

                            $res=mysqli_query($db,"SELECT * from `message` where username='$_SESSION[username]' ;");
                        }
                        else{
                            $res=mysqli_query($db,"SELECT * from `message` where username='$_SESSION[username]' ;");
                        }
                        ?>
                            <div style="height: 70px; width: 100%; text-align: center; color: white;">
                                <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username']; ?></h3>
                            </div>
                            <!----------------------------------- show message -------------------------->
                            <div class="msg">
                                <?php
                                    while($row= mysqli_fetch_assoc($res)){
                                        if($row['sender']=='student'){
                                ?>
                                <!---------------------------------------- STUDENT --------------------------------------------->
                                <br><div class="chat user">
                                    <div style="float: left; padding: 5px;"> &nbsp;
                                        <img style="height: 40px; width: 40px; border-radius: 50%;" src="../admin/images/user.png" alt="">
                                    &nbsp;
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
                                        <?php
                                            echo "<img class='img-circle profile_img' height=40 width=40 src='../admin/images/". $_SESSION['pic']."'>";

                                            // echo " ".$_SESSION['login_user'];
                                        ?> 
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
                            <div style="height: 50px; padding-top: 10px;">
                                <form action="" method="post">
                                    <input type="text" name="message" class="form-control" required="" 
                                    placeholder="Write Message..." style="float: left; width: 690px;"> &nbsp; &nbsp;
                                    <button class="btn btn-info btn-lg" type="submit" name="submit1">
                                        <span class="glyphicon glyphicon-send"></span>&nbsp; Send 
                                    </button>
                                </form>
                            </div>
                        <?php
                    }
                }
            ?>
    </div>
</div>
<script>
    var table= document.getElementById('table'),eIndex;
    for(var i=0; i< table.rows.length; i++){
        table.rows[i].onclick= function(){
            rIndex = this.rowIndex;
            document.getElementById("uname").value = this.cells[1].innerHTML;
        }
    }
</script>
</body>
</html>