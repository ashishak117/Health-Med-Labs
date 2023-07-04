
<!DOCTYPE HTML>
<html>
<head>
<title>HEALTH MED LABS | Home Page</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/modernizr.custom.97074.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->
<!--script-->
<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('.gallery a').Chocolat();
		});
		</script>
<!--script-->
<style>
    .container {
      position: relative;
    }

    .top-left {
      position: absolute;
      top: -0.1em;
      left: -1.1em;
    }
  </style>

</head>
<body>
	<div class="header" id="home">
		<div class="header-top">
		<div class="container">
          <img class="top-left" src="images/HML logo2.png" alt="HML">
		  <!-- <img class="top-left" src="images/HM logo.png" alt="HML"> -->
        </div>
			<div class="container">
			   <div class="logo">
				  <a href="index.php"><span></span></a>
				</div>
				<div class="top-menu">
					<span class="menu"><img src="" alt=""/> </span>
						<ul>
						<li><a href="index.php" class="active scroll">home</a></li>
						<li><a href="#aboutus" class="scroll">Collections</a></li>
						<li><a href="#gallery" class="scroll">Testimonials</a></li>
						<li><a href="admin/login.php">Admin</a></li>
						<li><a href="user/login.php">Users</a></li>
						<li><a href="employee/login.php">Employee</a></li>
					</ul>
				</div>
					 <!--script-nav-->
						 <script>
						 $("span.menu").click(function(){
						 $(".top-menu ul").slideToggle("slow" , function(){
						 });
						 });
						 </script>
		 
						<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="content">
			<div class="about-section" id="aboutus">
				<div class="container"><br/><br/><br/><br/>
					<h3>SAMPLE COLLECTION</h3><br>
					<h4>How Does It Works?</h4></br>
					    <div class="about-grids">
							<div class="col-md-4 about-grid">
								<img src="images/Step1.png" class="img-responsive" alt="">
								<h4></h4>
								<p>Search for the required tests/packages and book an appointment online.</p>
							</div>
							<div class="col-md-4 about-grid">
								<img src="images/step2.png"  class="img-responsive" alt="">
								<h4></h4>
								<p>A certified Phlebotomist will reach your place on the chosen date and time to collect the sample.</p>
							</div>
							<div class="col-md-4 about-grid">
								<img src="images/Step3.png"  class="img-responsive" alt="">
								<h4></h4>
								<p>The test reports will be sent through mail or can be generated with your account and downloaded.</p>
							</div>
								<div class="clearfix"></div>
						</div>
					</div>
				</div>	
		
	<div class="gallery" id="gallery">
		<div class="container">
			<h3>Testimonials</h3>
			<div class="gallery-grids">
			<section>
				<ul id="da-thumbs" class="da-thumbs">
					<li>
						<a href="images/g1.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g1.jpg" alt="" />
							<div>
								<h5>Mr. Anil Jaywant</h5>
								<span>Very Supportive & Co-operative Staff Quality work, as well as report turnaround time</span>
							</div>
						</a>
					</li>
					<li>
						<a href="images/g2.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g2.jpg" alt="" />
							<div>
								<h5>Mr. Nitin Shinde</h5>
								<span>Quality work, Impress with the management of firm as well as turn around time of the reports</span>
							</div>
						</a>
					</li>
					<li>
						<a href="images/g3.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g3.jpg" alt="" />
							<div>
								<h5>Mr. Somesh Kulkarni</h5>
<<<<<<< HEAD
								<span>We have regularly working with Health Med Labs, and feeling very great to get good service from them</span>
=======
								<span>We have regularly working with Ashturkar pathology lab, and feeling very great to get good service from them</span>
>>>>>>> 21622c928cc7d80a0decbfac0a1f471a55ac53eb
							</div>
						</a>
					</li>
					<li>
						<a href="images/g4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g4.jpg" alt="" />
							<div>
								<h5>Minal Sharma</h5>
								<span>The staff of this lab is very professional, polite, and accurate in lab testing. And home collection and timely delivery of reports at home are also very efficient</span>
							</div>
						</a>
					</li>
					<li>	
						<a href="images/g5.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g5.jpg" alt="" />
							<div>
								<h5>Nila Gupta</h5>
								<span>Health Med Labs kept me at ease during the sample collection process, Based on my experience. I can assure you that, be it quality or punctuality, Health Med Labs is one name to trust and depend on</span>
							</div>
						</a>
					</li>
					<li>
						<a href="images/g6.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g6.jpg" alt="" />
							<div>
								<h5>Mr. Aditya Singh</h5>
								<span>Lab at home service is very prompt. I booked a blood test for my mother, blood sample was collected and Reports were also delivered early. the Best Health Med Labs in Bangalore</span>
							</div>
						</a>
					</li>
					<li>
						<a href="images/g7.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g7.jpg" alt="" />
							<div>
								<h5>Neha Kadam</h5>
								<span>Thanks for the seamless service. Based on my experience, I can assure you that, be it quality or punctuality, Health Med Labs is one name to trust and depend on</span>
							</div>
						</a>
					</li>
					<li>
						<a href="images/g8.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g8.jpg" alt="" />
							<div>
								<h5>Sanket Patil</h5>
								<span>Best service,excellent management. Quick results as compared to other labs. Trained staff. Would recommend to opt for their services to everyone.</span>
							</div>
						</a>
					</li>
					<li>
						<a href="images/g9.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
							<img src="images/g9.jpg" alt="" />
							<div>
<<<<<<< HEAD
								<h5>Aryan M</h5>
=======
								<h5>Ashish M</h5>
>>>>>>> 21622c928cc7d80a0decbfac0a1f471a55ac53eb
								<span>Finest Lab at your doorstep. Quick and seamless process with humble and well trained staff. Delivers as promised. Highly recommended</span>
							</div>
						</a>
					</li>
					<div class="clearfix"> </div>
				</ul>
			</section>
			<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
		<script type="text/javascript">
			$(function() {
			
				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>
        </div>
	</div>
</div>
<!--//gallery-->


<<<<<<< HEAD
	<div class="footer-section">
		        
						<!-- <div class="container">
<<<<<<< HEAD
=======
=======
	<!-- <div class="footer-section">
						<div class="container">
>>>>>>> 67fac462b9139791b3f9206df35750e402ade923
>>>>>>> 21622c928cc7d80a0decbfac0a1f471a55ac53eb
							<div class="footer-bottom">
						<p>HEALTH MED LABS @ 2023</p>
									</div>
							
			</div> -->
			<!-- Site footer -->
			<link rel="stylesheet" href="css/foot.css">
			  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
   			  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
			  <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Test At Home</a></li>
                            <li><a href="#">Quick Report</a></li>
                            <li><a href="#">Consulting Doctor</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Health Med Labs</h3>
                        <p> It is a platform that allows patients, 
medical practitioners, and other authorized users to access and manage 
medical test results and related information via the internet. The system is 
designed to provide a convenient and secure way for patients to receive and 
review lab test results, as well as for medical practitioners to monitor and 
manage patients’ health.</p>
                    </div>
					<div class="container">
<<<<<<< HEAD
          <!-- <img class="center" src="images/Social-Media.png" alt=""> -->
        </div>	
                    <div class="col item social"><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a></a><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a></div>
                </div>
=======
          <img class="center" src="images/Social-Media.png" alt="">
        </div>	
                    <!-- <div class="col item social"><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a></a><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a></div>
                </div> -->
>>>>>>> 21622c928cc7d80a0decbfac0a1f471a55ac53eb
                <p class="copyright">Health Med Labs © 2023</p>
				<script type="text/javascript">
						$(document).ready(function() {
							
							// var defaults = {
					  		// 	containerID: 'toTop', // fading element id
							// 	containerHoverID: 'toTopHover', // fading element hover id
							// 	scrollSpeed: 1200,
							// 	easingType: 'linear' 
					 		// };
							
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				</div>
<<<<<<< HEAD
            </div>
        </footer>
    </div>
=======
<<<<<<< HEAD
            </div>
        </footer>
    </div>
=======
			</div> -->
			  <!-- Site footer -->
			  <link rel="stylesheet" href="css/foot.css">
			  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
   			  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
			  <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Test At Home</a></li>
                            <li><a href="#">Quick Report</a></li>
                            <li><a href="#">Consulting Doc</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Health Med Labs</h3>
                        <p> it is a platform that allows patients, 
medical practitioners, and other authorized users to access and manage 
medical test results and related information via the internet. The system is 
designed to provide a convenient and secure way for patients to receive and 
review lab test results, as well as for medical practitioners to monitor and 
manage patients’ health.</p>
                    </div>
                    <div class="col item social"><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a></a><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Health Med Labs © 2023</p>
            </div>
        </footer>
    </div>
   
>>>>>>> 67fac462b9139791b3f9206df35750e402ade923
>>>>>>> 21622c928cc7d80a0decbfac0a1f471a55ac53eb
</body>
</html>