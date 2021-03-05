<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/panier.jpg">
        <h1 class="title-screen__title">Panier</h1>
    </section>
</div>
<div class="container-fluid mt-3 mb-3">

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>


    <?= $lignes == NULL ? 'Rien dans le panier' : $display->cart($lignes, $produits) ?>


</div>