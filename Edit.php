<?php 
$username="root";
$pasword="the first";
$dbName="biblio";
$nomdomain="localhost";
//creat conection
$con=new mysqli($nomdomain,$username,$pasword,$dbName);

$numab="";
$nom="";
$prenom="";
$departement="";
$adresse="";
$ErroreMessage="";
$SecessMesage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    //get methode:show data of abonment 
    if(!isset($_GET["numab"])){
        header("location:./test.php");
        exit;
    }
    $numab=$_GET["numab"];
    //read the the row of data of selected abinment
    $sql="SELECT * from  abonné where numab=$numab"  ;
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    if(!$row){
        header("location:./test.php");
        exit;
    }
    $numab=$row["numab"];
    $nom=$row["nom"];
    $prenom=$row["prénom"];
    $departement=$row["département"];
    $adresse=$row["adresse"];
}
else{
    // POSt methode:Update data  of the abonement
    $numab=$_POST["Numab"];
    $nom=$_POST["Nom"];
    $prenom=$_POST["Prenom"];
    $departement=$_POST["Departement"];
    $adresse=$_POST["Adresse"];
    do{
        if(empty($numab) || empty($nom) || empty($prenom) || empty($departement) || empty($adresse))
        {
            $ErroreMessage="All the files are required";
            break;
        }
        $sql="UPDATE abonné ". 
        "SET nom='$nom',prénom='$prenom',département= '$departement',adresse='$adresse'" . 
        "WHERE numab= $numab ";
        $result=$con->query($sql);
        if(!$result){
            $ErroreMessage="Invalidate query" .$con->error;
            break;
        }
        $SecessMesage="Client Update Corectly";
       header("location:./test.php");
       exit;


    }while (false);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update </title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    button {
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f44336;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    a:hover {
        background-color: #d32f2f;
    }

    .alert {
        padding: 10px;
        background-color: #f44336;
        color: #fff;
        margin-bottom: 10px;
        border-radius: 4px;
    }

    .alert button {
        float: right;
        background-color: transparent;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .alert button:focus,
    .alert button:hover {
        color: #ccc;
    }
</style>

</head>
<body>
    <div class="container my-5">    
        <h2>Update your acount</h2>
        <?php 
        if(!empty($ErroreMessage)){
            echo"
            <div>
            <strong>$ErroreMessage</strong>
            <button onclick='closeMessage(this)'>Close</button>
        </div> ";
        }
        ?>
        
        <form action="" method="post">
            <input type="hidden" name="Numab" value="<?php echo $numab ?>">
            
            <div>
                <label for="">Nom</label>
                <div>
                    <input type="text" name="Nom" value="<?php echo $nom ?>">
                </div>
            </div>
            <div>
                <label for="">Prenom</label>
                <div>
                    <input type="text" name="Prenom" value="<?php echo $prenom ?>">
                </div>
            </div>
            <div>
                <label for="">Departement</label>
                <div>
                    <input type="text" name="Departement" value="<?php echo $departement ?>">
                </div>
            </div>
            <div>
                <label for="">Adresse</label>
                <div>
                    <input type="text" name="Adresse" value="<?php echo $adresse ?>">
                </div>
            </div>
            <?php 
            if(!empty($SecessMesage)){
                echo"
                <div>
                <strong>$SecessMesage</strong>
                <button onclick='closeMessage(this)'>Close</button>
                </div>";
            }
            ?>
            <div>
                <div>
                    <button type="submit">Submit</button>
                </div>
                <div>
                    <a href="./test.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        function closeMessage(element) {
            element.parentElement.remove();
        }
    </script>
    
</body>
</html>


