<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odlmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>HM Labs - Dashboard</title>
	
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css assets/css/app.min.css -->
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->


 <?php include_once('includes/header.php');?>

<?php include_once('includes/sidebar.php');?>



<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
		<div class="row">
			
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql1 ="SELECT * from  tbluser";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totregusers=$query1->rowCount();
?>
							<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totregusers);?></span></h3>
							<small class="text-color">Total Reg Users</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
					</div>
					<footer class="widget-footer bg-primary">
						<a href="view-regusers.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql2 ="SELECT * from  tblappointment where Status is null ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totnewapt=$query2->rowCount();
?>
							<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totnewapt);?></span></h3>
							<small class="text-color">Total New Appointment</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
					</div>
					<footer class="widget-footer bg-danger">
						<a href="new-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql3 ="SELECT * from  tblappointment where Status='Approved' ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totaprapt=$query3->rowCount();
?>
							<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totaprapt);?></span></h3>
							<small class="text-color">Total Approved Appointment</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
					</div>
					<footer class="widget-footer bg-success">
						<a href="approved-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql4 ="SELECT * from  tblappointment where Status='Rejected' ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totrejapt=$query4->rowCount();
?>
							<h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totrejapt);?></span></h3>
							<small class="text-color">Total Rejected Appointment</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
					</div>
					<footer class="widget-footer bg-warning">
						<a href="rejected-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>
		</div><!-- .row -->



		
			<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql5 ="SELECT * from  tblappointment where Status='Order Cancelled'";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$totuserscan=$query5->rowCount();
?>
							<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totuserscan);?></span></h3>
							<small class="text-color">Appointment Cancelled</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
					</div>
					<footer class="widget-footer bg-primary">
						<a href="usercancel-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql6 ="SELECT * from  tblappointment where Status='Delivered to Lab'";
$query6 = $dbh -> prepare($sql6);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$totsamreiv=$query6->rowCount();
?>
							<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totsamreiv);?></span></h3>
							<small class="text-color">Total Sample Received</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
					</div>
					<footer class="widget-footer bg-danger">
						<a href="sample-received.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql7 ="SELECT * from  tblappointment where Status='Report Uploaded'";
$query7 = $dbh -> prepare($sql7);
$query7->execute();
$results7=$query7->fetchAll(PDO::FETCH_OBJ);
$totrepup=$query7->rowCount();
?>
							<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totrepup);?></span></h3>
							<small class="text-color">Total Report Uploaded</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
					</div>
					<footer class="widget-footer bg-success">
						<a href="uploaded-reports.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						$sql8 ="SELECT * from  tblemployee";
$query8= $dbh -> prepare($sql8);
$query8->execute();
$results8=$query8->fetchAll(PDO::FETCH_OBJ);
$totemp=$query8->rowCount();
?>
							<h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totemp);?></span></h3>
							<small class="text-color">Total Employee</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
					</div>
					<footer class="widget-footer bg-warning">
						<a href="manage-lab-emp.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>
		</div>
		
	</section><!-- #dash-content -->
</div><!-- .wrap -->
  <!-- APP FOOTER -->
 <?php include_once('includes/footer.php');?>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

<?php include_once('includes/customizer.php');?>
	
	

	<!-- build:js assets/js/core.min.js -->
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>
</body>
</html>
<?php }  ?>