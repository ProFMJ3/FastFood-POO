<?php
include_once ('menus.php');

try{


    //echo("Connexion réussie");
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nom = htmlspecialchars($_POST['nom']);
        $compo = htmlspecialchars($_POST['composition']);
        $cat = htmlspecialchars($_POST['categorie']);
        $prix = floatval(($_POST['prix']));
        $dispo = htmlspecialchars($_POST['disponible']);

        $menu = new menus($nom, $compo, $cat, $prix, $dispo);

        // Appeler la méthode pour ajouter le menu
        $menu->ajouterMenu();
        if ($menu){
            echo ($nom ." a été ajouté avec succès");
            header("Location: listeMenu.php");
            exit();
        }else{
            echo("Une erreur s'est surveu !!!");
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
    <form action="" method="post">

        <div>

            <label for="nom">Nom du ménu : </label>
            <input type="text" name="nom" id="nom" placeholder="Entrer le nom du menu">
        </div>

        <div>
            <label for="composition">Composition du ménu : </label>
            <input type="text" name="composition" id="composition" placeholder="Entrer le contenu du menu">
        </div>

        <div>
            <label for="categorie">Catégorie : </label>
            <select name="categorie" id="categorie" required >
                <option value="" disabled selected>Selectinnez catégorie</option>
                <option value="breakFast">Break Fast</option>
                <option value="Sooper">Sooper</option>
                <option value="Dinner">Dinner</option>
            </select>
        </div>

        <div class="center">
            <label for="composition">Disponible : </label>
            <input type="radio" name="disponible" id="disponible1" value="OUI" >OUI
            <input type="radio" name="disponible" id="disponible2" value="NON" > NON
        </div>

        <div>
            <label for="prix">Prix du ménu : </label>
            <input type="number" name="prix" id="prix" placeholder="Entrer le prix du ménu" required>
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