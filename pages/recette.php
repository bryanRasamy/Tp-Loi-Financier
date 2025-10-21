<?php 
    $total=get_all_recette_accueil();
    $somme=get_somme_recette_accueil();
?>
<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown" class="text-center">LISTE DE RECETTES</h2>
    </section>
    </section>
    <section class="row mt-4">
        <table class="table table-light table-striped table-hover text-center">
            <tr>
                <th>Nom de la recette</th>
                <th>Total pour 2024</th>
                <th>Total pour 2025</th>
            </tr>
            
            <?php foreach ($total as $tl) {?>
                    <td class="text-start"><a href="modele.php?page=<?php echo $tl['recette'];?>" class="lien"><?php echo $tl['recette'];?></a></td>
                    <td><?php echo $tl['a2024'];?> md Ar</td>
                    <td><?php echo $tl['a2025'];?> md Ar</td>
                </tr>
            <?php } ?>
            <tr>
                <td class="text-start"><b>Somme totale</b></td>
                <td><b><?php echo $somme['st24'];?> md Ar</b></td>
                <td><b><?php echo $somme['st25'];?> md Ar</b></td>
            </tr>
        </table>
    </section>
</div>