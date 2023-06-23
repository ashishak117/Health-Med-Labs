<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    
   $aptno=$_GET['aptno'];
    $ressta="Appointment Cancelled";
    $remark=$_POST['restremark'];
    $canclbyuser=1;
 
    
    $sql="insert into tbltracking(AppointmentNumeber,Remark,Status,OrderCanclledByUser) value(:aptno,:remark,:ressta,:canclbyuser)";$query=$dbh->prepare($sql);
$query->bindParam(':aptno',$aptno,PDO::PARAM_STR); 
    $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
    $query->bindParam(':ressta',$ressta,PDO::PARAM_STR); 
    $query->bindParam(':canclbyuser',$canclbyuser,PDO::PARAM_STR); 
     $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   $sql1= "update   tblappointment set Status=:ressta where AppointmentNumber=:aptno";
   $query1=$dbh->prepare($sql1);
   $query1->bindParam(':aptno',$aptno,PDO::PARAM_STR);
   $query1->bindParam(':ressta',$ressta,PDO::PARAM_STR); 
   $query1->execute();
   echo '<script>alert("Your Appointment has been cancel successfully.")</script>';
  }
   else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
   


  
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Order Appointment</title>
</head>
<body>

<div style="margin-left:50px;">


<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <?php  
$aptno=$_GET['aptno'];
$sql3="select AppointmentNumber,Status from tblappointment where AppointmentNumber=:aptno";
$query2 = $dbh -> prepare($sql3);
$query2-> bindParam(':aptno', $aptno, PDO::PARAM_STR);
$query2->execute();

?>
  <tr align="center">
       <th colspan="4" >Cancel Appointment #<?php echo $aptno;?></th> 
  </tr>
  <tr>
<th>Appointment Number </th>
<th>Current Status </th>
</tr>
<?php 
                foreach($results as $row)
{   ?>
<tr> 
  <td><?php  echo htmlentities($row->AppointmentNumber);?></td> 
   <td><?php  $status=$row->Status;
if($status==""){
  echo "Waiting for confirmation";
} else { 
echo $status;
}
?></td> 
</tr>
<?php 
} ?>

</table>
     <?php if($status=="") {?>
<form method="post">
      <table>
        <tr>
          <th>Reason for Cancel</th>
<td>    <textarea name="restremark" placeholder="" rows="12" cols="50" class="form-control wd-450" required="true"></textarea></td>
        </tr>
<tr>
  <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-primary">Update order</button></td>

</tr>
      </table>

</form>
    <?php } else { ?>
<?php if($status=='Order Cancelled'){?>
<p style="color:red; font-size:20px;"> Order Cancelled</p>
<?php } else { ?>
  <p style="color:red; font-size:20px;"> You can't cancel this. Order is on the way or delivered</p>

<?php }  } ?>
  
</div>

</body>
</html>

     