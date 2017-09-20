
<?
$Product_ID1 = $_GET["ID1"];
$Product_ID2 = $_GET["ID2"];
$Product_ID3 = $_GET["ID3"];
$Product_ID4 = $_GET["ID4"];
$Product_ID5 = $_GET["ID5"];
    $Product_query = "(";
    $Product_queryadd = "";
    
if ($Product_ID1 == true) {
    //echo "There is an ID1";
    $Product_queryadd = "p.Product_ID = 1";
}
    if ($Product_ID2 == true) {
    //echo "There is an ID2";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "p.Product_ID = 2";
}
    if ($Product_ID3 == true) {
    //echo "There is an ID3";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "p.Product_ID = 3";
}
    if ($Product_ID4 == true) {
    //echo "There is an ID4";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "p.Product_ID = 4";
}
    if ($Product_ID5 == true) {
    //echo "There is an ID5";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "p.Product_ID = 5";
}
$Product_query = $Product_query . $Product_queryadd . ")";
    //echo $Product_query;

$host="localhost"; // 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="IA_Dev Genie"; // Database name 
$tbl_name="Supermarket"; // Table name

// Connect to server and select databse.
$con = mysqli_connect($host,$username,$password,$db_name);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM Supermarket";

$result=mysqli_query($con,$sql);

if ( false===$result ) {
  //printf("error: %s\n", mysqli_error($con));
}
else {
 //printf ('Connected. %s',$sql);
}
?>

<html>
<form action="Prices.php" method="get" target="prices">
<input type='hidden' name='product' value='<? echo $Product_query; ?>'>
<table>
<?    
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<tr><td><? echo $rows['Description']; ?></td><td><input type="checkbox" name="ID<? echo $rows['Supermarket_ID']; ?>" value="<? echo $rows['Supermarket_ID']; ?>"></td></tr>
    
<?php
// Exit looping and close connection 
}
//mysqli_close($con);
?>
    
</table>
        
    <input type="submit" name="Go" value="Go">
       </form>


</html>