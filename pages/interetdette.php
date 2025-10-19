<?php 
    $dette=get_all_interet_dette();
?>

<div class="row">
    <section class="row mt-4">
        <h2 class="text-center">Interet des dettes</h2>
    </section>
    <section class="row mt-4">
        <h3>Dans cette section, vous pouvez voir le montant des dettes de Madagascar en 2024 et 2025 avec les interets</h3>
    </section>
    <section class="row mt-4">
        <table class="table table-info table-striped">
            <tr>
                <th>Type de dette</th>
                <?php foreach ($dette as $dt) {?>
                    <td><?php echo $dt['type_dette'];?></td>
                <?php }?>
            </tr>

            <tr>
                <th>Interet en 2024</th>
                <?php foreach ($dette as $dt) {?>
                    <td><?php echo $dt['interet_2024'];?> md Ar</td>
                <?php }?>
            </tr>
            
            <tr>
                <th>Interet en 2025</th>
                <?php foreach ($dette as $dt) {?>
                    <td><?php echo $dt['interet_2025'];?> md Ar</td>
                <?php }?>
            </tr>

        </table>
    </section>
    <section class="row mt-4">
        <article class="col-3 col-sm-3 col-lg-3">
            <a href="modele.php?page=depenseparnatureeconomique" class="btn btn-outline-danger">Retour</a>
        </article>
    </section>
</div>