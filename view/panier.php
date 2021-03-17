<div class="container-fluid p-0 margin-neg-bot">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/panier.jpg">
        <h1 class="title-screen__title">Espace membre</h1>
    </section>
</div>
<div class="container-fluid mb-3" style="position:relative; z-index:3">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile' || $_GET['pane'] == 'historique') ? '' : 'active' ?>" id="panier-tab" data-bs-toggle="tab" data-bs-target="#panier" type="button" role="tab" aria-controls="panier" aria-selected="true">Panier</button>
        </li>
        <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile') ? 'active' : '' ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'historique') ? 'active' : '' ?>" id="historique-tab" data-bs-toggle="tab" data-bs-target="#historique" type="button" role="tab" aria-controls="historique" aria-selected="false">Historique</button>
            </li>
        <?php endif; ?>
    </ul>
    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>
    <div class="tab-content m-0" id="myTabContent">
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile' || $_GET['pane'] == 'historique') ? '' : 'show active' ?>" id="panier" role="tabpanel" aria-labelledby="panier-tab">
            <!-- Tag used to display exception -->
            <?= (isset($msg)) ?  $msg : '' ?>
            <?= $lignes == NULL ? 'Rien dans le panier' : $display->cart($lignes, $produits) ?>
        </div>
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'profile') ? 'show active' : '' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php require('view/profil.php') ?>
            </div>
            <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'historique') ? 'show active' : '' ?>" id="historique" role="tabpanel" aria-labelledby="historique-tab">
                <?= $commandes != NULL ? $display->orders($commandes) : 'Vous n\'avez pas encore passez de commande'; ?>
            </div>
        <?php endif; ?>
    </div>

</div>