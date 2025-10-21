<?php 
    $total=get_all_total_depense();
    $somme=get_somme();
?>
<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown" class="text-center">Repartition par nature economique</h2>
    </section>
    <section class="row mt-4">
        <h3>Dans cette section, vous pouvez voir le montant total de chaque depense pour 2024 et 2025.</h3>
        <h5>Cliquer sur une depense pour voir les details de cette depense</h5>
    </section>
    <section class="row mt-4">
        <table class="table table-light table-striped table-hover">
            <tr>
                <th>Nom de la depense</th>
                <th>Total pour 2024</th>
                <th>Total pour 2025</th>
            </tr>
            
            <?php foreach ($total as $tl) {?>
                <tr>
                    <td><a href="modele.php?page=<?php echo $tl['id_type_depense'];?>&titre=<?php echo $tl['type_depense'];?>" class="lien"><?php echo $tl['type_depense'];?></a></td>
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