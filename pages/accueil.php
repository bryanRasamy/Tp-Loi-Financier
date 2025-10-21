<?php 
    $somme_depense=get_somme();
    $somme_recette=get_somme_recette_accueil();
    $deficit_2024=$somme_depense['st24']-$somme_recette['st24'];
    $deficit_2025=$somme_depense['st25']-$somme_recette['st25'];
?>
<div class="row mt-4">
    <section class="row mt-4">
        <article class="col-2 col-sm-2 col-lg-2"></article>
        <article class="col-8 col-sm-8 col-lg-8">
            <h2 class="text-center">Bienvenue dans ce site où vous trouverez la loi financier de Madagascar pour l'année 2024 et 2025 !</h2>
        </article>
        <article class="col-2 col-sm-2 col-lg-2"></article>
    </section>
    <section class="row mt-5 modif_accueil">
        <article class="col-1 col-sm-1 col-lg-1"></article>
        <a class="btn btn-outline-success mt-4 col-3 col-sm-3 col-lg-3" href="modele.php?page=recette">
            <h4>Recette 2024-2025</h4>
            <h5 class="mt-3">2024: <em><?php echo $somme_recette['st24'];?> md Ar </em></h5>
            <h5>2025: <em><?php echo $somme_recette['st25'];?> md Ar</em></h5>
        </a>
        <a class="btn btn-outline-danger mt-4 col-3 col-sm-3 col-lg-3 modif_lien" href="modele.php?page=repartitions">
            <h4>Dépense 2024-2025</h4>
            <h5 class="mt-3">2024: <em><?php echo $somme_depense['st24'];?> md Ar </em></h5>
            <h5>2025: <em><?php echo $somme_depense['st25'];?> md Ar</em></h5>
        </a>
        <a class="btn btn-outline-warning mt-4 col-3 col-sm-3 col-lg-3 modif_lien" href="modele.php?page=deficit">
            <h4>Déficit</h4>
            <h5 class="mt-3">2024: <em><?php echo $deficit_2024;?> md Ar</em></h5>
            <h5>2025: <em><?php echo $deficit_2025;?> md Ar</em></h5>
        </a>
    </section>
</div>