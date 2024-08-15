<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Libraria</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Flamenco&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

</head>
<body>
    
	<!-----First page Starts----->	
	<div class="front">
		<!---- Navbar Section Starts ----->

		<section id="nav-bar">
			<nav class="navbar navbar-expand-lg navbar-light">
				<img src="images/G2.png" alt="Library" style="height: 60px; width: 60px; opacity: 0.6; background-color: transparent;  ">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                        if(isset($_SESSION['login_user'])){
                    ?>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                <a class="nav-link" href="index.php" style="color: white; font-weight: bold; font-size: 1.2em;">HOME</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="books.php" style="color: white; font-weight: bold; font-size: 1.2em;">BOOKS</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="feedback.php" style="color: white; font-weight: bold; font-size: 1.2em;">FEEDBACK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#Contact" style="color: white; font-weight: bold; font-size: 1.2em;">CONTACT US</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="logout.php" style="color: white; font-weight: bold; font-size: 1.2em;">LOGOUT</a>
                                </li>
                            </ul>

                    <?php
                        }
                        else{
                    ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="index.php" style="color: white; font-weight: bold; font-size: 1.2em;">HOME</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="books.php" style="color: white; font-weight: bold; font-size: 1.2em;">BOOKS</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="feedback.php" style="color: white; font-weight: bold; font-size: 1.2em;">FEEDBACK</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Contact" style="color: white; font-weight: bold; font-size: 1.2em;">CONTACT US</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="admin_login.php" style="color: white; font-weight: bold; font-size: 1.2em;">LOGIN</a>
                            </li>
                        </ul>
                    <?php
                        }
                    ?>
				</div>
			  </nav>
		</section>

		<!---- Navbar Section Ends ------>

		<section class="header-section" >
			<div class="center-div">
				<h1 class="font-weight-bold name ">Welcome to Library</h1>
				<div class="droping-text container text-center col-xs-6 col-xs-offset-6">
					<div class="part">Come to <b>Learn...</b></div>
					<div class="part">Go to <b> Serve...</b></div>
                    <div class="part">Come to <b>Learn...</b></div>
					<div class="part">Go to <b> Serve...</b></div>
				</div>
				
				<div class="front-button">
					<div class="header-buttons wow shake">
						<a href="#" target="_blank"> Opens at: 09:00 </a>
					</div>
				</div>
				<div class="sec-button">
					<div class="header-buttons wow shake delay:3s">
						<a href="#" target="_blank" > Closes at: 15:00 </a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-----First page Ends----->	

    <!-- Project part Ends---->
	
	<section class="contactme" id="Contact">
		<div class="total-contactme">
			<div class="header2">
				<h1 class="header1 heading"> Contact Us </h1>
				<p class="contact-para"> Write your query.....Please feel free to contact us &#128578;</p>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 offset-1">
						<form action="https://formspree.io/f/mgedabkz" method="POST">
							<div class="form-group">
						    	<input name="name" type="text" class="form-control" id="username" required autocomplete="off"
							    	placeholder="Please Enter Your Name">
						  	</div>
							<div class="form-group">
							   	<input name="email" type="email" class="form-control" id="email" required autocomplete="off"
							    	placeholder="Please Enter Your Email">
							</div>
							<div class="form-group">
							    <input name="phone" type="text" class="form-control" id="mobile" required autocomplete="off"
							    	placeholder="Please Enter Your Mobile Number">
							</div>
							<div class="form-group">
								<textarea name="message" class="form-control" rows="4" id="comment" placeholder="Please Enter your Message "></textarea>
							</div>
							<div class="d-flex justify-content-center form-button">
							  	<button type="submit" class="btn btn-primary">Send</button>
							</div>
						</form>	
					</div>			
				</div>
			</div>
		</div>
		<div class="middle">
		<a class="setit wow bounce" href="https://instagram.com/_20_anurag_02_?utm_medium=copy_link" target="_blank">
				<i class="fa fa-instagram" aria-hidden="true"></i>
			</a>
			<a class="setit wow bounce" href="https://twitter.com/AnuragS13566871?t=_SQg3JU_ZD1QdBe10R79Jw&s=09" target="_blank">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
			<a class="setit wow bounce" href="https://github.com/Anurag2601" target="_blank">
				<i class="fa fa-github" aria-hidden="true"></i>
			</a>
			<a class="setit wow bounce" href="https://www.linkedin.com/in/anurag-soni-7085a917b" target="_blank">
				<i class="fa fa-linkedin" aria-hidden="true"></i>
			</a>
			<a class="setit wow bounce" href="https://www.facebook.com/AS26012002" target="_blank">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>	
		</div>
	</section> 

	<!---*********** Contact Section Ends ********************----->

	<!---- Footer section starts----->
		
	<footer class="footersection">
		<div class="total-footersection">
			<div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 col-1 footer-div">
				<p>Copyright ©2k21 ANURAG SONI...<br> All rights reserved....</p>
			</div>
		</div>

		<div class="scrolltop float-right">
			<i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>	
		</div>
	</footer> 

	<!---- Footer section Ends----->


	<!---- Java Script Starts ---->

	<script src="js/wow.js"></script>
    <script>
        new WOW().init();
    </script>

    <script>
  		mybutton = document.getElementById("myBtn");
  		window.onscroll = function() {
  			scrollFunction()
  		};
  		function scrollFunction() {
  			if(document.body.scrollTop >10 || document.documentElement.scrollTop >10){
  				mybutton.style.display ="block";
  			}
  			else{
  				mybutton.style.display ="none";
  			}
  		}
  		function topFunction() {
  			document.body.scrolltop = 0; // For Safari
  			document.documentElement.scrollTop = 0; // For Chrome ,Firefox ,IE and Chrome
  		}
  	</script>

  	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.hislide.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  	<script>
		$('.slide').hiSlide();


		$("a[href^='#']").click(function(e) {
			e.preventDefault();
			
			var position = $($(this).attr("href")).offset().top;
		
			$("body, html").animate({
				scrollTop: position
			} /* speed */ );
		});

	</script>

  	<!---- Java Script Ends----->

</body>
</html>