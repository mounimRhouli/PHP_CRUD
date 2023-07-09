<?php
$username="root";
$pasword="the first";
$dbName="biblio";
$nomdomain="localhost";
$con=new mysqli($nomdomain,$username,$pasword,$dbName);

$numab="";
$nom="";
$prenom="";
$departement="";
$adresse="";
$ErroreMessage="";
$SecessMesage="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
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
        
        // add to   database
        $sql="INSERT INTO abonné(numab,nom,prénom,département,adresse)" 
        ."VALUES ('$numab', '$nom','$prenom','$departement','$adresse')";
        $res=$con->query($sql);
        if(!$res){
            $ErroreMessage="Invalide query: ".$con->error;
            break;  
        }
        $numab="";
        $nom="";
        $prenom="";
        $departement="";
        $adresse="";
        $SecessMesage="Abonement Added Correctly";
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
    <title>MY aonement </title>
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
        <h2>New Abonment</h2>
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
            <div>
                <label for="">Numab</label>
                <div>
                    <input type="text" name="Numab" value="<?php echo $numab?>">
                </div>
            </div>
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

