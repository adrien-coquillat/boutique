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
                        <input class="form-control form-control-sm type=" text" name="file" value="<?= $file ?>">
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
    { ?>
        <div class="col-sm d-flex justify-content-center mb-4">
            <a href="index.php?page=produit&id_p=<?= $produit->id_p ?>" class="card text-decoration-none text-body" style="width: <?= $width ?>rem;">
                <img style="height: <?= $height ?>vh;" class="img-card-custom border-img-top" src="public/img/<?= $produit->nom_image_p ?>" alt="...">
                <div class="card-body" method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
                    <h5 class="card-title"><?= $produit->nom_p ?></h5>
                    <p class="card-text"><?= $produit->troncateText($produit->description_p, $textlength) ?></p>
                    <form method="POST" action="index.php?page=produit&id_p=<?= $produit->id_p ?>">
                        <input type="hidden" name="fromPage" value="<?= $_SERVER["QUERY_STRING"] ?>">
                        <input class="btn btn-primary" type="submit" name="add" value="Ajouter Panier">
                        <input class="btn btn-primary" type="submit" name="show" value="Voir +">
                    </form>
                </div>
            </a>
        </div>
        <?php
    }

    /**
     * Return HTML code <a href></a> for sub categorie navigation
     */
    public function subCategorieNavbar(array $sous_categories)
    {
        foreach ($sous_categories as $sous_categorie) : ?>
            <a class="btn btn-custom p-3 col-3 m-2" href="index.php?page=categorie&id_sc=<?= $sous_categorie->id_sc ?>"><?= $sous_categorie->nom_sc ?></a>

            <?php endforeach;
    }

    /**
     * Return HTML code displaying user cart
     */
    public function cart($lignes, $produits)
    {
        $total = 0;
        foreach ($lignes as $ligne) {
            foreach ($produits as $produit) {
                if ($produit->id_p == $ligne->id_p) :
                    $stotal = (int) $ligne->qt_article * (int) $produit->prix_ht_p;
                    $total += $stotal; ?>
                    <form action='index.php?page=panier' method='post' class="row border rounded pb-3 mb-4">
                        <input type="hidden" name="id_comp" value="<?= $ligne->id_comp ?>">
                        <div class="modal-header">
                            <h5 class="modal-title text-center"><?= $produit->nom_p ?></h5>
                            <input class="btn-close" type="submit" name="delete" value="">
                        </div>
                        <div class="modal-body row">
                            <div class="col-3"><img class="img-thumbnail--custom" src="public/img/<?= $produit->nom_image_p ?>" alt="..."></div>
                            <div class="col-9 row align-items-center">
                                <div class="col-3">Prix: <?= $produit->prix_ht_p ?>,00€</div>
                                <div class="col-6 text-center align-content-center">quantité: <input style="display:inline ; width : 3rem" type="text" name="qt_article" value="<?= $ligne->qt_article ?>"> <input class="btn btn-primary" type="submit" name="edit" value="Editer"></div>
                                <div class="col-3">
                                    Total: <?= $stotal ?>,00€
                                </div>
                            </div>
                        </div>
                    </form>
        <?php endif;
            }
        }


        ?>
        <div class="row">
            <div class="col-6 text-center">
                Prix total: <?= $total ?>,00€
            </div>
            <div class="col-6 text-center">
                <form action="index.php?page=paiement" method="post">
                    <input type="hidden" value="<?= $total ?>" name="price">
                    <input class="btn btn-custom" type="submit" value="Acheter">
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
            <div class="card m-3">
                <div class="card-header">
                    <h5 class="card-title text-center">Order n° <?= $order->id_com ?> from <?= $order->date_com ?></h5>
                </div>
                <div class="card-body">

                    <p class="card-text">Details of your order:</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-2 ">Réf</div>
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
                            <div class="col-2 offset-10"><?= ((int)$order->prix_ttc_com) / 100 ?>,00€</div>
                        </div>
                    </li>
                </ul>
            </div>
<?php endforeach;
    }
}
