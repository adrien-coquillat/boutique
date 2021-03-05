<div class="container-fluid p-0">
    <section class="welcome-screen">
        <img class="welcome-screen__img" src="public/img/we-vibe-wow-tech-X0-O71AAUDo-unsplash.jpg">
        <h1 class="welcome-screen__title">Joujou Coquin</h1>
        <h2 class="welcome-screen__subtitle">Les jouets qui font du bien</h2>


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
        <h1 class="best-sellers__title">Bientôt en rupture de stock</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/malvestida-magazine-2uypuJm-53k-unsplash.jpg" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/malvestida-magazine-n87IdOaYZCE-unsplash.jpg" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 21rem;">
                        <img class="img-card-custom border-img-top" src="public/img/malvestida-magazine-NZzoSTY9Ez4-unsplash.jpg" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="new-products">
        <div id="#myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/img/womanizer-wow-tech-Fls8Q8fgF9o-unsplash.jpg" class="d-block img-custom-fullwidth d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/img/womanizer-wow-tech-4LUVbElX7Is-unsplash.jpg" class="d-block img-custom-fullwidth d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/img/womanizer-wow-tech-uVYmOuYlvcw-unsplash.jpg" class="d-block img-custom-fullwidth d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
</div>