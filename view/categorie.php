<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Categorie</h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <?= $display->subCategorieNavbar($sous_categories) ?>

    <div class="row">
        <?php foreach ($produits as $produit) : ?>
            <?= $display->productCard($produit) ?>
        <?php endforeach; ?>
    </div>

</div>