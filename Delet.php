
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

if(isset($_GET["numab"]))
{
    $numab=$_GET["numab"];

    $username="root";
    $pasword="the first";
    $dbName="biblio";
    $nomdomain="localhost";

    $con=mysqli_connect($nomdomain,$username,$pasword,$dbName);
    $sql=" DELETE  FROM  abonné WHERE numab=$numab";
    $con->query($sql);
    
}
header("location:./test.php");
exit;
?>





    
</body>
</html>
