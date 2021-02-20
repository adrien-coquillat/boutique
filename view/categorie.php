<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Categorie</h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="row">
        <?php foreach ($produits as $produit) : ?>
            <div class="col-sm d-flex justify-content-center">
                <div class="card" style="width: 21rem;">
                    <img class="img-card-custom border-img-top" src="public/img/<?= $produit->nom_image_p ?>" alt="...">
                    <form class="card-body" method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
                        <h5 class="card-title"><?= $produit->nom_p ?></h5>
                        <p class="card-text"><?= $produit->troncateText($produit->description_p, 200) ?></p>
                        <input type="hidden" name="fromPage" value="<?= $_SERVER["QUERY_STRING"] ?>">
                        <input class="btn btn-primary" type="submit" name="add" value="Ajouter Panier">
                        <input class="btn btn-primary" type="submit" name="show" value="Voir +">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>