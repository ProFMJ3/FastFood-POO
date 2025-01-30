
<?php
    try{
        $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf-8;', 'root','Jules1012#');

        //echo("Connexion réussie");
        if(isset($_GET["menuId"])) {
            $menuId = $_GET["menuId"];

            $sql = $connexion->prepare("SELECT nomMenu, composition, categorie, prix, disponible FROM menus WHERE menuId = ?");
            $sql->execute(array($menuId));

            $menu = $sql->fetch();
            if ($menu) {
                $nom = $menu["nomMenu"];
                $compo = $menu["composition"];
                $cat = $menu['categorie'];
                $prix = $menu["prix"];
                $dispo = $menu["disponible"];

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
                $ncompo = htmlspecialchars($_POST['composition']);
                $ncat = htmlspecialchars($_POST['categorie']);
                $nprix = floatval(($_POST['prix']));
                $ndispo = htmlspecialchars($_POST['disponible']);


                $sql1 = $connexion->prepare("UPDATE menus SET nomMenu = :nnom, composition = :ncompo, categorie = :ncat, prix = :nprix, disponible = :ndispo WHERE menuId = :menuId");
                $sql1->execute(array(
                    'nnom'=>$nnom,
                    'ncompo'=>$ncompo,
                    'ncat'=>$ncat,
                    'nprix'=>$nprix,
                    'ndispo'=>$ndispo,
                    'menuId'=>$menuId,
                ));
                if ($sql1) {
                    echo($nnom . " a été modifié avec succès");
                    header("Location: listeMenu.php");
                    exit();
                }

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
            font-weight:bold;
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
                    <a class="nav-link" href="../GestionMenu/listeMenu.php">Menus</a>
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

            <label for="nom">Nom du menu : </label>
            <input type="text" name="nom" id="nom" value="<?= $nom; ?>" placeholder="Entrer le nom du menu">
        </div>

        <div>
            <label for="composition">Composition du ménu : </label>
            <input type="text" name="composition" id="composition" value="<?= $compo; ?>" placeholder="Entrer le contenu du menu">
        </div>

        <div>
            <label for="categorie">Catégorie : </label>
            <select name="categorie" id="categorie" required >
                <option value="" disabled selected>Selectinnez catégorie</option>
                <option value="breakFast" <?= $cat=='breakFast'?:''; ?> >Break Fast</option>
                <option value="Sooper" <?= $cat=='Sooper'?:''; ?> >Sooper</option>
                <option value="Dinner" <?= $cat=='Dinner'?:''; ?>>Dinner</option>
            </select> 
        </div>


        <div class="center">
            <label for="composi">Disponible : </label>
            <input type="radio" name="disponible" id="disponible1" value="OUI" <?= $dispo== 'OUI'? 'checked' :''; ?>> OUI
            <input type="radio" name="disponible" id="disponible2" value="NON" <?= $dispo== 'NON'? 'checked' :''; ?>> NON
        </div>

        <div>
            <label for="prix">Prix du ménu : </label>
            <input type="number" name="prix" id="prix" value="<?= $prix; ?>" placeholder="Entrer le prix du ménu" required>
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