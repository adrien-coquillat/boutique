<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Panier</h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="row">
        <?= $lignes == NULL ? 'Rien dans le panier' : $display->cart($lignes, $produits) ?>
    </div>

</div>