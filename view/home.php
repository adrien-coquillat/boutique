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
                <?= $_SESSION['user']['login_u'] ?>
                <input type="submit" value="DECONNEXION" name="deconnexion">
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
                <div class="col-sm d-flex justify-content-center mb-3">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/<?= $produits[$conf['best_sellers_first_id_p']->value - 1]->nom_image_p ?>" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $produits[$conf['best_sellers_first_id_p']->value  - 1]->nom_p ?></h3>
                            <p class="card-text"><?= $produits[0]->troncateText($produits[$conf['best_sellers_first_id_p']->value  - 1]->description_p, 200) ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center  mb-3">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/<?= $produits[$conf['best_sellers_second_id_p']->value  - 1]->nom_image_p ?>" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $produits[$conf['best_sellers_second_id_p']->value - 1]->nom_p ?></h3>
                            <p class="card-text"><?= $produits[0]->troncateText($produits[$conf['best_sellers_second_id_p']->value  - 1]->description_p, 200) ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center  mb-3">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/<?= $produits[$conf['best_sellers_third_id_p']->value  - 1]->nom_image_p ?>" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $produits[$conf['best_sellers_third_id_p']->value  - 1]->nom_p ?></h3>
                            <p class="card-text"><?= $produits[0]->troncateText($produits[$conf['best_sellers_third_id_p']->value  - 1]->description_p, 200) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="new-products">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="<?= $conf['carousel_interval']->value ?>">
                    <img src="public/img/<?= $produits[$conf['carousel_first_id_p']->value  - 1]->nom_image_p ?>" class="d-block img-custom-carousel" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="font-family: 'Robotto', sans-serif; font-size: 2.7rem; color: #FB4D94;"><?= $produits[$conf['carousel_first_id_p']->value  - 1]->nom_p ?></h5>
                        <p style="font-family: 'Robotto', sans-serif; font-size: 1.5rem; color: #FB4D94;"><?= $produits[0]->troncateText($produits[$conf['carousel_first_id_p']->value  - 1]->description_p, 70) ?></p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="<?= $conf['carousel_interval']->value ?>">
                    <img src="public/img/<?= $produits[$conf['carousel_second_id_p']->value  - 1]->nom_image_p ?>" class="d-block img-custom-carousel" alt=" ...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="font-family: 'Robotto', sans-serif; font-size: 2.7rem; color: #FB4D94;"><?= $produits[$conf['carousel_second_id_p']->value  - 1]->nom_p ?></h5>
                        <p style="font-family: 'Robotto', sans-serif; font-size: 1.5rem; color: #FB4D94;"><?= $produits[0]->troncateText($produits[$conf['carousel_second_id_p']->value  - 1]->description_p, 70) ?></p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="<?= $conf['carousel_interval']->value ?>">
                    <img src="public/img/<?= $produits[$conf['carousel_third_id_p']->value  - 1]->nom_image_p ?>" class="d-block img-custom-carousel" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="font-family: 'Robotto', sans-serif; font-size: 2.7rem; color: #FB4D94;"><?= $produits[$conf['carousel_third_id_p']->value  - 1]->nom_p ?></h5>
                        <p style="font-family: 'Robotto', sans-serif; font-size: 1.5rem; color: #FB4D94;"><?= $produits[0]->troncateText($produits[$conf['carousel_third_id_p']->value  - 1]->description_p, 70) ?></p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>
</div>