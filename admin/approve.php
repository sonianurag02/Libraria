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
    <title> Approve Request </title>
    <style type="text/css">
        .srch{
            padding-left: 950px; 
        }

        .form-control{
            width: 350px;
            height: 40px;
            background-color: black;
            color: white;
        }

        body {
            background-image: url('../admin/images/A4.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;    
            position: relative;
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

        .wrapper{
            height: 570px;
            width: 1350px;
            margin-left: 70px;
            margin-right: 80px;
            background-color: black;
            opacity: 0.8;
            color: white;
            padding: 5px;
        }

        .Approve{
            /* text-align: center; */
            margin-left : 500px;
        }
    </style>
</head>
<body>
<!------------------------------ Side Nav -------------------------------------->
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
        
        <div class="h"> <a href="books.php"> Books </a> </div>
        <!-- <div class="h"> <a href="delete.php"> Delete Books </a> </div> -->
        <div class="h"> <a href="request.php"> Book Request </a> </div>
        <div class="h"> <a href="issue_info.php"> Issue Information </a> </div>
        <div class="h"> <a href="expired.php"> Expired List </a> </div>
    </div>

    <div id="main">
        <!-- <h2>Sidenav Push Example</h2>
        <p>Click on the element below to open the side navigation menu, and push this content to the right. 
            Notice that we add a black see-through background-color to body when the sidenav is opened.</p> -->
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
    <div class="wrapper">
        <br> <h3 style="text-align: center;"> Approve Request </h3> <br><br>

        <form class="Approve" method="post" name="" action="">
            <input type="text" name="approve" placeholder="Yes or No" required="" class="form-control"> <br>
            <input type="text" name="issue" placeholder="Issue Date (yyyy-mm-dd)" required="" class="form-control"> <br>
            <input type="text" name="return" placeholder="Return Date (yyyy-mm-dd)" required="" class="form-control"> <br>
            <input type="text" name="tm" class="form-control" placeholder="Return Date Dec 25, 2021 13:00:00" required="">
            <button class="btn btn-default" type="submit" name="submit" style="margin-top: 20px;"> Approve </button>
        </form>
    </div>
</div>

<!----------------------------------------Not Working Properly ------------------------------------------------------>

<?php
    if(isset($_POST['submit'])){

        mysqli_query($db," INSERT into timer VALUES('$_SESSION[name]', '$_SESSION[bid]', '$_POST[tm]') ;");

        mysqli_query($db,"UPDATE issue_book SET `approve` = '$_POST[approve]', `issue` = '$_POST[issue]', `return` = '$_POST[return]' 
        WHERE username='$_SESSION[username]' and bid='$_SESSION[bid]';");

        mysqli_query($db,"UPDATE books SET quantity = quantity-1 WHERE bid='$_SESSION[bid]';");

        mysqli_query($db, "UPDATE books SET bcount = bcount-1 WHERE bid='$_SESSION[bid]' ;");

        $res=mysqli_query($db,"SELECT quantity from books WHERE bid='$_SESSION[bid]';");

        while($row=mysqli_fetch_assoc($res)){
            if($row['quantity'] == 0){
                mysqli_query($db,"UPDATE books SET status='not-available' WHERE bid='$_SESSION[bid]';");
            }
        }
        ?>
            <script type="text/javascript">
                alert("Updated Successfully.");
                window.location="request.php";
            </script>
        <?php
    }
?>
</body>
</html>