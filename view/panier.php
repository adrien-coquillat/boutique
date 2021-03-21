<div class="container-fluid p-0 margin-neg-bot">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/panier.jpg">
        <h1 class="title-screen__title">Espace membre</h1>
    </section>
</div>
<div class="container-fluid mb-5" style="position:relative; z-index:3; padding:0">
    <ul class="nav nav-tabs d-flex justify-content-around" style="font-family:Montserrat, sans-serif;" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="btn btn-custom nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile' || $_GET['pane'] == 'historique') ? '' : 'active' ?>" style="width: 20vw;
    font-size: 4vh;" id="panier-tab" data-bs-toggle="tab" data-bs-target="#panier" type="button" role="tab" aria-controls="panier" aria-selected="true"><b>Panier</b></button>
        </li>
        <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-item" role="presentation">
                <button class="btn btn-custom nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile') ? 'active' : '' ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" style="font-family:Montserrat, sans-serif;width: 20vw;
    font-size: 4vh;"><b>Profil</b></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-custom nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'historique') ? 'active' : '' ?>" id="historique-tab" data-bs-toggle="tab" data-bs-target="#historique" type="button" role="tab" aria-controls="historique" aria-selected="false" style="width: 20vw;
    font-size: 4vh;"><b>Historique</b></button>
            </li>
        <?php endif; ?>
    </ul>
    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>
    <div class="tab-content m-0" id="myTabContent">
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile' || $_GET['pane'] == 'historique') ? '' : 'show active' ?>" id="panier" role="tabpanel" aria-labelledby="panier-tab">
            <!-- Tag used to display exception -->
            <?= (isset($msg)) ?  $msg : '' ?>
            <?= $lignes == NULL ? ' <div class="position-relative"> <img class="img-custom-fullwidth2" src="public/img/pannier.jpg" alt="ddd"> <div class="position-absolute top-20 start-20" style="color:white">Votre pannier est VIDE !</div></div>' : $display->cart($lignes, $produits) ?>
        </div>
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile') ? 'show active' : '' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php require('view/profil.php') ?>
            </div>
            <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'historique') ? 'show active' : '' ?>" id="historique" role="tabpanel" aria-labelledby="historique-tab">
                <?= $commandes != NULL ? $display->orders($commandes) : 'Vous n\'avez pas encore passez de commande'; ?>
                <img src="public/img/pannier.jpg" alt="ddd">
            </div>
        <?php endif; ?>
    </div>

</div>