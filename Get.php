<?php include("includes/header.php"); ?>
<script>
  function _back()
  {
   var f=document.getElementById('forma');
   f.action="Admin.php";
  }
  </script>

<body>
<form  id="forma" method="POST" >
<input type="submit" style="float:left;" onclick="_back()"class="button" value="Return To Main Page" >
</body>
</form>
<?php
	if(isset($_POST["Users_ALL"]))
    {
    	$conn=mysql_connect("localhost","root", "") or die(mysql_error());
    	mysql_select_db("powerbox") or die("Cannot select DB");

        mysql_query("set character_set_client='cp1251'");  
        mysql_query("set character_set_results='cp1251'"); 
        mysql_query("set collation_connection='cp1251_general_ci'");

        $sql="SELECT * FROM users";
    
    	$query=mysql_query($sql);

    	if($query)
    	{

        	if($result = mysql_query($sql))
        	{
          		if(mysql_num_rows($result) > 0)
          		{
        			echo "<br/> <br/> <table style='text-align:center;background-color:white;width:75%;' border='7' bordercolor='#f78d1d'>";
            		echo "<tr>";

                	echo "<th>ID</th>";
                    echo "<th>UserName</th>";
                    echo "<th>Email</th>";
                    echo "<th>VisitDate</th>";
                    echo "<th>Comment</th>";

            		echo "</tr>";
        			while($row = mysql_fetch_array($result))
            		{
            			echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['UserName'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['VisitDate'] . "</td>";
                    echo "<td>" . $row['Comment'] . "</td>";
            			echo "</tr>";
        			}
        			echo "</table>";
        		// Free result set
        	mysql_free_result($result);
    			} 
    			else
    			{
        			echo "No users found.";
    			}
			} 
			else
			{
    			echo "ERROR: Could not able to execute $sql. " . mysql_error($conn);
			}
     		//echo "<br/><br/> All specified data successfully get from database";
		}
		else
 		{
     	echo "<br/><br/> Get Error!";
 		}
    }
	if(isset($_POST["Users_DATE"]))
    {
    	$visit_date=$_POST["VISIT_DATE"];

    	$conn=mysql_connect("localhost","root", "") or die(mysql_error());
    	
    	mysql_select_db("powerbox") or die("Cannot select DB");
        
        $sql="SELECT * FROM users where VisitDate='".$visit_date."' ";
    
    	$query=mysql_query($sql);

    	if($query)
    	{

        	if($result = mysql_query($sql))
        	{
          		if(mysql_num_rows($result) > 0)
          		{
        			echo "<br/> <br/> <table style='text-align:center;background-color:white;width:75%;' border='7' bordercolor='#f78d1d'>";
            		echo "<tr>";

                	echo "<th>ID</th>";
                	echo "<th>UserName</th>";
                	echo "<th>Email</th>";
					echo "<th>VisitDate</th>";
                    echo "<th>Comment</th>";

            		echo "</tr>";
        			while($row = mysql_fetch_array($result))
            		{
            			echo "<tr>";
                	echo "<td>" . $row['ID'] . "</td>";
                	echo "<td>" . $row['UserName'] . "</td>";
                	echo "<td>" . $row['Email'] . "</td>";
                	echo "<td>" . $row['VisitDate'] . "</td>";
                    echo "<td>" . $row['Comment'] . "</td>";
            			echo "</tr>";
        			}
        			echo "</table>";
        		// Free result set
        	mysql_free_result($result);
    			} 
    			else
    			{
        			echo "No users matching querry found.";
    			}
			} 
			else
			{
    			echo "ERROR: Could not able to execute $sql. " . mysql_error($conn);
			}
     		//echo "<br/><br/> All specified data successfully get from database";
		}
		else
 		{
     	echo "<br/><br/> Get Error!";
 		}
    }
?>
<?php include("includes/footer.php"); ?>