<?php 
    $fiscale=get_all_recette_fiscale();
    $total= get_somme_recette_fiscale();
?>
<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown"  class="text-center">Recettes fiscales interieures</h2>
    </section>
    <section class="row">
        <table border="1" class="table table-success table-striped text-center">
            <tr>
                <th>NATURE D'IMPOTS</th>
                <th>LFR 2024</th>
                <th>LFR 2025</th>
            </tr>
            <?php foreach ($fiscale as $tl) {?>
                <tr>
                    <td class="text-start"><?php echo $tl['nature_impots'];?></td>
                    <td><?php echo $tl['LFR2024'];?> md Ar</td>
                    <td><?php echo $tl['LF2025'];?> md Ar</td>
                </tr>
            <?php } ?>
            <tr>
                    <th class="text-start">Total</th>
                    <td><?php echo $total['st24'];?> md Ar</td>
                    <td><?php echo $total['st25'];?> md Ar</td>
            </tr>
        </table>
    </section>
    <section class="row mt-4">
        <article class="col-3 col-sm-3 col-lg-3">
            <a href="modele.php?page=recette" class="btn btn-outline-danger">Retour</a>
        </article>
    </section>
</div>