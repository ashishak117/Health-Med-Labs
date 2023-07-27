<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['odlmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {

$uid=$_SESSION['odlmsuid'];
$pname=$_POST['pname'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$mobnum=$_POST['mobnum'];
$email=$_POST['email'];
$aptdate=$_POST['aptdate'];
$apttime=$_POST['apttime'];
$aptnumber=mt_rand(100000000, 999999999);
$pres=$_FILES["pres"]["name"];
$extension = substr($pres,strlen($pres)-4,strlen($pres));
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf");
if(!empty($pres))
{
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Prescription has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$pres=md5($pres).time().$extension;
 move_uploaded_file($_FILES["pres"]["tmp_name"],"images/".$pres);
 
$sql="insert into tblappointment(UserID,AppointmentNumber,PatientName,Gender,DOB,MobileNumber,Email,AppointmentDate,AppointmentTime,Prescription)values(:uid,:aptnumber,:pname,:gender,:dob,:mobnum,:email,:aptdate,:apttime,:pres)";
$query=$dbh->prepare($sql);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':aptdate',$aptdate,PDO::PARAM_STR);
$query->bindParam(':apttime',$apttime,PDO::PARAM_STR);
$query->bindParam(':pres',$pres,PDO::PARAM_STR);
$query->bindParam(':aptnumber',$aptnumber,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    $tid=$_POST['tids'];
for($i=0;$i<count($tid);$i++){
   $tvid=$tid[$i];
    $sql="insert into tbltestrequest(AppointmentNumber,TestID,MobileNumber)values(:aptnumber,:tvid,:mobnum)";
$query=$dbh->prepare($sql);

$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':aptnumber',$aptnumber,PDO::PARAM_STR);
$query->bindParam(':tvid',$tvid,PDO::PARAM_STR);
     $query->execute();
      } 

echo '<script>alert("Your Appointment has been taken successfully. Appointment number is "+"'.$aptnumber.'")</script>';
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
 else {

 
$sql="insert into tblappointment(UserID,AppointmentNumber,PatientName,Gender,DOB,MobileNumber,Email,AppointmentDate,AppointmentTime)values(:uid,:aptnumber,:pname,:gender,:dob,:mobnum,:email,:aptdate,:apttime)";
$query=$dbh->prepare($sql);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':aptdate',$aptdate,PDO::PARAM_STR);
$query->bindParam(':apttime',$apttime,PDO::PARAM_STR);
$query->bindParam(':aptnumber',$aptnumber,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    $tid=$_POST['tids'];
for($i=0;$i<count($tid);$i++){
   $tvid=$tid[$i];
    $sql="insert into tbltestrequest(AppointmentNumber,TestID,MobileNumber)values(:aptnumber,:tvid,:mobnum)";
$query=$dbh->prepare($sql);

$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':aptnumber',$aptnumber,PDO::PARAM_STR);
$query->bindParam(':tvid',$tvid,PDO::PARAM_STR);
     $query->execute();
      } 

echo '<script>alert("Your Appointment has been taken successfully. Appointment number is "+"'.$aptnumber.'")</script>';
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

 }
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Health Med Labs || Appointment Form</title>
	
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
			<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Appointment</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						
						<form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Patient Name</label>
                <input type="text" class="form-control" id="pname" name="pname" required="true">
              </div>
							<div class="form-group">
								<label for="exampleInputEmail1">Patient Gender</label>
							<label>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Female</label>
              <label>
              <input type="radio" name="gender" id="gender" value="Male">Male
              </label>
							</div>
              <div class="form-group">
                <label for="exampleInputEmail1">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required="true">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile Number</label>
                <input type="text" class="form-control" id="mobnum" name="mobnum" maxlength="10" pattern="[0-9]+" required="true">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email ID</label>
                <input type="email" class="form-control" id="email" name="email" required="true">
              </div>
							<div class="form-group">
								<label for="exampleInputPassword1">Appointment Date</label>
								<input type="date" class="form-control" id="aptdate" required="true" name="aptdate">
							</div>
              <div class="form-group">
                <label for="exampleInputPassword1">Appointment Time</label>
                <input type="time" class="form-control" id="apttime" name="apttime" required="true">
              </div>
							<div class="form-group">
								<label for="exampleInputFile">Prescription(if any)</label>
								<input type="file" id="pres" class="form-control" name="pres">
							</div>
              <div class="form-group">
                <label for="exampleInputFile" style="color: red" required="true">Select Test</label>
                <table class="table table-bordered"> <thead> <tr> <th>#</th> <th>Test Name</th> <th>Test Price</th> <th>Select</th> </tr> </thead> <tbody>
<?php
$sql="SELECT * from tbllabtest";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

 <tr> 
<th scope="row"><?php echo htmlentities($cnt);?></th> 
<td><?php  echo htmlentities($row->TestTitle);?></td> 
<td><?php  echo htmlentities($row->Price);?></td> 
<td><input type="checkbox" name="tids[]" value="<?php echo htmlentities ($row->ID);?>"></td> 
</tr>   
<?php $cnt=$cnt+1;}} ?> 
<tr>

</tr>

</tbody> </table> 
              </div>
						
							<button type="submit" class="btn btn-primary btn-md" name="submit">Submit</button>

						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->


		</div><!-- .row -->
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
<?php } ?>