<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/Categorie.jpg">
        <h1 class="title-screen__title">Commande</h1>
    </section>
</div>
<div class="container-fluid mt-3 mb-3">
    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '
    <div class="alert alert-success" role="alert">
    Votre paiement est un succés, Joujou en chemin ! 
    Envie de <a href="index.php?page=categorie">flanner</a>? 
    Espace membre ? C\'est par <a href="index.php?page=membre&pane=historique">là</a>.  
    </div>' ?>
</div>