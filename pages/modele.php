<?php
    require(".././inc/fonctions.php");
    session_start();

    $page= $_GET['page'];
    $page_format= $page.".php";

    if(!isset($_SESSION['utilisateur'])){
        header('Location:login.php');
    }
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
    <?php if($page_format=="utilisateur.php"){?>
        <body class="body4">
        <?php include($page_format);?>
    <?php }elseif($page_format=="accueil.php" || $page_format=="discussion.php" || $page_format=="membres.php" || $page_format=="message.php"){?>
        <body class="body2">
            <div class="sidebar fixe">
                <h2>TcNet</h2>
                <ul>
                    <li>
                        <a href="modele.php?page=accueil">
                            🏠 Accueil
                        </a>
                    </li>
                    <li>
                        <a href="modele.php?page=membres">
                            📝 Membres
                        </a>
                    </li>
                    <li>
                        <a href="modele.php?page=upload">
                            📝 Uploader
                        </a>
                    </li>
                    <li>
                        <a href="modele.php?page=profil">
                            📝 Mon Profil
                        </a>
                    </li>
                    <li>
                        <a href="modele.php?page=discussion">
                            📝 Discussions
                        </a>
                    </li>
                    <li>
                        <a href="deconnexion.php">
                            🚪 Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
            <?php include($page_format);?>
    <?php }else{?>
        <?php include($page_format);?>
    <?php }?>
    <script src=".././assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>