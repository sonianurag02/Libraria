<?php
    include "navbar.php";
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image: linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.5)), url('../student/images/F5.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;    
            position: relative;
       }
        .wrapper{
            padding: 10px;
            margin: -20px auto;
            width: 900px;
            height: 600px;
            background-color: #1d1b1b9e;
            opacity: .8;
            color: wheat;
        }
        .form-control{
            height: 70px;
            width: 60%;
        }
        .scroll{
            width: 100%;
            height: 300px;
            overflow: auto;
        }
        .tr1{
            margin: 10px;
            background-color: rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h4> If you have any suggesions or questions please comment below. </h4>
        <form style="" action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="write something..."> <br>
            <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
        </form>

    <br><br>

    <div class="scroll">
        <?php
            if(isset($_POST['submit'])){
                $sql="INSERT INTO comments VALUES('','Admin','$_POST[comment]');";
                if(mysqli_query($db,$sql)){
                    $table = "comments";
                    $rowa = "comments.id";
                    $q="SELECT * FROM $table ORDER BY $rowa DESC";
                    $res=mysqli_query($db,$q);

                    echo "<table class='table table-bordered'>";
                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr class='tr1'>";
                            echo "<td style='margin: 10px;'>"; echo $row['username']; echo"</td>";
                            echo "<td style='margin: 10px;'>"; echo $row['comment']; echo"</td>";
                        echo "</tr>";
                    }
                }
            }
            else{
                $table = "comments";
                $rowa = "comments.id";
                $q="SELECT * FROM $table ORDER BY $rowa DESC";
                    $res=mysqli_query($db,$q);

                    echo "<table class='table table-bordered'>";
                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr class='tr1'>";
                            echo "<td style='margin: 10px;'>"; echo $row['username']; echo"</td>";
                            echo "<td style='margin: 10px;'>"; echo $row['comment']; echo"</td>";
                        echo "</tr>";
                    }
            }
        ?>
    </div>
    </div>
</body>
</html>