<?php 
    $investissement=get_all_investissement();
?>

<div class="row">
    <section class="row mt-4">
        <h2 class="text-center"><?php echo $_GET['titre'];?></h2>
    </section>
    <section class="row mt-4">
        <h3 style="color:brown" class="text-center">Dans cette section, vous pouvez voir les depenses d'investissement de Madagascar pour l'annee 2024 et 2025</h3>
    </section>
    <section class="row mt-4">
        <table class="table table-light table-striped">
            <tr>
                <th></th>
                <?php foreach ($investissement as $in) {?>
                    <td><?php echo $in['annee'];?></td>
                <?php }?>
            </tr>

            <tr>
                <th>PIP interne</th>
                <?php foreach ($investissement as $in) {?>
                    <td><?php echo $in['pip_interne'];?> md Ar</td>
                <?php }?>
            </tr>
            
            <tr>
                <th>PIP externe</th>
                <?php foreach ($investissement as $in) {?>
                    <td><?php echo $in['pip_externe'];?> md Ar</td>
                <?php }?>
            </tr>

            <tr>
                <th>Total</th>
                <?php foreach ($investissement as $in) {?>
                    <td><?php echo $in['total'];?> md Ar</td>
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