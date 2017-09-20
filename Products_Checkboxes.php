<?
$host="localhost"; // 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="IA_Dev Genie"; // Database name 
$tbl_name="Products"; // Table name

// Connect to server and select databse.
$con = mysqli_connect($host,$username,$password,$db_name);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM Products";

$result=mysqli_query($con,$sql);

if ( false===$result ) {
  //printf("error: %s\n", mysqli_error($con));
}
else {
 //printf ('Connected. %s',$sql);
}
?>

<html>
<form action="Supermarket_Checkboxes.php" method="get" target="supermarket">
<table>
<?    
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<tr><td><? echo $rows['Description']; ?></td><td><input type="checkbox" name="ID<? echo $rows['Product_ID']; ?>" value="<? echo $rows['Product_ID']; ?>"></td></tr>
    
<?php
// Exit looping and close connection 
}
mysqli_close($con);
?>
    
</table>
        
    <input type="submit" name="Go" value="Go">
       </form>


</html>