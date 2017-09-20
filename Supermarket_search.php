<html>
<body>

<?php
    $Supermarket_ID1 = $_GET["ID1"];
$Supermarket_ID2 = $_GET["ID2"];
$Supermarket_ID3 = $_GET["ID3"];
$Supermarket_ID4 = $_GET["ID4"];
$Supermarket_ID5 = $_GET["ID5"];
    $Supermarket_query = "SELECT * FROM Supermarket WHERE ";
    $Supermarket_queryadd = "";
    
if ($Supermarket_ID1 == true) {
    //echo "There is an ID1";
    $Supermarket_queryadd = "Supermarket_ID = 1";
}
    if ($Supermarket_ID2 == true) {
    //echo "There is an ID2";
        if ($Supermarket_queryadd == true){
            $Supermarket_queryadd = $Supermarket_queryadd . " OR ";
        }
        $Supermarket_queryadd = $Supermarket_queryadd . "Supermarket_ID = 2";
}
    if ($Supermarket_ID3 == true) {
    //echo "There is an ID3";
        if ($Supermarket_queryadd == true){
            $Supermarket_queryadd = $Supermarket_queryadd . " OR ";
        }
        $Supermarket_queryadd = $Supermarket_queryadd . "Supermarket_ID = 3";
}
    if ($Supermarket_ID4 == true) {
    //echo "There is an ID4";
        if ($Supermarket_queryadd == true){
            $Supermarket_queryadd = $Supermarket_queryadd . " OR ";
        }
        $Supermarket_queryadd = $Supermarket_queryadd . "Supermarket_ID = 4";
}
    if ($Supermarket_ID5 == true) {
    //echo "There is an ID5";
        if ($Supermarket_queryadd == true){
            $Supermarket_queryadd = $Supermarket_queryadd . " OR ";
        }
        $Supermarket_queryadd = $Supermarket_queryadd . "Supermarket_ID = 5";
}
$Supermarket_query = $Supermarket_query . $Supermarket_queryadd;
    //echo $Supermarket_query;
    
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

$Supermarket_result=mysqli_query($con,$Supermarket_query);

if ( false===$Supermarket_result ) {
  //printf("error: %s\n", mysqli_error($con));
}
else {
 //printf ('Connected. %s',$sql);
}
    ?>
    <html>

        <table>
<?    
while($rows=mysqli_fetch_array($Supermarket_result,MYSQLI_ASSOC)){
?>
<tr><td><? echo $rows['Description']; ?></td><td><? echo $rows['Supermarket_ID']; ?></td></tr>
    
<?
// Exit looping and close connection 
}
mysqli_close($con);
?>
    
</table>
        

</html>