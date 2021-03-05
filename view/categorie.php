<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/Categorie.jpg">
        <h1 class="title-screen__title">Categorie</h1>
    </section>
</div>
<div class="container-fluid p-5">

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>
    <div class="row justify-content-center mb-5">
        <?= $display->subCategorieNavbar($sous_categories) ?>
    </div>
    <div class="row">
        <?php foreach ($produits as $produit) : ?>
            <?= $display->productCard($produit) ?>
        <?php endforeach; ?>
    </div>

</div>