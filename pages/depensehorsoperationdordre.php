<?php 
    $depensehorsoperation=get_all_depense_horsoperation();
    $somme=get_total_depense_horsoperation();
?>

<div class="row">
    <section class="row mt-4">
        <h2 class="text-center">Depenses hors operation d'ordre</h2>
    </section>

    <section class="row mt-4">
        <table class="table table-light table-striped text-center">
            <tr>
                <th>Hors operation d'ordre</th>
                <th>Montant pour l'année 2024</th>
                <th>Montant pour l'année 2025</th>
                
            </tr>
            
            <?php foreach ($depensehorsoperation as $dh) {?>
                <tr>
                    <td class="text-start"><?php echo $dh['nom_operation_dordres'];?></td>
                    <td><?php echo $dh['somme_2024'];?> md Ar</td>
                    <td><?php echo $dh['somme_2025'];?> md Ar</td>
                </tr>
            <?php } ?>
            <tr>
                <th class="text-start">Totale</th>
                <td><?php echo $somme['total_2024'];?> md Ar</td>
                <td><?php echo $somme['total_2025'];?> md Ar</td>
            </tr>
        </table>
    </section>
    <section class="row mt-4">
        <article class="col-3 col-sm-3 col-lg-3">
            <a href="modele.php?page=depenseparrattachementadministratif" class="btn btn-outline-danger">Retour</a>
        </article>
    </section>
</div>