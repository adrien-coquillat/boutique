<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Categorie</h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="row">
        <?php foreach ($lignes as $ligne) : ?>
            <?= $display->productCard($ligne) ?>
        <?php endforeach; ?>
    </div>

</div>