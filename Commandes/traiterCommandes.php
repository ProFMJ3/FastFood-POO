

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FASTFOOD</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


</head>

<body>
<header style="background-color: green">
    <nav class="navbar navbar-expand-lg" >
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">FASTFOOD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    <a class="nav-link" href="../menu/listeMenu.php">Menus</a>
                    <a class="nav-link" href="../clients/listeClients.php">Clients</a>
                    <a class="nav-link" href="listeCommandes.php" >Commandes</a>
                </div>
            </div>
        </div>
    </nav>


</header>


<div style="text-align: center;"> <h1> COMMANDE AJOUTE </h1> </div>


<p></p>

<a type="button" class="btn btn-success" href="listeCommandes.php">Liste des Commandes</a>

<p></p>

<div>
    <?php

    $nom = "";
    $menu = "";
    $date = "";
    $prix = "";


    if(isset($_POST["nom"])){
        $nom = $_POST["nom"];
    }
    if(isset($_POST["menu"])){
        $menu = $_POST["menu"];
    }
    if(isset($_POST["date"])){
        $date = $_POST["date"];
    }
    if(isset($_POST["prix"])){
        $prix = $_POST["prix"];
    }


    echo 'Client:    '. $nom .'<br/>';
    echo 'Menu:    ' . $menu .'<br/>';
    echo 'Date:    '. $date .'<br/>';
    echo 'Prix:    '. $prix .'<br/>';



    ?>
</div>
</body>
</html>
