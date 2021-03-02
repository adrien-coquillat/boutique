<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Résultat de votre recherche pour : <?= isset($keywords) ? $keywords : 'OOoOps, j\'ai oublié..' ?></h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="row">
        <?php foreach ($results as $produit) {
            $display->productCard($produit, 15, 20, 50);
        } ?>
    </div>

</div>