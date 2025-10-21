<?php
    require(".././inc/fonctions.php");
    session_start();

    $page= $_GET['page'];

    if($page==1){
        $page="interetdette";
    }elseif($page==2){
        $page="depensesolde";
    }elseif($page==3){
        $page="depensehorssolde";
    }elseif($page==4){
        $page="depenseinvestissement";
    }elseif($page=="Ministères"){
        $page="depenseministere";
    }elseif($page=="Institutions"){
        $page="depenseinstitution";
    }elseif($page=="Organes Constitutionnels"){
        $page="depenseorganisation";
    }elseif($page=="Hors opérations d ordre"){
        $page="depensehorsoperationdordre";
    }elseif($page=="Recettes fiscales interieures"){
        $page="recettefiscale";
    }elseif($page=="Recettes douanieres"){
        $page="recettedouanieres";
    }elseif($page=="Recettes non fiscales"){
        $page="recettenonfiscale";
    }elseif($page=="Dons"){
        $page="dons";
    }

    $page_format= $page.".php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page ?></title>
    <link rel="stylesheet" href=".././assets/css/style.css">
    <link href=".././assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href=".././assets/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bd">
    <div class="container container_couleur">
        <header>
            <nav class="navbar navbar-expand-lg head">
                <div class="container-fluid">
                    <div class="col-11 col-sm-11 col-lg-11">
                        <a class="navbar-brand fw-bold" href="modele.php?page=accueil">Loi Financier de Madagascar 2024-2025</a>
                    </div>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse col-1 col-sm-1 col-lg-1" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Home
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="modele.php?page=accueil">Accueil</a></li>
                                    <li><a class="dropdown-item" href="modele.php?page=recette">Recette 2024-2025</a></li>
                                    <li><a class="dropdown-item" href="modele.php?page=repartitions">Dépense 2024-2025</a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>
        </header>
        <main>
            <?php include($page_format);?>
        </main>
        <footer class="mt-5 footer">
            <p class="text-center">&copy; 2025 by Bryan and Hasina</p>
        </footer>
    </div>
    
    <script src=".././assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>