<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/Categorie.jpg">
        <h1 class="title-screen__title"><?= $categorie->nom_c ?></h1>
    </section>
</div>
<div class="container-fluid">

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>
    <div class="row justify-content-center margin-neg-bot">
        <?= $display->subCategorieNavbar($sous_categories) ?>
    </div>
    <div class="row product-gallerie pt-5">
        <?php foreach ($produits as $produit) : ?>
            <?= $display->productCard($produit) ?>
        <?php endforeach; ?>
    </div>

</div>