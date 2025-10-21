<?php 
    $total=get_all_total_depense_par_rattachement();
    $somme=get_somme_rattachement();
?>
<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown" class="text-center">Repartition par attachement administratif</h2>
    </section>

    <section class="row mt-4">
        <table class="table table-light table-striped table-hover">
            <tr>
                <th></th>
                <th>Total pour 2024</th>
                <th>Total pour 2025</th>
            </tr>
            
            <?php foreach ($total as $tl) {?>
                <tr>
                    <td><a href="modele.php?page=<?php echo $tl['nom'];?>" class="lien"><?php echo $tl['nom'];?></a></td>
                    <td><?php echo $tl['total_2024'];?> md Ar</td>
                    <td><?php echo $tl['total_2025'];?> md Ar</td>
                </tr>
            <?php } ?>
            <tr>
                <td>Somme totale</td>
                <td><?php echo $somme['st24'];?> md Ar</td>
                <td><?php echo $somme['st25'];?> md Ar</td>
            </tr>
        </table>
    </section>
    <section class="row mt-4">
        <article class="col-3 col-sm-3 col-lg-3">
            <a href="modele.php?page=repartitions" class="btn btn-outline-danger">Retour</a>
        </article>
    </section>
</div>