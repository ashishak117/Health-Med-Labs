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
	
	<title>Health Med Labs || B/W Dates Appointment Detail</title>
	
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
						
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];

?>

<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
    <h4 class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
<hr />
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover js-basic-example dataTable table-custom">
								<thead>
									<tr>
										<th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
										
									</tr>
								</thead>
							
								<tbody>
                  <?php
$sql="SELECT month(tbltestrequest.PostingDate) as lmonth,year(tbltestrequest.PostingDate) as lyear,tbltestrequest.AppointmentNumber, sum(tbllabtest.Price) as totalprice,tblappointment.AssignTo,tblappointment.Status from  tbltestrequest join tbllabtest on tbltestrequest.TestID=tbllabtest.ID join tblappointment on tbltestrequest.AppointmentNumber=tblappointment.AppointmentNumber where date(tbltestrequest.PostingDate) between '$fdate' and '$tdate' && (tblappointment.AssignTo!='Rejected'|| tblappointment.AssignTo!='') group by lmonth,lyear ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									<tr>
										<td><?php echo $cnt;?></td>
                  <td><?php  echo $row->lmonth."/".$row->lyear;?></td>
              <td><?php  echo $total=$row->totalprice;?></td>               
                 
										
									</tr>
								<?php
$ftotal+=$total;
$cnt++;
}}?>
	
			 <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>
   
                 
                 
                </tr>					</tbody>
                  <tfoot>
                  <tr>
                 <th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
                  </tr>
                </tfoot>
							</table>
							<header class="widget-header">
 <?php } else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
 ?>
        <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
    <h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
<hr />
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover js-basic-example dataTable table-custom">
								<thead>
									<tr>
										<th>S.NO</th>
                                        <th>Year </th>
                                        <th>Sales</th>
										
									</tr>
								</thead>
							
								<tbody>
                  <?php
$sql="SELECT year(tbltestrequest.PostingDate) as lyear,tbltestrequest.AppointmentNumber, sum(tbllabtest.Price) as totalprice,tblappointment.AssignTo,tblappointment.Status from  tbltestrequest join tbllabtest on tbltestrequest.TestID=tbllabtest.ID join tblappointment on tbltestrequest.AppointmentNumber=tblappointment.AppointmentNumber where year(tbltestrequest.PostingDate) between '$fdate' and '$tdate' && (tblappointment.AssignTo!='Rejected'|| tblappointment.AssignTo!='') group by lyear ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									<tr>
										<td><?php echo $cnt;?></td>
                  <td><?php  echo $row->lyear;?></td>
              <td><?php  echo $total=$row->totalprice;?></td>               
                 
										
									</tr>
								<?php
$ftotal+=$total;
$cnt++;
}}?>
	
			 <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>
   
                 
                 
                </tr>					</tbody>
                  <tfoot>
                  <!-- <tr>
                 <th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
                  </tr> -->
                </tfoot>
							</table>
				<?php } ?>
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