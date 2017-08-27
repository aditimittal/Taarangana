<html>
<?php
$mysql_host='localhost';
$mysql_user='root';


if(!mysql_connect($mysql_host,$mysql_user)||!mysql_select_db('TaaranganaWeb'))
{
	die('cannot connect database');
}
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['mobile'])&&isset($_POST['institution'])&&isset($_POST['year']))
{
	if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['mobile'])&&!empty($_POST['institution'])&&!empty($_POST['year']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
 		$mobile=$_POST['mobile'];
 		$institution=$_POST['institution'];
 		$year=$_POST['year'];
 		
    	if(!preg_match('/^[0-9]{10}$/', $_POST['mobile']))
    	{
      		$error = 'Invalid Number!';
      		echo $error;
    	}
    	if(!preg_match('/^[1-4]{1}$/', $_POST['year']))
    	{
      		$error = 'Invalid Year!';
      		echo $error;
    	}
  		else
  		{
		// attempt insert query execution
			$sql = "insert into Taarangana (name,email,mobile,institution,year) VALUES ('$name', '$email','$mobile','$institution','$year')";
			if(mysql_query($sql))
			{	$sql2="select * from Taarangana where Name='$name'";
    			$result = mysql_query($sql2) or die($sql2."<br/><br/>".mysql_error());
    			$row = mysql_fetch_array($result);

	   
	  				echo "<div style ='font:21px;color:#FFFFFF;'>Successfully signed up. Your inique id is=". $row['userid']."</div>" ;


			} 
			else
			{
    			die('error');
			}
		}
	}
}
else
{
	echo 'Enter values';
}
// close connection
mysql_close();
?>
<body background="polygons.jpg">
</body>
</html>