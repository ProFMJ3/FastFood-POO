
<?php
try{
    $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf-8;', 'root','Jules1012#');

    //echo("Connexion réussie");
    if(isset($_GET["clientId"])) {
        $clientId = $_GET["clientId"];

        $sql = $connexion->prepare("SELECT nomClient, prenomsClient, telephone, adresse FROM clients WHERE clientId = ?");
        $sql->execute(array($clientId));

        $client = $sql->fetch();
        if ($client) {
            $nom = $client["nomClient"];
            $prenom = $client["prenomsClient"];
            $tel = $client['telephone'];
            $adresse = $client["adresse"];


        } else {
            echo('Menu intriouvable');
            exit();
        }
    }else{
        echo('Id de ménu est introuvable');
        exit();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nnom = htmlspecialchars($_POST['nom']);
        $nprenom = htmlspecialchars($_POST['prenom']);
        $ntel = htmlspecialchars($_POST['telephone']);
        $nadresse = htmlspecialchars(($_POST['adresse']));

        $sql1 = $connexion->prepare("UPDATE clients SET nomClient = :nnom, prenomsClient = :npre, telephone = :ntel, adresse = :nad WHERE clientId = :clientId");
        $sql1->execute(array(
            'nnom'=>$nnom,
            'npre'=>$nprenom,
            'ntel'=>$ntel,
            'nad'=>$nadresse,
            'clientId'=>$clientId,
        ));

        echo ($nnom ." a été modifié avec succès");
        header("Location: listeClients.php");
        exit();

    };

}catch(Exception $e){
    echo("Une erreur s'est produite !!!".$e->getMessage());
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <title>FASTFOOD</title>
    <style>

        body {
            font-family: "Times New Roman", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            margin-top: 0;
            color: green;
            font-weigth:bold;
        }

        label, option{
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button{
            background-color: green;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;

        }

        button:hover {
            background-color: greenyellow;
        }
        .center{
            display:flex;
            text-align:center;
            justify-content: center;
        }

        /*p {*/
        /*    color: red;*/
        /*    font-weight: bold;*/
        /*}*/

    </style>
</head>
<body>

<header style="background-color: green; width: 100%" >

    <nav class="navbar navbar-expand-lg" >
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">FASTFOOD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    <a class="nav-link" href="listeMenu.php">Menus</a>
                    <a class="nav-link" href="../clients/listeClients.php">Clients</a>
                    <a class="nav-link" href="../Commandes/listeCommandes.php" >Commandes</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="content" >
    <h2 class="center" >Ajout du menu</h2>
    <form action="" method="POST">

        <div>

            <label for="nom">Nom du client : </label>
            <input type="text" name="nom" id="nom" value="<?= $nom; ?>" placeholder="Entrer le nom du menu">
        </div>

        <div>
            <label for="prenom">Prénoms du client : </label>
            <input type="text" name="prenom" id="prenom" value="<?= $prenom; ?>" placeholder="Entrer le contenu du menu">
        </div>
        <div>
            <label for="telephone">Telephone</label>
            <input type="tel" id="telephone" name="telephone" value="<?= $tel; ?>" placeholder="Entrer le numéro de telephone" required >

        </div>
        <div>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?= $adresse; ?>" placeholder="Entrer adresse du client">

        </div>

        <div class="center">
            <button type="submit" >Ajouter le menu</button>
        </div>

</div>
</form>

</div>

<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>