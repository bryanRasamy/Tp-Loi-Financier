<?php 
    $horssolde=get_all_depense_hors_solde();
    $somme=get_total_depense_hors_solde();
?>

<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown" class="text-center"><?php echo $_GET['titre'];?></h2>
    </section>
    <section class="row mt-4">
        <h3 class="text-center">Dans cette section, vous pouvez voir les depenses de fonctionnement des administrations publiques de Madagascar pour l'annee 2024 et 2025</h3>
    </section>
    <section class="row mt-4">
        <table class="table table-light table-striped text-center">
            <tr>
                <th></th>
                <th>Montant pour l'année 2024</th>
                <th>Montant pour l'année 2025</th>
                <th>Ecart</th>
            </tr>
            
            <?php foreach ($horssolde as $hs) {?>
                <tr>
                    <td class="text-start"><?php echo $hs['categorie'];?></td>
                    <td><?php echo $hs['montant_2024'];?> md Ar</td>
                    <td><?php echo $hs['montant_2025'];?> md Ar</td>
                    <td><?php echo $hs['ecart'];?> md Ar</td>
                </tr>
            <?php } ?>
            <tr>
                <th class="text-start">Totale</th>
                <td><?php echo $somme['total_2024'];?> md Ar</td>
                <td><?php echo $somme['total_2025'];?> md Ar</td>
                <td><?php echo $somme['total_ecart'];?> md Ar</td>
            </tr>
        </table>
    </section>
    <section class="row mt-4">
        <article class="col-3 col-sm-3 col-lg-3">
            <a href="modele.php?page=depenseparnatureeconomique" class="btn btn-outline-danger">Retour</a>
        </article>
    </section>
</div>