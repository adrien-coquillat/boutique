<div class="container-fluid p-5">

    <div class="mt-5 pt-5 row">
        <div class="col-md-6 col-sm-12">
            <img class="w-100" src="public/img/<?= $produit->nom_image_p ?>" alt="">

        </div>
        <form class="col-md-6 col-sm-12 p-5" method="POST" action="index.php?page=produit">
            <div class="row mb-3">
                <h3 class="col-6"><?= $produit->nom_p ?></h3>
                <h3 class="col-6 text-end"><?= $produit->prix_ht_p ?>€</h3>
            </div>
            <p class="lead"><?= $produit->description_p ?></p>
            <p class="row mt-5 mb-5">
                <label class="col-2 offset-4">Quantité:</label>
                <input class="col-1" type="text" name="quantity" id="" value="1">
            </p>
            <div class="row">
                <input class="btn btn-custom p-3 col-4 offset-4" type="submit" name="add" value="Ajouter au panier">
            </div>
        </form>


    </div>



</div>