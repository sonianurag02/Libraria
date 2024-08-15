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
    <title> Fine Calculation </title>
    <style type="text/css">
        .srch{
            padding-left: 800px; 
        }
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        }

        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        #main {
        transition: margin-left .5s;
        padding: 16px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
    </style>
</head>
<body>
    <!-- Side Nav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <div style="color:white; text-align: center; font-size: 20px; ">
            <?php
                if(isset($_SESSION['login_user'])){
                    echo "<img class='img-circle profile_img' height=120 width=120 src='images/". $_SESSION['pic']."'>";
                    echo "</br>";
                    // echo "</br>";
                    echo "Welcome ".$_SESSION['login_user'];
                }
            ?>
        </div>
        <br><br>
        <!-- <a href="profile.php">Profile</a>
        <a href="books.php">Books</a> -->
        <div class="h"> <a href="request.php">Book Request</a> </div>
        <div class="h"> <a href="issue_info.php">Issue Information</a> </div>
        <div class="h"> <a href="expired.php"> Expired List </a> </div>
    </div>

    <div id="main">
        <!-- <h2>Sidenav Push Example</h2>
        <p>Click on the element below to open the side navigation menu, and push this content to the right. Notice that we add a black see-through background-color to body when the sidenav is opened.</p> -->
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
        }
    </script>

    <!---------------------------- Search Bar ------------------------------------->
    <div class="container">
    <div class="srch">
        <form action="" class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="Student username..." required="">
            <button style="background-color: #55cbc3;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
    </div>

    <h2> List Of Students </h2>
    <?php

        if(isset($_POST['submit'])){
            $q=mysqli_query($db,"SELECT * FROM `fine` WHERE username like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0){
                echo "Sorry! No student found with that username. Try searching again.";
            }
            else{
                echo "<table class='table table-bordered table-hover'> ";
                echo "<tr style='background-color: #55cbc3; '>";
                    echo "<th>"; echo " Username "; echo "</th>";
                    echo "<th>"; echo " Book I'D "; echo "</th>";
                    echo "<th>"; echo " Returned "; echo "</th>";
                    echo "<th>"; echo " Days "; echo "</th>";
                    echo "<th>"; echo " Fines in $ "; echo "</th>";
                    echo "<th>"; echo " Status "; echo "</th>";
                echo "</tr>";

                while($row=mysqli_fetch_assoc($q)){
                    echo "<tr>";
                        // echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['returned']; echo "</td>";
                        echo "<td>"; echo $row['day']; echo "</td>";
                        echo "<td>"; echo $row['fine']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        //  If button is not pressed.
        else{
            $res=mysqli_query($db,"SELECT * FROM `fine`;");

            // Table Header
            echo "<table class='table table-bordered table-hover'> ";
            echo "<tr style='background-color: #55cbc3; '>";
                echo "<th>"; echo " Username "; echo "</th>";
                echo "<th>"; echo " Book I'D "; echo "</th>";
                echo "<th>"; echo " Returned "; echo "</th>";
                echo "<th>"; echo " Days "; echo "</th>";
                echo "<th>"; echo " Fines in $ "; echo "</th>";
                echo "<th>"; echo " Status "; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res)){
                echo "<tr>";
                    // echo "<td>"; echo $row['bid']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['bid']; echo "</td>";
                    echo "<td>"; echo $row['returned']; echo "</td>";
                    echo "<td>"; echo $row['day']; echo "</td>";
                    echo "<td>"; echo $row['fine']; echo "</td>";
                    echo "<td>"; echo $row['status']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    </div>
</div>
</body>
</html>