<?php 
    $depenseinstitution=get_all_depense_institution();
    $somme=get_total_depense_institution();
?>

<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown" class="text-center">Depenses des institutions</h2>
    </section>

    <section class="row mt-4">
        <table class="table table-light table-striped text-center">
            <tr>
                <th>institutions</th>
                <th>Montant pour l'année 2024</th>
                <th>Montant pour l'année 2025</th>
                
            </tr>
            
            <?php foreach ($depenseinstitution as $di) {?>
                <tr>
                    <td class="text-start"><?php echo $di['nom_institution'];?></td>
                    <td><?php echo $di['somme_2024'];?> md Ar</td>
                    <td><?php echo $di['somme_2025'];?> md Ar</td>
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