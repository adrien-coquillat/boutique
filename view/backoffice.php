<?php
if (!isset($data)) :
    // GET data in case of Exception has been generated
    $data = $controller->dashboard();
endif;

?>
<div class="container-fluid mt-5 p-5">
    <h1 class="mt-5 pt-5">Back office</h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item m-1" role="presentation">
            <button class="btn border nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'image' || $_GET['pane'] == 'password' || $_GET['pane'] == 'producteditor' || $_GET['pane'] == 'homepageeditor') ? '' : 'active' ?>" id="pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#pills-dashboard" type="button" role="tab" aria-controls="pills-dashboard" aria-selected="true">
                Dashboard
            </button>
        </li>
        <li class="nav-item m-1" role="presentation">
            <button class="btn border nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'image') ? 'active' : '' ?>" id="pills-upload-tab" data-bs-toggle="pill" data-bs-target="#pills-upload" type="button" role="tab" aria-controls="pills-upload" aria-selected="false">
                Image handeler
            </button>
        </li>
        <li class="nav-item m-1" role="presentation">
            <button class="btn border nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'password') ? 'active' : '' ?>" id="pills-passwordtools-tab" data-bs-toggle="pill" data-bs-target="#pills-passwordtools" type="button" role="tab" aria-controls="pills-passwordtools" aria-selected="false">
                Passwords tools
            </button>
        </li>
        <li class="nav-item m-1" role="presentation">
            <button class="btn border nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'producteditor') ? 'active' : '' ?>" id="pills-producteditor-tab" data-bs-toggle="pill" data-bs-target="#pills-producteditor" type="button" role="tab" aria-controls="pills-producteditor" aria-selected="false">
                Product editor
            </button>
        </li>
        <li class="nav-item m-1" role="presentation">
            <button class="btn border nav-link <?= isset($_GET['pane']) && ($_GET['pane'] == 'homepageeditor') ? 'active' : '' ?>" id="pills-homepageeditor-tab" data-bs-toggle="pill" data-bs-target="#pills-homepageeditor" type="button" role="tab" aria-controls="pills-homepageeditor" aria-selected="false">
                Home page editor
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'image' || $_GET['pane'] == 'password' || $_GET['pane'] == 'producteditor' || $_GET['pane'] == 'homepageeditor') ? '' : 'show active' ?>" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
            <!-- Dashboard -->
            <div class="accordion" id="accordionExample">
                <?php
                $i = 1;
                $info = '';
                foreach ($data as $key => $value) :
                    if (empty($value)) :
                        $info .= 'Table ' . ucfirst($key) . ' is empty or missing in db, please create manually at least one entry in table for displaying it.<br />';
                        continue;
                    endif; ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?= $i ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse<?= $i ?>">
                                <?= $key ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!-- Panel start here-->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-show-tab" data-bs-toggle="tab" data-bs-target="#nav-show<?= $i ?>" type="button" role="tab" aria-controls="nav-show" aria-selected="true">Show / Edit / Supp</button>
                                        <button class="nav-link" id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add<?= $i ?>" type="button" role="tab" aria-controls="nav-add" aria-selected="false">Add</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-show<?= $i ?>" role="tabpanel" aria-labelledby="nav-show-tab">
                                        <?= $display->htmlTableForm($value, "index.php?page=backoffice&action=editDeleteDb&table=$key") ?>
                                    </div>
                                    <div class="tab-pane fade" id="nav-add<?= $i ?>" role="tabpanel" aria-labelledby="nav-add-tab">
                                        <?= $display->addForm($value[0], "index.php?page=backoffice&action=add&table=$key") ?>
                                    </div>
                                </div>
                                <!-- panel stop here-->
                            </div>
                        </div>
                    </div>
                <?php
                    $i++;
                endforeach; ?>
            </div>
            <?= $info != '' ? "<div class='alert alert-info' role='alert'>$info</div>" : ''; ?>
            <!-- Dashboard -->
        </div>
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'image') ? 'show active' : '' ?>" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
            <!-- Upload img & gallery-->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-gallery-tab" data-bs-toggle="tab" data-bs-target="#nav-gallery" type="button" role="tab" aria-controls="nav-gallery" aria-selected="true">Gallery</button>
                    <button class="nav-link" id="nav-newpic-tab" data-bs-toggle="tab" data-bs-target="#nav-newpic" type="button" role="tab" aria-controls="nav-newpic" aria-selected="false">New pic</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                    <?= $display->imgGalleryForm('public/img/', 'index.php?page=backoffice&action=editDeleteFile') ?>
                </div>
                <div class="tab-pane fade" id="nav-newpic" role="tabpanel" aria-labelledby="nav-newpic-tab">
                    <form action="index.php?page=backoffice&action=uploadFile" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upolad a new image</label>
                            <div class="input-group mb-3">
                                <input required class="form-control" type="file" name="fileToUpload" id="formFile">
                                <input class="btn btn-outline-primary" type="submit" name="submit" value="upload">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- Upload img & gallery-->
        </div>
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'password') ? 'show active' : '' ?>" id="pills-passwordtools" role="tabpanel" aria-labelledby="pills-passwordtools-tab">
            <!-- Password tools -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-encrypt-tab" data-bs-toggle="tab" data-bs-target="#nav-encrypt" type="button" role="tab" aria-controls="nav-encrypt" aria-selected="true">Encrypt</button>
                    <button class="nav-link" id="nav-verify-tab" data-bs-toggle="tab" data-bs-target="#nav-verify" type="button" role="tab" aria-controls="nav-verify" aria-selected="false">Verify</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active<?= isset($_POST['crypt']) ? 'show active' : ''; ?>" id="nav-encrypt" role="tabpanel" aria-labelledby="nav-encrypt-tab">
                    <form action="index.php?page=backoffice&pane=password" method="POST">
                        <input type="text" name="mdp" value=<?= isset($_POST['mdp']) ? $_POST['mdp'] : '' ?>>
                        <input type="submit" name="crypt" value="Crypt">
                    </form>
                    <?= (isset($_POST['mdp']) && isset($_POST['crypt'])) ? password_hash($_POST['mdp'], PASSWORD_DEFAULT) : '' ?>
                </div>
                <div class="tab-pane fade <?= isset($_POST['verify']) ? 'show active' : ''; ?>" id="nav-verify" role="tabpanel" aria-labelledby="nav-verify-tab">
                    <form action="index.php?page=backoffice&pane=password" method="POST">
                        <input type="text" name="mdp_clear" placeholder='Clear password' value=<?= isset($_POST['mdp_clear']) ? $_POST['mdp_clear'] : '' ?>>
                        <input type="text" name="mdp_hash" placeholder='Encrypt password' value=<?= isset($_POST['mdp_hash']) ? $_POST['mdp_hash'] : '' ?>>
                        <input type="submit" name="verify" value="Verify">
                    </form>
                    <?php
                    if (isset($_POST['verify'])) {
                        echo password_verify($_POST['mdp_clear'], $_POST['mdp_hash']) ? 'Passwords are equals.' : 'Passwords are differents.';
                    }
                    ?>
                </div>
            </div>
            <!-- Password tools -->
        </div>
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'producteditor') ? 'show active' : '' ?>" id="pills-producteditor" role="tabpanel" aria-labelledby="pills-producteditor-tab">
            <!-- Product editor -->
            <form action="index.php?page=backoffice&pane=producteditor" method="POST">
                <select name="id_p">
                    <?php foreach ($data["produit"] as $produit) : ?>
                        <option <?= isset($_POST['id_p']) && $_POST['id_p'] == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                    <?php endforeach; ?>
                </select>
                <input class="btn btn-secondary" type="submit" value="Editer">
            </form>
            <form action="index.php?page=backoffice&action=producteditor" method="POST">
                <textarea name="description_p">
                <?= isset($_POST['id_p']) ? $data["produit"][$data["produit"][0]->getIndexinArrayWithId($data["produit"], ($_POST['id_p']))]->description_p : 'Select one product to edit description' ?>
                </textarea>
                <input type="hidden" name="id_p" value="<?= isset($_POST['id_p']) ? $_POST['id_p'] : '' ?>">
                <input class="btn btn-primary" type="submit" value="Enregistrer">
            </form>
            <script>
                tinymce.init({
                    selector: 'textarea',
                    menubar: 'edit format',
                    height: 400,
                });
            </script>
            <!-- Product editor -->
        </div>
        <div class="tab-pane fade <?= isset($_GET['pane']) && ($_GET['pane'] == 'homepageeditor') ? 'show active' : '' ?>" id="pills-homepageeditor" role="tabpanel" aria-labelledby="pills-homepageeditor-tab">
            <!-- Homepage editor -->
            <form method="POST" action="index.php?page=backoffice&action=homepageeditor">
                <div class="card">
                    <img src="public/img/welcome-pic.jpg" style="height : 25vh;" class="card-img-top welcome-screen__img" alt="...">
                    <div class="card-img-overlay">
                        <h1 class="card-title" style="color: white;">Title <input type="text" name="<?= $conf['title']->id ?>" id="" value="<?= $conf['title']->value ?>"> </h1>
                        <h2 class="card-text" style="color: white;">Subtitle <input type="text" name="<?= $conf['subtitle']->id ?>" id="" value="<?= $conf['subtitle']->value  ?>"> </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Best sellers products catch phrase <input type="text" name="<?= $conf['best_sellers_catch_phrase']->id ?>" id="" value="<?= $conf['best_sellers_catch_phrase']->value ?>"> </h5>
                    </div>
                    <ul class=" list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Best sellers product n??1</h5>
                                        <p class="card-text">
                                            <select name="<?= $conf['best_sellers_first_id_p']->id ?>">
                                                <?php foreach ($data["produit"] as $produit) : ?>
                                                    <option <?= $conf['best_sellers_first_id_p']->value  == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Best sellers product n??2</h5>
                                        <p class="card-text">
                                            <select name="<?= $conf['best_sellers_second_id_p']->id ?>">
                                                <?php foreach ($data["produit"] as $produit) : ?>
                                                    <option <?= $conf['best_sellers_second_id_p']->value  == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Best sellers product n??3</h5>
                                        <p class="card-text">
                                            <select name="<?= $conf['best_sellers_third_id_p']->id ?>">
                                                <?php foreach ($data["produit"] as $produit) : ?>
                                                    <option <?= $conf['best_sellers_third_id_p']->value  == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </ul>
                    <div class="card-body">
                        <h5 class="card-title">Carousel products</h5>
                        <p class="card-text"> interval <input type="text" name="<?= $conf['carousel_interval']->id ?>" value="<?= $conf['carousel_interval']->value ?>"> ms</p>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Carousel product n??1</h5>
                                        <p class="card-text">
                                            <select name="<?= $conf['carousel_first_id_p']->id ?>">
                                                <?php foreach ($data["produit"] as $produit) : ?>
                                                    <option <?= $conf['carousel_first_id_p']->value  == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Carousel product n??2</h5>
                                        <p class="card-text">
                                            <select name="<?= $conf['carousel_second_id_p']->id ?>">
                                                <?php foreach ($data["produit"] as $produit) : ?>
                                                    <option <?= $conf['carousel_second_id_p']->value  == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Carousel product n??3</h5>
                                        <p class="card-text">
                                            <select name="<?= $conf['carousel_third_id_p']->id ?>">
                                                <?php foreach ($data["produit"] as $produit) : ?>
                                                    <option <?= $conf['carousel_third_id_p']->value  == $produit->id_p ? 'selected' : '' ?> value="<?= $produit->id_p ?>"><?= $produit->nom_p ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </li>

                    </ul>
                    <div class="card-body text-center">
                    </div>

                </div>
                <div class="row">
                    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications">
                </div>
            </form>

            <!-- Homepage editor -->
        </div>
    </div>


</div>