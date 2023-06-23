<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odlmsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>ODLMS|| View Medical Report</title>
	
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
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

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
						<h4 class="widget-title" style="color: blue">Appointment Details</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="table-responsive">
							<?php
                  $vid=$_GET['viewid'];
$sql="SELECT * from tblappointment  where ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
							<table border="1" class="table table-bordered mg-b-0">
                                            <tr>
    <th>Appointment Number</th>
    <td><?php  echo $aptno=($row->AppointmentNumber);?></td>
    <th>Patient Name</th>
    <td><?php  echo $row->PatientName;?></td>
  </tr>
  

  <tr>
    <th>Gender</th>
    <td><?php  echo $row->Gender;?></td>
    <th>Date of Birth</th>
    <td><?php  echo $row->DOB;?></td>
  </tr>
  <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>Email</th>
    <td><?php  echo $row->Email;?></td>
  </tr>
   <tr>
    <th>Appointment Date</th>
    <td><?php  echo $row->AppointmentDate;?></td>
    <th>Appointment Time</th>
    <td><?php  echo $row->AppointmentTime;?></td>
  </tr>
   <tr>
    <th>Prescription</th>
    <td><?php if(!empty($row->Prescription)){?>

      <a href="images/<?php echo $row->Prescription;?>" target="_blank">Download Prescription</a>
<?php } else {
echo "NA";
}?></td>
    <th>Date of Birth</th>
    <td><?php  echo $row->DOB;?></td>
  </tr>
  <tr>
    <th>Apply Date</th>
    <td><?php  echo $row->PostDate;?></td>
     <th>Status</th>
     <?php  $status=$row->Status; if($status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td><?php  echo $status;?></td>
    <?php } ?>
  </tr>
  <tr>
    <tr>
    <th>Admin Remark</th>
    <?php if($status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td><?php  echo $row->Remark;?></td>
    <?php } ?>

    <th>Updation Date</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td><?php  echo $row->UpdationDate;?></td>
    <?php } ?>
  </tr>
 <tr>
    <th>Report</th>
    <td><a href="../admin/images/<?php echo $row->Report;?>" target="_blank">Download Report</a></td>
    <th>Report Uploaded Date</th>
    <td><?php  echo $row->ReportUploadedDate;?></td>
  </tr>
 
<?php $cnt=$cnt+1;}} ?>

</table> 
<br>
<h4 style="color: blue">Test Detail</h4>
<?php
$uid=$_SESSION['odlmsuid'];

               
$sql="SELECT tbllabtest.TestTitle,tbllabtest.TestDescription,tbllabtest.TestInterpretation,tbllabtest.Price,tblappointment.UserID,tblappointment.AppointmentNumber,  tbltestrequest.AppointmentNumber, tbltestrequest.TestID from tblappointment join tbltestrequest on tblappointment.AppointmentNumber= tbltestrequest.AppointmentNumber join tbllabtest on tbllabtest.ID=tbltestrequest.TestID  where tbltestrequest.AppointmentNumber=:aptno";
$query = $dbh -> prepare($sql);
$query-> bindParam(':aptno', $aptno, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
            ?>
							<table border="1" class="table table-bordered mg-b-0">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Test Title</th>
										<th>Price</th>
																			
									</tr>
								</thead>
								<?php 
								foreach($results as $row)
{   ?>
                                            <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php  echo $row->TestTitle;?></td>
    <td><?php  echo $tprice=$row->Price;?></td>
   
  </tr>
  

 

  
 
 
<?php 
$grandtprice+=$tprice;

$cnt=$cnt+1;} ?>
<tr>
	<th colspan="2">Grand Total</th>
<th><?php echo $grandtprice; ?></th>
</tr>
</table> 
<?php } ?>

<?php 
$aptid=$_GET['aptid']; 
   if($status!=""){
$ret="select tbltracking.OrderCanclledByUser,tbltracking.Remark,tbltracking.Status as astatus,tbltracking.UpdationDate from tbltracking where tbltracking.AppointmentNumeber =:aptid";
$query = $dbh -> prepare($ret);
$query-> bindParam(':aptid', $aptid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

 $cancelledby=$row->OrderCanclledByUser;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results as $row)
{               ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row->Remark;?></td> 
  <td><?php  echo $row->astatus;
if($row->OrderCanclledByUser==1){
echo "("."by user".")";
} else {

echo "("."by Lab".")";
}

  ?></td> 
   <td><?php  echo $row->UpdationDate;?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>

						</div>

					</div>
					<!-- .widget-body -->
					 


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