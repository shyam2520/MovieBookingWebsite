<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
include('config.php');

extract($_POST);

if($otp==$_SESSION['otp'])
{
    $bookid="BKID".rand(1000000,9999999);
    mysqli_query($con,"insert into tbl_bookings values(NULL,'$bookid','".$_SESSION['theatre']."','".$_SESSION['user']."','".$_SESSION['show']."','".$_SESSION['screen']."','".$_SESSION['seats']."','".$_SESSION['amount']."','".$_SESSION['date']."',CURDATE(),'1')");
    $_SESSION['success']="Booking Successfully Completed";
    $email=$_SESSION['email'];
    mail($email,"BOOKING DETAILS","Your booking id is".$bookid." for movie ".$_SESSION['mname']." in theatre ".$_SESSION['theatrename']." with address ".$_SESSION['theatreplace']." for a ".$_SESSION['time']."  show at screen ".$_SESSION['screen']." with number of seats ".$_SESSION['seats']." charging an amount of ".$_SESSION['amount']." for the date ".$_SESSION['date']);
}
else
{
    $_SESSION['error']="Payment Failed";
}
?>
<body><table align='center'><tr><td><STRONG>Transaction is being processed,</STRONG></td></tr><tr><td><font color='blue'>Please wait <i class="fa fa-spinner fa-pulse fa-fw"></i>
<span class="sr-only"></font></td></tr><tr><td>(Please do not press 'Refresh' or 'Back' button )</td></tr></table><h2>
<script>
    setTimeout(function(){ window.location="profile.php"; }, 5000);
</script>