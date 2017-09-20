<html>
<body>

<?php
    $Product_ID1 = $_GET["ID1"];
$Product_ID2 = $_GET["ID2"];
$Product_ID3 = $_GET["ID3"];
$Product_ID4 = $_GET["ID4"];
$Product_ID5 = $_GET["ID5"];
    $Product_query = "SELECT * FROM Products WHERE ";
    $Product_queryadd = "";
    
if ($Product_ID1 == true) {
    //echo "There is an ID1";
    $Product_queryadd = "Product_ID = 1";
}
    if ($Product_ID2 == true) {
    //echo "There is an ID2";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "Product_ID = 2";
}
    if ($Product_ID3 == true) {
    //echo "There is an ID3";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "Product_ID = 3";
}
    if ($Product_ID4 == true) {
    //echo "There is an ID4";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "Product_ID = 4";
}
    if ($Product_ID5 == true) {
    //echo "There is an ID5";
        if ($Product_queryadd == true){
            $Product_queryadd = $Product_queryadd . " OR ";
        }
        $Product_queryadd = $Product_queryadd . "Product_ID = 5";
}
$Product_query = $Product_query . $Product_queryadd;
    //echo $Product_query;
    
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

$Product_result=mysqli_query($con,$Product_query);

if ( false===$Product_result ) {
  //printf("error: %s\n", mysqli_error($con));
}
else {
 //printf ('Connected. %s',$sql);
}
    ?>
    <html>

        <table>
<?    
while($rows=mysqli_fetch_array($Product_result,MYSQLI_ASSOC)){
?>
<tr><td><? echo $rows['Description']; ?></td><td><? echo $rows['Product_ID']; ?></td></tr>
    
<?
// Exit looping and close connection 
}
mysqli_close($con);
?>
    
</table>
</html>