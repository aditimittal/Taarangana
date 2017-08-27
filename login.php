<html>
<?php
  $mysql_host='localhost';
$mysql_user='root';
$con = mysql_connect("localhost","root","");
$email = $_POST['email'];
$userid = $_POST['userid'];
if(! $con)
{
    die('Connection Failed'.mysql_error());
}
   mysql_select_db("TaaranganaWeb",$con);
$sql2="select * from Taarangana where Email = '$email' and userid='$userid'";
$result = mysql_query($sql2) or die($sql2."<br/><br/>".mysql_error());

$row = mysql_fetch_array($result);

if($row['Email']==$email && $row['userid']==$userid)
{
    echo"<div style ='color:#FFFFFF;'>Name: ".$row['Name']."<br>E-Mail:".$row['Email']."<br>ID:".$row['userid']."<br>Mobile:".$row['Mobile']."<br>Institution:".$row['Institution']."<br>Year:".$row['Year']."</div>";
  }
  
else
    echo"<div style ='color:#FFFFFF;'>Sorry, your credentials are not valid, Please try again.</div>";
?>
<body background="polygons.jpg">
</body>
</html>