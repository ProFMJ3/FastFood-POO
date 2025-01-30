<?php
    try{
        $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf-8;', 'root','Jules1012#');

        echo("Connexion réussie");

        if (isset($_POST['nom'])){
            $nom = $_POST['nom'];
            
            $sql = $connexion->prepare("SELECT * FROM clients WHERE nomClient = ?");
            $sql->execute(array($nom));

        }
        else{
            $sql = $connexion->query("SELECT * FROM clients ");

        }
//        $nom = isset($_POST['nom'])? $_POST['nom']:null;

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>FASTFOOD</title>
    <style>
        .btn{
            margin-top: 30px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body style="background-image: url('../assets/img/a.jpg');" >
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
                    <a class="nav-link" href="../menus/listeMenu.php">Menus</a>
                    <a class="nav-link" href="#">Clients</a>
                    <a class="nav-link" href="../Commandes/listeCommandes.php" >Commandes</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<a class="btn btn-success" href="ajoutClient.php">Ajouter client</a>
<div class="d-flex " >
    <form action="" method="POST">
        <label for="nom" class="fw-bold " style="color: white; font-size: 25px ;font-weight: bold;" >Filtrer par prix</label>
        <input class="form-control-lg "  type="text" name="nom" id="nom">
        <button type="submit" class="btn btn-success">Recherher</button>
    </form>
</div>

    <h1 style="background-color: white" >LISTE DES MENUS</h1>




    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOM</th>
            <th scope="col">PRENOMS</th>
            <th scope="col">ADRESSE</th>
            <th scope="col">TELEPHONE</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>

        <?php

            while ($client = $sql->fetch())
            {
        ?>

            <tr>
                <td><?php echo $client['clientId']; ?> </td>
                <td><?php echo $client['nomClient']; ?> </td>
                <td><?php echo $client["prenomsClient"];?></td>
                <td><?php echo $client['telephone'];?> </td>
                <td><?php echo $client['adresse'];?></td>

                <td>
                    <a class="btn btn-warning" href="modifierClient.php?clientId= <?= $client['clientId'];?>" role="button"><i class="fas fa-edit"></i> Modifier</a>
                    <a class="btn btn-danger" href="supClient.php?clientId=<?php echo $client['clientId'];?>" onclick="return confirmationSup();" role="button"><i class="fas fa-trash"></i> Supprimer</a>
                </td>
            </tr>

            <?php
               }
            ?>


        </tbody>
    </table>
</div>

<script src="../assets/js/bootstrap.min.js" ></script>

<script>
    function confirmationSup(){
        return confirm('Confirmer la suppression ?');
    }
</script>

</body>
</html>