<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/Categorie.jpg">
        <h1 class="title-screen__title">Commande</h1>
    </section>
</div>
<div class="container-fluid mt-3 mb-3">
    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '<div class="alert alert-success" role="alert"> Votre paiement est un succés, Joujou en chemin ! </div>' ?>
</div>