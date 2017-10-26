<?php
ob_start();
$con = mysql_connect("localhost","root", "") or die(mysql_error());
	mysql_select_db("powerbox") or die("Cannot select DB");
	
	
    		$username=$_POST['firstName'];
    		$email=$_POST['email'];
    		$comment=$_POST['comment'];
    		$visit_date=date("Y-m-d");

    		$query=mysql_query("INSERT INTO users(UserName,Email,VisitDate,Comment) VALUES('$username','$email','$visit_date','$comment')");

    		
            $numrows=mysql_num_rows($query);

            if($query)
            {
                echo "<br/> New user has been successfully added to database!";

            }
            else
            {
                 echo "<br/> Sending Error!!";
            }
            header("Location: /index.html");
            ob_end_clean();
?>