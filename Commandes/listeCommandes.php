<?php
try{
    $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf-8;', 'root','Jules1012#');

    echo("Connexion réussie");

    $sql = $connexion->query("SELECT commandes.commandeId, commandes.quantite, commandes.prixTotal, commandes.dateCommande, menus.nomMenu, CONCAT(clients.nomClient, '  ' ,clients.prenomsClient) AS client FROM commandes LEFT JOIN menus ON commandes.menuId = menus.menuId LEFT JOIN clients ON commandes.clientId = clients.clientId ");

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

        <title>lISTECOMMANDES</title>
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
                            <a class="nav-link" href="../clients/listeClients.php">Clients</a>
                            <a class="nav-link" href="#" >Commandes</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <a class="btn btn-success" href="ajoutCommandes.php">Ajouter Commandes</a>

        <div>

            <h1 style="background-color: white; text-align : center" >LISTE DES COMMANDES</h1>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope ="col">NOM MENU</th>
                    <th scope="col">QUANTITE</th>
                    <th scope="col">NOM CLIENT</th>
                    <th scope="col">DATE & HEURE</th>
                    <th scope="col">PRIX TOTAL</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    while($commande = $sql->fetch()){
                    ?>

                    <tr>
                        <td><?php echo $commande['commandeId']; ?> </td>
                        <td><?php echo $commande['nomMenu']; ?> </td>
                        <td><?php echo $commande["quantite"];?></td>
                        <td><?php echo $commande["client"]; ?> </td>
                        <td><?php echo $commande['dateCommande']; ?> </td>
                        <td> <?php echo $commande['prixTotal'];?></td>
                        <td>
                            <a class="btn btn-warning " href="modifierCommandes.php?commandeId= <?= $commande['commandeId']; ?>&nomMenu= <?= $commande['nomMenu']; ?>&client= <?= $commande['client']; ?>  " role="button"><i class='fas fa-edit'></i>Modifier</a>
                            <a class="btn btn-danger" href="supCommandes.php?commandeId= <?php echo $commande['commandeId']; ?> " role="button" onclick="return confirmationSup();"><i class='fas fa-trash'></i>Supprimer</a>
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