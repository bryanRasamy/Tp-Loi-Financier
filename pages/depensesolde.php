<?php 
    $depense=get_all_depense_solde();
    $budget=get_all_budget_autorisee();
    $somme=get_total_budget();
?>

<div class="row">
    <section class="row mt-4">
        <h2 style="color:brown" class="text-center"><?php echo $_GET['titre'];?></h2>
    </section>
    <section class="row mt-4">
        <h3 class="text-center">Dans cette section, vous pouvez voir les depenses courantes de solde de Madagascar pour l'annee 2024 et 2025</h3>
    </section>
    <section class="row mt-4">
        <table class="table table-light table-striped">
            <tr>
                <th>Libelle</th>
                <td><?php echo $_GET['titre'];?></td>
            </tr>

            <tr>
                <th>Montant en 2024</th>
                <td><?php echo $depense['montant_2024'];?> md Ar</td>
            </tr>
            
            <tr>
                <th>Montant en 2025</th>
                <td><?php echo $depense['montant_2025'];?> md Ar</td>
            </tr>

            <tr>
                <th>Ecart</th>
                <td><?php echo $depense['ecart'];?> md Ar</td>
            </tr>

        </table>
    </section>
    <section class="row mt-5">
        <h4 class="text-center">Le tableau ci-dessous nous montre la liste des postes budgetaires autorisees pour 2025</h4>
    </section>
    <section class="row mt-4">
        <table class="table table-light table-striped">
            <tr>
                <th>Postes</th>
                <th>Budget</th>
            </tr>
            
            <?php foreach ($budget as $bd) {?>
                <tr>
                    <td><?php echo $bd['nom_ministere'];?></td>
                    <td><?php echo $bd['Budget_autorisee'];?> md Ar</td>
                </tr>
            <?php } ?>
            <tr>
                <td>Totale</td>
                <td><?php echo $somme['total'];?> md Ar</td>
            </tr>
        </table>
    </section>
    <section class="row mt-4">
        <article class="col-3 col-sm-3 col-lg-3">
            <a href="modele.php?page=depenseparnatureeconomique" class="btn btn-outline-danger">Retour</a>
        </article>
    </section>
</div>