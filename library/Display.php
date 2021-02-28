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
                                        <td><input class='bo-input' type='text' name='<?= $key ?>' value='<?= $value ?>'></td>
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

    public function productCard(object $produit, $width = 21, $textlength = 200)
    { ?>
        <div class="col-sm d-flex justify-content-center">
            <a href="index.php?page=produit&id_p=<?= $produit->id_p ?>" class="card text-decoration-none text-body" style="width: <?= $width ?>rem;">
                <img class="img-card-custom border-img-top" src="public/img/<?= $produit->nom_image_p ?>" alt="...">
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

    public function subCategorieNavbar(array $sous_categories)
    {
        foreach ($sous_categories as $sous_categorie) : ?>
            <a class="btn btn-custom p-3 " href="index.php?page=categorie&id_sc=<?= $sous_categorie->id_sc ?>"><?= $sous_categorie->nom_sc ?></a>

<?php endforeach;
    }
}
