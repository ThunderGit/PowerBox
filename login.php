<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: admin.php");
}

if(isset($_POST["login"])){

  if(!empty($_POST['adminname']) && !empty($_POST['password'])) {
    $username=$_POST['adminname'];
    $password=$_POST['password'];

    $query =mysql_query("SELECT * FROM admins WHERE login='".$username."' AND password='".$password."'");

    $numrows=mysql_num_rows($query);
    if($numrows!=0)
    {
    	while($row=mysql_fetch_assoc($query))
    	{
    		$dbusername=$row['login'];
    		$dbpassword=$row['password'];
    	}

    	if($username == $dbusername && $password == $dbpassword)
    	{

   		 	$_SESSION['session_username']=$username;

    		/* Redirect browser */
    		header("Location: admin.php");
    	}
    } 
    else 
    {
 		$message =  "Invalid login or password!";
    }

 }
 else 
	{
    	$message = "All fields are required!";
	}
}
?>

    <div class="container mlogin">
            <div id="login">
    <h1>SIGN IN</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Login<br />
        <input type="text" name="adminname" id="username"  class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Password<br />
        <input type="password" name="password" id="password"  class="input" value="" size="20" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Sign In" />
    </p>
</form>

    </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
    