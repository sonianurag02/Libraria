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
    <title>Books</title>
    <style type="text/css">
        .srch{
            padding-left: 900px; 
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

        .h:hover{
            color: white;
            width: 300px;
            height: 50px;
            background-color: #00544c;
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
        </div> <br> <br>
        
        <div class="h"> <a href="add.php"> Add Books </a> </div>
        <!-- <div class="h"> <a href="delete.php"> Delete Books </a> </div> -->
        <div class="h"> <a href="request.php"> Book Request </a> </div>
        <div class="h"> <a href="issue_info.php"> Issue Information </a> </div>
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
    <div class="srch">
        <form action="" class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="search books..." required="">
            <button style="background-color: #55cbc3;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
        <form action="" class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="bid" placeholder=" Enter Book ID " required="">
            <button style="background-color: #55cbc3;" type="submit" name="submit1" class="btn btn-default"> Delete
            </button>
        </form>
    </div>

    <h2> List Of Books </h2>
    <?php

        if(isset($_POST['submit'])){
            $q=mysqli_query($db,"SELECT * from books WHERE name like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0){
                echo "Sorry! No books found. Try searching again.";
            }
            else{
                echo "<table class='table table-bordered table-hover'> ";
                echo "<tr style='background-color: #55cbc3; '>";
                    echo "<th>"; echo "ID"; echo "</th>";
                    echo "<th>"; echo "Book-Name"; echo "</th>";
                    echo "<th>"; echo "Authors Name"; echo "</th>";
                    echo "<th>"; echo "Edition"; echo "</th>";
                    echo "<th>"; echo "Status"; echo "</th>";
                    echo "<th>"; echo "Quantity"; echo "</th>";
                    echo "<th>"; echo "Department"; echo "</th>";
                echo "</tr>";
        
                while($row=mysqli_fetch_assoc($q)){
                    echo "<tr>";
                        echo "<td>"; echo $row['bid']; echo "</td>";
                        echo "<td>"; echo $row['name']; echo "</td>";
                        echo "<td>"; echo $row['authors']; echo "</td>";
                        echo "<td>"; echo $row['edition']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";
                        echo "<td>"; echo $row['quantity']; echo "</td>";
                        echo "<td>"; echo $row['department']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        //  If button is not pressed.
        else{
            $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `bid` ASC;");

            // Table Header
            echo "<table class='table table-bordered table-hover'> ";
            echo "<tr style='background-color: #55cbc3; '>";
                echo "<th>"; echo "ID"; echo "</th>";
                echo "<th>"; echo "Book-Name"; echo "</th>";
                echo "<th>"; echo "Authors Name"; echo "</th>";
                echo "<th>"; echo "Edition"; echo "</th>";
                echo "<th>"; echo "Status"; echo "</th>";
                echo "<th>"; echo "Quantity"; echo "</th>";
                echo "<th>"; echo "Department"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res)){
                echo "<tr>";
                    echo "<td>"; echo $row['bid']; echo "</td>";
                    echo "<td>"; echo $row['name']; echo "</td>";
                    echo "<td>"; echo $row['authors']; echo "</td>";
                    echo "<td>"; echo $row['edition']; echo "</td>";
                    echo "<td>"; echo $row['status']; echo "</td>";
                    echo "<td>"; echo $row['quantity']; echo "</td>";
                    echo "<td>"; echo $row['department']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        if(isset($_POST['submit1'])){
            if(isset($_SESSION['login_user'])){
                mysqli_query($db,"DELETE from books where bid='$_POST[bid]';");
                ?>
                    <script type="text/javascript">
                        alert("Delete Successful.");
                    </script>
                <?php
            }
            else{
                ?>
                    <script type="text/javascript">
                        alert("Please Login First.");
                    </script>
                <?php
            }
        }
    ?>
    </div>
</body>
</html>