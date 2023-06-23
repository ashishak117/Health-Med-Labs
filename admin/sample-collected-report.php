<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odlmsaid']==0)) {
  header('location:logout.php');
  } else{

// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblemployee where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-lab-emp.php'</script>";     


}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Health Med Labs || Manage Employee Detail</title>
	
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
			<!-- DOM dataTable -->
			<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="m-t-0 header-title">Sample Collected Reports</h4>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover js-basic-example dataTable table-custom">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Employee ID</th>
										<th>Name</th>
										<th>Sample Assign</th>
										<th>Sample Collected</th>
										<th>Remaining Sample</th>
										
									</tr>
								</thead>
							
								<tbody>
                  <?php
$sql="SELECT distinct tblemployee.EmpID,tblemployee.Name,tblappointment.AssignTo,sum(if(tbltracking.Status = 'Approved', 1, 0)) as testassigned,  sum(if(tbltracking.Status = 'Sample Collected', 1, 0)) AS samplecollected from  tblappointment
join tblemployee on tblemployee.EmpID=tblappointment.AssignTo
join tbltracking on tbltracking.AppointmentNumeber=tblappointment.AppointmentNumber

where date(PostDate) between '$fdate' and '$tdate' group by tblemployee.EmpID,tblemployee.Name";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									<tr>
										<td><?php echo htmlentities($cnt);?></td>
										<td><?php  echo htmlentities($row->EmpID);?></td>
										<td><?php  echo htmlentities($row->Name);?></td>
										<td><?php  echo htmlentities($ta=$row->testassigned);?></td>
										<td><?php  echo htmlentities($sc=$row->samplecollected);?></td>
										<td><?php  echo htmlentities($ta-$sc);?></td>
									</tr>
								 <?php $cnt=$cnt+1;}} ?> 
	
								</tbody>
                  <tfoot>
                  <!-- <tr>
                  <th>S.No</th>
										<th>Employee ID</th>
										<th>Name</th>
										<th>Sample Assign</th>
										<th>Sample Collected</th>
										<th>Remaining Sample</th>
                  </tr> -->
                </tfoot>
							</table>
						</div>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div><!-- .wrap -->
  <!-- APP FOOTER -->
  <?php include_once('includes/footer.php');?>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

	<!-- APP CUSTOMIZER -->
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