<div class="container-fluid p-5">

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="mt-5 pt-5 row">
        <div class="col-md-6 col-sm-12">
            <img class="w-100" src="public/img/<?= $produit->nom_image_p ?>" alt="">

        </div>
        <form class="col-md-6 col-sm-12 p-5" method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
            <div class="row mb-3">
                <h3 class="col-6"><?= $produit->nom_p ?></h3>
                <h3 class="col-6 text-end"><?= $produit->prix_ht_p ?>€</h3>
            </div>
            <p class="lead"><?= $produit->description_p ?></p>
            <p class="row mt-5 mb-5 justify-content-center">
                Quantité:
                <input style="display:inline ; width : 3rem" class="col-1" type="text" name="qt_article" id="" value="1">
            </p>
            <div class="row justify-content-center">
                <input class="btn btn-custom p-3 " type="submit" name="add" value="Ajouter au panier">
            </div>
        </form>


    </div>



</div>