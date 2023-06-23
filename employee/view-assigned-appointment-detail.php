<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odlmseid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
  {
    
    $eid=$_GET['editid'];
    $aptid=$_GET['aptid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];

    $sql="insert into tbltracking(AppointmentNumeber,Remark,Status) value(:aptid,:remark,:status)";
    $query=$dbh->prepare($sql);
$query->bindParam(':aptid',$aptid,PDO::PARAM_STR); 
    $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
    $query->bindParam(':status',$status,PDO::PARAM_STR); 
       $query->execute();
      $sql= "update tblappointment set Status=:status,Remark=:remark where ID=:eid";

    $query=$dbh->prepare($sql);
    
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='total-appointment.php'</script>";
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Health Med Labs || View Appointment Detail</title>
	
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
						<h4 class="widget-title" style="color: blue">Appointment Details</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="table-responsive">
							<?php
                  $eid=$_GET['editid'];
$sql="SELECT * from tblappointment  where ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
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
    <th >Assign To</th>
    <td><?php  echo $row->AssignTo;?></td>
    <th>Date of Birth</th>
    <td><?php  echo $row->DOB;?></td>
  </tr>
  <tr>
    <th>Apply Date</th>
    <td><?php  echo $row->PostDate;?></td>
     <th>Order Final Status</th>

    <td colspan="4"> <?php  $status=$row->Status;
    
if($row->Status=="")
{
  echo "Not updated yet";
} else { 
  echo $status;
}





     ;?></td>
  </tr>
   <tr>
  <th>Admin Remark</th>
    <?php if($status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td><?php  echo $row->Remark;?></td>
    <?php } ?>
<th >Prescription</th>
    <td colspan="3" ><a href="../user/images/<?php echo $row->Prescription;?>" target="_blank">Download Prescription</a></td>
  </tr>
 
<?php $cnt=$cnt+1;}} ?>

</table> 
<br>
<h4 style="color: blue">Test Detail</h4>
<?php
   $aptid=$_GET['aptid'];            
$sql="SELECT tbllabtest.TestTitle,tbllabtest.TestDescription,tbllabtest.TestInterpretation,tbllabtest.Price,tblappointment.UserID,tblappointment.AppointmentNumber,  tbltestrequest.AppointmentNumber, tbltestrequest.TestID from tblappointment join tbltestrequest on tblappointment.AppointmentNumber= tbltestrequest.AppointmentNumber join tbllabtest on tbllabtest.ID=tbltestrequest.TestID  where tbltestrequest.AppointmentNumber=:aptid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':aptid', $aptid, PDO::PARAM_STR);
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
<br>
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
if($canclbyuser==1){
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
 
<?php 

if ($status=="Approved" || $status=="On the Way"|| $status=="Sample Collected" ){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
     
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="On the Way" selected="true">On the Way</option>
     <option value="Sample Collected">Sample Collected</option>
     <option value="Delivered to Lab">Delivered to Lab</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>
  

</div>

                      
                        </div>
                    </div>

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