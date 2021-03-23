<div class="container-fluid mt-5 p-5">

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="mt-5 pt-5 row">
        <div class="col-md-6 col-sm-12 mt-5">
            <img style="height:55vh;" src="public/img/<?= $produit->nom_image_p ?>" alt="">

        </div>
        <form class="col-md-6 col-sm-12 mt-5 d-flex flex-column justify-content-between" method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
            <div class="row mb-3">
                <h3 class="col-6"><?= $produit->nom_p ?></h3>
                <h3 class="col-6 text-end "><?= $produit->prix_ht_p ?>€</h3>
            </div>
            <p class="lead"><?= $produit->description_p ?></p>
            <p class="row justify-content-center fw-bold" style="font-size: 3vh;font-family: Montserrat, sans-serif;">
                Quantité :
                <input style="display:inline; width:4rem; border:none;" class="col-1" type="text" name="qt_article" id="" value="1">
            </p>
            <div class="row justify-content-center">
                <input class="btn btn-custom p-3 fw-bold" style="width: 20vw; font-size: 4vh;font-family: Montserrat, sans-serif;" type="submit" name="add" value="Ajouter au panier">
            </div>
        </form>


    </div>



</div>