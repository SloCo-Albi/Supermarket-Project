<?
// WE REALLY WANT
// SELECT p.Description, s.Description, b.Brand_Description, c.Price
// FROM Products p, Supermarket s, Brand b, Prices c
// WHERE
// (p.Product_ID = 2 OR p.Product_ID = 3)
//AND
//(s.Supermarket_ID = 1 OR s.Supermarket_ID = 3)
//AND
//(p.Product_ID = c.Product_ID)
//AND
//(s.Supermarket_ID = c.Supermarket_ID)
//AND
//(b.Brand_ID = p.Brand_ID)

// WE WANT SELECT * FROM PRICES WHERE (Product_ID = 2 OR Product_ID = 3)
$Product = $_GET["product"];
  if($Product == true){
	$Product_query = $Product;    
    //echo $Product_query . "<br>";
    }

// WE WANT $Product_queryadd + (Supermarket_ID = 1 OR Supermarket_ID = 3)
$Supermarket_query = "";

$Supermarket_ID1 = $_GET["ID1"];
$Supermarket_ID2 = $_GET["ID2"];
$Supermarket_ID3 = $_GET["ID3"];
$Supermarket_ID4 = $_GET["ID4"];
$Supermarket_ID5 = $_GET["ID5"];
 
if ($Supermarket_ID1 == true) {
    //echo "There is an ID1";
    $Supermarket_query = "s.Supermarket_ID = 1";
}
    if ($Supermarket_ID2 == true) {
    //echo "There is an ID2";
        if ($Supermarket_query == true){
            $Supermarket_query = $Supermarket_query . " OR ";
        }
        $Supermarket_query = $Supermarket_query . "s.Supermarket_ID = 2";
}
    if ($Supermarket_ID3 == true) {
    //echo "There is an ID3";
        if ($Supermarket_query == true){
            $Supermarket_query = $Supermarket_query . " OR ";
        }
        $Supermarket_query = $Supermarket_query . "s.Supermarket_ID = 3";
}
    if ($Supermarket_ID4 == true) {
    //echo "There is an ID4";
        if ($Supermarket_query == true){
            $Supermarket_query = $Supermarket_query . " OR ";
        }
        $Supermarket_query = $Supermarket_query . "s.Supermarket_ID = 4";
}
    if ($Supermarket_ID5 == true) {
    //echo "There is an ID5";
        if ($Supermarket_query == true){
            $Supermarket_query = $Supermarket_query . " OR ";
        }
        $Supermarket_query = $Supermarket_query . "s.Supermarket_ID = 5";
}

$Supermarket_query = "(" . $Supermarket_query . ")";
$Prices_query = "
SELECT s.Description sd
       ,sum(c.Price) 
  FROM Products p
     , Supermarket s
     , Brand b
     , Prices c 
 WHERE " . $Product_query . " 
   AND " . $Supermarket_query . " 
   AND p.Product_ID = c.Product_ID
   AND s.Supermarket_ID = c.Supermarket_ID
   AND b.Brand_ID = p.Brand_ID
Group By sd
 ORDER 
    BY sd ";
    //echo "<br>" . $Prices_query; 

$host="localhost"; // 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="IA_Dev Genie"; // Database name 
//$tbl_name="Prices"; // Table name

// Connect to server and select databse.
$con = mysqli_connect($host,$username,$password,$db_name);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql=$Prices_query;

$result=mysqli_query($con,$sql);

if ( false===$result ) {
  //printf("error: %s\n", mysqli_error($con));
}
else {
 //printf ('Connected. %s',$sql);
}
?>

<table border=1>
<th>Supermarket</th><th>Price</th>
<?    
while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<tr>
<td><? echo $rows['sd']; ?></td>
<td><? echo $rows['Price']; ?></td>    
</tr>
    
<p><? echo $rows['sd']; ?></p>

<?
// Exit looping and close connection 
}
mysqli_close($con);
?>
</table>





