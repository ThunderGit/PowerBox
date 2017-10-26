<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include("includes/header.php"); ?>
<style>
.input{
	padding:3px 12px;
}
.logout{
	
	float:right;
}

	.admin_button{
border: solid 1px #da7c0c;
    background: #f78d1d;
    background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
    background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
    color: #fff;
padding: 7px 12px;
-webkit-border-radius:4px;
   -moz-border-radius:4px;
        border-radius:4px;
float: left;
margin-right:10px;
cursor: pointer;
}
</style>

<div id="welcome" class="FORM">
 <p ><a class="logout" href="logout.php">Logout</a></p>	
	<h2>Welcome, <span><b><?php echo $_SESSION['session_username'];?> !</b> </span></h2>
	<p >DB Actions</p>
	<form action="Get.php" method="POST">
        <input type="submit" name="Users_ALL" class="admin_button" value="Get all users" />
        <input type="submit" name="Users_DATE" class="admin_button" value="Get users by visit date" />
        <input type="date"   name="VISIT_DATE" class="input" value="" size="10" >
	</form>

	<br/>
	
</div>

<?php include("includes/footer.php"); ?>
	

<?php
}
?>
