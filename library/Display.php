<?php

namespace library;

class Display
{
    /**
     * Return HTML Table / Form from dataset(array) of object
     * @param array $dataSet array of objects
     * @param string $idName id field name in object (used to personalise input name for edition & supression)
     * @param string $actionURL optional - used in action field of form tag
     * @return string HTML code
     */
    public function htmlTableForm(array $dataSet, string $actionURL = '')
    {
        reset($dataSet[0]);
        $id_key = key($dataSet[0]); ?>
        <div class="table-responsive">
            <table class='table table-sm table-striped table-hover'>
                <thead>
                    <th></th>
                    <th></th>
                    <?php foreach ($dataSet[0] as $key => $value) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach; ?>
                </thead>
                <tbody>
                    <?php foreach ($dataSet as $data) : ?>
                        <tr>
                            <form action="<?= $actionURL ?>" method="POST">
                                <td><input type='submit' name='submit' value='edit'></td>
                                <td><input type='submit' name='submit' value='delete'></td>
                                <?php foreach ($data as $key => $value) : ?>
                                    <?php if ($key == $id_key) : ?>
                                        <td><input class='bo-input' type='hidden' name='<?= $key ?>' value='<?= $value ?>'><?= $value ?></td>
                                    <?php else : ?>
                                        <td><input class='bo-input' type='text' name='<?= $key ?>' value='<?= htmlspecialchars($value)  ?>'></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                <tbody>
            </table>
        </div>
    <?php
    }

    /**
     * Return HTML form according parameters
     */
    public function addForm(object $model, string $actionURL = '')
    {
        reset($model);
        $ignore = key($model); ?>
        <form action="<?= $actionURL ?>" method="POST">
            <?php foreach ($model as $key => $value) :
                if ($key == $ignore)
                    continue; ?>
                <div class="mb-3">
                    <label class="form-label" for="<?= $key ?>"><?= $key ?></label>
                    <input class="form-control form-control-sm" id="<?= $key ?>" name="<?= $key ?>" type="text" placeholder="<?= $value ?>">
                </div>
            <?php endforeach; ?>
            <input type="submit" value="Add">
        </form>
    <?php
    }

    /**
     * Return Html gallery img according to folder path provided
     */
    public function imgGalleryForm(string $path, string $actionURL = '')
    {
        $dirContent = scandir($path); ?>
        <div class="row">
            <?php foreach ($dirContent as $file) :
                if (!preg_match('/[jpg|jpeg|png|gif]$/', $file)) :
                    continue;
                endif; ?>
                <form method="POST" action="<?= $actionURL ?>" class="col-2 border m-3">
                    <img class="vignette" src='<?= $path . $file ?>'>
                    <div class="row">
                        <input type="hidden" name="path" value="<?= $path ?>">
                        <input type="hidden" name="oldFile" value="<?= $file ?>">
                        <input class="form-control form-control-sm" type="text" name="file" value="<?= $file ?>">
                        <input type="submit" name="submit" value="edit" class="form-control col-3 btn btn-warning">
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" value="delete" class="form-control col-12 btn btn-danger">
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    <?php
    }

    /**
     * Return Html code for displaying a product card
     */
    public function productCard(object $produit, $width = 21, $height = 55, $textlength = 200)
    {
    ?>

        <div class="col-sm d-flex justify-content-center mb-4 ">
            <div class="card text-decoration-none text-body" style="width: <?= $width ?>rem;" id="shadowproduct">
                <img style="height: <?= $height ?>vh;" class="img-card-custom border-img-top" src="public/img/<?= $produit->nom_image_p ?>" alt="...">
                <div class="card-body d-flex flex-column justify-content-between " method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
                    <div class="d-flex col-12">
                        <div class="col-9">
                            <h5 class="card-title"><?= $produit->nom_p ?></h5>
                        </div>
                        <div class="col-3 fs-6 fw-bold" style="font-family:Montserrat, sans-serif;"><?= $produit->prix_ht_p ?>,00€</div>
                    </div>
                    <p class=" card-text description-produit"><?= $produit->troncateText($produit->description_p, $textlength) ?></p>

                    <form class="d-flex justify-content-between mt-4" method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
                        <input type="hidden" name="fromPage" value="<?= $_SERVER["QUERY_STRING"] ?>">

                        <button class="btn btn-primary custom2 fw-bold fs-5" style="font-family: 'Ubuntu', sans-serif; " type="submit" name="add">
                            <svg width=" 44" height="40" viewBox="0 0 44 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5457 37.65C17.5499 37.65 18.3639 36.8862 18.3639 35.944C18.3639 35.0019 17.5499 34.2381 16.5457 34.2381C15.5416 34.2381 14.7275 35.0019 14.7275 35.944C14.7275 36.8862 15.5416 37.65 16.5457 37.65Z" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M36.5457 37.65C37.5499 37.65 38.3639 36.8862 38.3639 35.944C38.3639 35.0019 37.5499 34.2381 36.5457 34.2381C35.5416 34.2381 34.7275 35.0019 34.7275 35.944C34.7275 36.8862 35.5416 37.65 36.5457 37.65Z" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 2H9.27273L14.1455 24.3161C14.3117 25.0834 14.7671 25.7727 15.4319 26.2632C16.0967 26.7538 16.9285 27.0144 17.7818 26.9994H35.4545C36.3078 27.0144 37.1397 26.7538 37.8045 26.2632C38.4693 25.7727 38.9246 25.0834 39.0909 24.3161L42 10.3331H11.0909" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <input class="btn btn-primary custom2 fw-bold fs-5" style="font-family: 'Ubuntu', sans-serif;" type="submit" name="show" value="INFO" href="index.php?page=produit&id_p=<?= $produit->id_p ?>">

                    </form>

                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Return HTML code <a href></a> for sub categorie navigation
     */
    public function subCategorieNavbar(array $sous_categories)
    {
        foreach ($sous_categories as $sous_categorie) : ?>
            <a class="btn btn-custom p-3 col-3 m-2 fs-2 fw-bold" style="font-family:Montserrat, sans-serif;" href="index.php?page=categorie&id_sc=<?= $sous_categorie->id_sc ?>"><?= $sous_categorie->nom_sc ?></a>

        <?php endforeach;
    }

    /**
     * Return HTML code displaying user cart
     */
    public function cart($lignes, $produits)
    {
        $total = 0; ?>

        <h1 class="m-4">Votre Pannier :</h1>
        <?php foreach ($lignes as $ligne) {
            foreach ($produits as $produit) {
                if ($produit->id_p == $ligne->id_p) :
                    $stotal = (int) $ligne->qt_article * (int) $produit->prix_ht_p;
                    $total += $stotal; ?>
                    <div class="container-fluid">
                        <form action='index.php?page=panier' method='post' class="border rounded pb-3 mb-4">
                            <input type="hidden" name="id_comp" value="<?= $ligne->id_comp ?>">
                            <div class="modal-header">
                                <h5 class="modal-title text-center fw-bold fs-4" style="font-family: 'Ubuntu', sans-serif;"><?= $produit->nom_p ?></h5>
                                <input class="btn-close" type="submit" name="delete" value="">
                            </div>
                            <div class="modal-body row">
                                <div class="col-3"><img class="img-thumbnail--custom" src="public/img/<?= $produit->nom_image_p ?>" alt="..."></div>
                                <div class="col-9 row align-items-center">
                                    <div class="col-3 fw-bold fs-4" style="font-family: 'Ubuntu', sans-serif;">Prix: <?= $produit->prix_ht_p ?>,00€</div>
                                    <div class="col-6 text-center align-content-center fw-bold fs-4" style="font-family: 'Ubuntu', sans-serif;">Quantité : <input style="display:inline; width:5rem; border:none;" type="text" name="qt_article" value="<?= $ligne->qt_article ?>"> <input class="btn btn-primary custom2" type="submit" name="edit" value="Editer"></div>
                                    <div class="col-3 fw-bold fs-4" style="font-family: 'Ubuntu', sans-serif;">
                                        Total: <?= $stotal ?>,00€
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
        <?php endif;
            }
        }


        ?>
        <div class="d-flex mt-5">
            <h2 class="col-6 text-center fw-bold fs-4" style="font-family: 'Ubuntu', sans-serif;">
                Prix total: <?= $total ?>,00€
            </h2>
            <div class="col-6 text-center">
                <form action="index.php?page=paiement" method="post">
                    <input type="hidden" value="<?= $total ?>" name="price">
                    <input class="btn btn-primary custom2 fw-bold fs-4" style="font-family: 'Ubuntu', sans-serif;" type="submit" value="Valider votre pannier !">
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Return HTML code for displaying order with lignes details
     */
    public function orders($orders)
    {
        foreach ($orders as $order) : ?>
            <div class="card w-80">
                <div class="card-header">
                    <h5 class="card-title text-center">Commande n° <?= $order->id_com ?> du <?= $order->date_com ?></h5>
                </div>
                <div class="card-body">

                    <p class="card-text">Détail de la commande:</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2">Réf</div>
                            <div class="col-4">Nom</div>
                            <div class="col-2">Quantité</div>
                            <div class="col-2">Prix</div>
                            <div class="col-2">Total</div>

                        </div>
                    </li>
                    <?php foreach ($order->lignes as $ligne) : ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-2 "><?= $ligne->id_p ?></div>
                                <div class="col-4"><?= $ligne->nom_p ?></div>
                                <div class="col-2"><?= $ligne->qt_article ?> </div>
                                <div class="col-2"><?= $ligne->prix_ht_p ?>,00€</div>
                                <div class="col-2"><?= ((int)$ligne->prix_ht_p * (int)$ligne->qt_article)  ?>,00€</div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2 offset-10">Prix total : <?= ((int)$order->prix_ttc_com) / 100 ?>,00€</div>
                        </div>
                    </li>
                </ul>
            </div>
<?php endforeach;
    }
}
