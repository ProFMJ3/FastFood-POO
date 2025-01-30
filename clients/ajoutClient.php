<?php
include_once ('Clients.php');

try{

    //echo("Connexion réussie");
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $tel = htmlspecialchars($_POST['telephone']);
        $adresse = htmlspecialchars($_POST['adresse']);


        $client = new Clients($nom, $prenom, $tel, $adresse);
        $client->ajouterClient();

        if ($client) {
            echo($nom . " a été ajouté avec succès");
            header("Location: listeClients.php");
            exit();
        }
    }


} catch (Exception $e){
    echo ("Une erreur s'est produite !!!");
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
    <link rel="stylesheet" href="../menu/style.css">

    <title>ajoutClients</title>
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
            font-weight:bold;
        }

        label, option{
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight:bold;
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


        .btn{
            margin-top: 50px;
        }
        .btn:hover{
            background-color: green;
        }
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
                    <a class="nav-link" href="../menus/listeMenu.php">Menus</a>
                    <a class="nav-link" href="listeClients.php">Clients</a>
                    <a class="nav-link" href="../Commandes/listeCommandes.php" >Commandes</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<a href="listeClients.php" class="btn btn-success">Listes de Clients</a>

<div class="content">
    <h2>Ajout Client</h2>
    <form action="" method="POST">

        <div>
            <label for="nom">Nom du Client</label>
            <input type="text" name="nom" id="nom" placeholder="Entrer le nom du menu" required>
        </div>
        <div>
            <label for="prenom">Prénoms</label>
            <input type="text" name="prenom" id="prenom" placeholder="Entrer le contenu du menu" required>

        </div>

        <div>
            <label for="telephone">Telephone</label>
            <input type="tel" id="telephone" name="telephone" placeholder="Entrer le numéro de telephone" required >

        </div>
        <div>
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" placeholder="Entrer adresse du client">

        </div>

        <div class="center">
            <button type="submit" >Ajouter</button>

        </div>


        </div>
    </form>

</div>



<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>