
<?php
//try{
    $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf8;', 'root','Jules1012#');

    //echo("Connexion réussie");
    if(isset($_GET["commandeId"])) {
        $commandeId = $_GET["commandeId"];
        $nomMenu = $_GET["nomMenu"];
        $client =$_GET["client"];
        
        $sql = $connexion->prepare("SELECT quantite, prixTotal, dateCommande, menuId, clientId FROM commandes WHERE commandeId = ?");
        $sql->execute(array($commandeId));

        $cm = $sql->fetch();
        if ($cm) {
            $qte = $cm["quantite"];
            $prix = $cm["prixTotal"];
            $dt = $cm['dateCommande'];
            $mn = $cm["menuId"];
            $cl = $cm['clientId'];





        } else {
            echo('introuvable');
            exit();
        }
    }else{
        echo('Id est introuvable');
        exit();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nqte = htmlspecialchars($_POST['quantite']);
        $nprix = htmlspecialchars($_POST['prixTotal']);
        $ndt = $_POST['dateCommande'];
        $nmn = htmlspecialchars(($_POST['menu']));
        $ncl = htmlspecialchars(($_POST['client']));

        $sql1 = $connexion->prepare("UPDATE commandes SET quantite=:qt, prixTotal=:p, dateCommande=:d, menuId=:m, clientId=:c  WHERE commandeId = :cId");
        $sql1->execute(array(
            'qt'=>$nqte,
            'p'=>$nprix,
            'd'=>$ndt,
            'm'=>$nmn,
            'c'=>$ncl,
            'cId'=>$commandeId,
        ));
        if($sql1) {
            //echo ($nnom ." a été modifié avec succès");
            header("Location: listeCommandes.php");
            exit();
        }

    }

//}catch(Exception $e){
//    echo("Une erreur s'est produite !!!".$e->getMessage());
//}


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <title>ajoutClients</title>
    <style>

        body {
            font-family: "Times New Roman", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 550px;
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
                    <a class="nav-link" href="../clients/listeClients.php">Clients</a>
                    <a class="nav-link" href="../Commandes/listeCommandes.php" >Commandes</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<a href="listeCommandes.php" class="btn btn-success">Listes de commandes</a>

<div class="content">
    <h2>MODIFICATION COMMANDE</h2>
    <form action="" method="POST">

        <div>
            <label for="menu">Menu</label>
            <select name="menu" id="menu" required>


                <option value="<?php echo($mn);?>" selected><?=$nomMenu;?></option>
                <?php
                $sqlMenu = $connexion->prepare("SELECT menuId, nomMenu FROM menus");

                if($sqlMenu->execute()){
                    ?>
                    <?php
                    while ($menu = $sqlMenu->fetch())
                    {
                        ?>

                        <option value="<?=htmlspecialchars($menu['menuId']); ?>" <?= $menu['nomMenu'];?> > <?php echo(htmlspecialchars($menu['nomMenu'])); ?> </option>

                        <?php
                    } ;
                }


                ?>

            </select>

        </div>
        <div>


            <label for="client">Nom du Client</label>
            <select name="client" id="client">

                <option value="<?php echo($cl);?>" selected><?=$client;?></option>
                <?php
                $sqlClient = $connexion->prepare("SELECT clientId, CONCAT(nomClient,' ', prenomsClient) AS nomComplet FROM clients");

                if($sqlClient->execute()){
                    ?>
                    <?php
                    while ($client = $sqlClient->fetch(PDO::FETCH_ASSOC))
                    {
                        $nc = $client['nomComplet'];
                        ?>

                        <option value="<?=htmlspecialchars(($client['clientId']));?>"> <?= htmlspecialchars($nc); ?> </option>

                        <?php
                    } ;
                }


                ?>


            </select>
            <!--            <input type="text" name="nom" id="nom" placeholder="Entrer le nom du menu" required>-->
        </div>


        <div>
            <label for="quantite">Quantité acheté</label>
            <input type="number" id="quantite" name="quantite"  value="<?= $qte;?>" required>

        </div>
        <div>
            <label for="prixTotal">Total</label>
            <input type="number" name="prixTotal" id="prixTotal" value="<?= $prix;?>"  required>

        </div>

        <div>
            <label for="date">Date</label>
            <input type="datetime-local" id="dateCommande" name="dateCommande" value="<?= $dt;?>"  required>

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