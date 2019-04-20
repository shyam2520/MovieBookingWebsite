
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
;?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
  
  <?php
    include('form.php');
    $frm=new formBuilder;      
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Payment</h3>
			<form action="bank.php" method="post" id="form1">
			<div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
			<div class="form-group">
   <label class="control-label">Name on Card</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
   <label class="control-label">Card Number</label>
    <input type="text" class="form-control" name="number" minlength=16 maxlength=16 required title="Enter 16 digit card number">
  
</div>      
<div class="form-group">
   <label class="control-label">Expiration date</label>
    <input type="date" class="form-control" name="date">
</div>
<div class="form-group">
   <label class="control-label">CVV</label>
    <input type="text" class="form-control"minlength=3 maxlength=3  name="cvv">
</div>
<div class="form-group">
    <button class="btn btn-success">Make Payment</button>
    </form>
</div>
</div>
			</div> 
		<div class="clear"></div>	
		
	</div>
<?php include('footer.php');?>
</div>
<?php
    session_start();
    extract($_POST);
    include('config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    header('location:bank.php');
?>
<script>

</script>