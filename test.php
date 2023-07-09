<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div>
    <h2>liste of abonne</h2>
    <a href="./creat.php" role="button">New abonement </a>
    <br>

    <table>
        <thead>
            <tr>
                <th>numab</th>
                <th>nom</th>
                <th>prénom</th>
                <th>département </th>
                <th>adrreese</th>
            </tr>
        </thead>
    <tbody>
    <?php
  
  
$username="root";
$pasword="the first";
$dbName="biblio";
$nomdomain="localhost";
$con=mysqli_connect($nomdomain,$username,$pasword,$dbName);
if(mysqli_connect_errno()){
  echo"failed conection";
  exit();
}
echo"conection secses";
$sql="SELECT  * from abonné";
$result=$con-> query($sql);
while($row=$result->fetch_assoc()) {
  echo"
  <tr>
  <td>$row[numab]</td>
  <td>$row[nom]</td>
  <td>$row[prénom]</td>
  <td>$row[département]</td>
  <td>$row[adresse]</td>
  <td>
  <a href='./Edit.php?numab=$row[numab]'>Edit</a>
  <a href='./Delet.php?numab=$row[numab]'>Delet</a>
</td>
  </tr> ";
  
}

  ?>
     
    </tbody>
    </table>
        
</div>
    <?php
  
    //for string
    //$name="string boy";
    //echo str_replace("string","BOOL",$name);to replace
    //echo substr($name,7,2);//to delet 
    //echo"mike"[0];
  //$name[0]="b";
  //for number
  //echo 4%4;
  //echo (4+6)*7;
  //$a--;or increase
 // $a=$a+25;
  //$a+=25;or minless
  //echo abs(-100); la valeure absolue
  //echo pow(3,2);power
  //echo sqrt(144);
  //echo max(2,10);
//echo min(3,5);
//echo round(3.5);
//echo ceil(3.3);
//echo floor(3.9);
//get input from users with form

    ?>
    
     <form action="test.php" methode="get">
        Name: <input type="text" name="username">
        <br>
        Age: <input type="number" name="age">
        <input type="submit">
    </form>
    <br>
   your name is  <?php echo $_GET["username"]?>
   <br>
   your age is  <?php echo $_GET["age"]?> 
    
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Abonné</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List of Abonné</h2>
        <a href="./creat.php" role="button" class="btn btn-primary">New Abonnement</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>numab</th>
                    <th>nom</th>
                    <th>prénom</th>
                    <th>département</th>
                    <th>adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $username = "root";
                $password = "the first";
                $dbName = "biblio";
                $nomdomain = "localhost";
                $con = mysqli_connect($nomdomain, $username, $password, $dbName);
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                $sql = "SELECT * from abonné";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[numab]</td>
                        <td>$row[nom]</td>
                        <td>$row[prénom]</td>
                        <td>$row[département]</td>
                        <td>$row[adresse]</td>
                        <td>
                            <a href='./Edit.php?numab=$row[numab]' class='btn btn-primary'>Edit</a>
                            <a href='./Delet.php?numab=$row[numab]' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

