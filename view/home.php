<div class="container-fluid p-0">
    <section class="welcome-screen">
        <img class="welcome-screen__img" src="public/img/welcome-pic.jpg">
        <h1 class="welcome-screen__title"><?= $conf['title']->value ?></h1>
        <h2 class="welcome-screen__subtitle"><?= $conf['subtitle']->value  ?></h2>


        <?php
        if (isset($_POST['deconnexion'])) {
            unset($_SESSION['user']);
        }
        if (isset($_SESSION['user']) && $_SESSION['user']['login_u'] != session_id()) : ?>
            <form class="welcome-screen__form" action="index.php" method="POST">
                <h2 style="color:antiquewhite;">
                    Bienvenue à toi,
                    <?= $_SESSION['user']['login_u'] ?>!
                </h2>
                <input type="submit" value="DECONNEXION" name="deconnexion">
                <p>
                    <?= (isset($msg)) ?  $msg : '' ?>
                </p>
            </form>
        <?php else : ?>
            <form class="welcome-screen__form" action="index.php?page=connexion" method="POST">
                <input type="text" name="login_u" placeholder="Login" id="login" required>
                <input type="password" name="motdepass_u" placeholder="Password" id="password" required>
                <input type="submit" value="OK">
                <p>
                    Pas encore inscrit ? Je m'inscrit <a href="index.php?page=inscription">ici</a>.
                    <?= (isset($msg)) ?  $msg : '' ?>
                </p>
            </form>
        <?php endif; ?>

    </section>
    <section class="best-sellers">
        <h1 class="best-sellers__title"><?= $conf['best_sellers_catch_phrase']->value  ?></h1>
        <div class="container">
            <div class="row">
                <a style="text-decoration: none; color: black;" class="col-sm d-flex justify-content-center mb-3" href="index.php?page=produit&id_p=<?= $produits[$conf['best_sellers_first_id_p']->value  - 1]->id_p ?>">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/<?= $produits[$conf['best_sellers_first_id_p']->value - 1]->nom_image_p ?>" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $produits[$conf['best_sellers_first_id_p']->value  - 1]->nom_p ?></h3>
                            <p class="card-text"><?= $produits[0]->troncateText($produits[$conf['best_sellers_first_id_p']->value  - 1]->description_p, 200) ?></p>
                        </div>
                    </div>
                </a>
                <a style="text-decoration: none; color: black;" class="col-sm d-flex justify-content-center mb-3" href="index.php?page=produit&id_p=<?= $produits[$conf['best_sellers_second_id_p']->value  - 1]->id_p ?>">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/<?= $produits[$conf['best_sellers_second_id_p']->value  - 1]->nom_image_p ?>" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $produits[$conf['best_sellers_second_id_p']->value - 1]->nom_p ?></h3>
                            <p class="card-text"><?= $produits[0]->troncateText($produits[$conf['best_sellers_second_id_p']->value  - 1]->description_p, 200) ?></p>
                        </div>
                    </div>
                </a>
                <a style="text-decoration: none; color: black;" class="col-sm d-flex justify-content-center mb-3" href="index.php?page=produit&id_p=<?= $produits[$conf['best_sellers_third_id_p']->value  - 1]->id_p ?>">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/<?= $produits[$conf['best_sellers_third_id_p']->value  - 1]->nom_image_p ?>" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $produits[$conf['best_sellers_third_id_p']->value  - 1]->nom_p ?></h3>
                            <p class="card-text"><?= $produits[0]->troncateText($produits[$conf['best_sellers_third_id_p']->value  - 1]->description_p, 200) ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="new-products mb-5">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="<?= $conf['carousel_interval']->value ?>">
                    <a href="index.php?page=produit&id_p=<?= $produits[$conf['carousel_first_id_p']->value  - 1]->id_p ?>">
                        <img src="public/img/<?= $produits[$conf['carousel_first_id_p']->value  - 1]->nom_image_p ?>" class="d-block img-custom-carousel" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Robotto', sans-serif; font-size: 2.7rem; color: #FB4D94; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?= $produits[$conf['carousel_first_id_p']->value  - 1]->nom_p ?></h5>
                            <p style="font-family: 'Robotto', sans-serif; font-size: 1.5rem; color: #FB4D94; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?= $produits[0]->troncateText($produits[$conf['carousel_first_id_p']->value  - 1]->description_p, 70) ?></p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="<?= $conf['carousel_interval']->value ?>">
                    <a href="index.php?page=produit&id_p=<?= $produits[$conf['carousel_second_id_p']->value  - 1]->id_p ?>">

                        <img src="public/img/<?= $produits[$conf['carousel_second_id_p']->value  - 1]->nom_image_p ?>" class="d-block img-custom-carousel" alt=" ...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Robotto', sans-serif; font-size: 2.7rem; color: #FB4D94; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?= $produits[$conf['carousel_second_id_p']->value  - 1]->nom_p ?></h5>
                            <p style="font-family: 'Robotto', sans-serif; font-size: 1.5rem; color: #FB4D94; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?= $produits[0]->troncateText($produits[$conf['carousel_second_id_p']->value  - 1]->description_p, 70) ?></p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="<?= $conf['carousel_interval']->value ?>">
                    <a href="index.php?page=produit&id_p=<?= $produits[$conf['carousel_third_id_p']->value  - 1]->id_p ?>">

                        <img src="public/img/<?= $produits[$conf['carousel_third_id_p']->value  - 1]->nom_image_p ?>" class="d-block img-custom-carousel" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: 'Robotto', sans-serif; font-size: 2.7rem; color: #FB4D94; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?= $produits[$conf['carousel_third_id_p']->value  - 1]->nom_p ?></h5>
                            <p style="font-family: 'Robotto', sans-serif; font-size: 1.5rem; color: #FB4D94; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?= $produits[0]->troncateText($produits[$conf['carousel_third_id_p']->value  - 1]->description_p, 70) ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <button style="background: transparent; border : 0px ; " class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button style="background: transparent; border : 0px" class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>
</div>