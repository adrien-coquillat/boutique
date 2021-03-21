<footer class="container-fluid padding">

    <div class=" container d-flex justify-content-around">

        <img src="public/img/logofooter.png" class="img-fluid h-75 d-inline-block" alt="Responsive image">
    </div>

    <div class="container-fluid row align-items-center ">
        <div class="row align-items-center d-flex justify-content-around">
            <div class="col d-flex justify-content-around">
                <ul class="list-group " id="caracterefooter">
                    <a class="text-left text-decoration-none" href="index.php">Accueil</a>
                    <a class="text-left text-decoration-none" href="index.php?page=panier">Espace membre</a>
                    <a class="text-left text-decoration-none" href="index.php?page=inscription">Inscription</a>
                </ul>
            </div>
            <div class="col d-flex justify-content-around">
                <ul class="list-group" id="caracterelienfooter">
                    <?php foreach ($categories as $categorie) : ?>
                        <a class="text-left text-decoration-none" href="index.php?page=categorie&id_c=<?= $categorie->id_c ?>"><?= $categorie->nom_c ?></a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
</footer>