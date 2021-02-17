<?php
if (!isset($data)) :
    // GET data in case of Exception has been generated
    $data = $controller->dashboard();
endif;
?>
<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Back office</h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>


    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="btn border nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#pills-dashboard" type="button" role="tab" aria-controls="pills-dashboard" aria-selected="true">
                Dashboard
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="btn border nav-link" id="pills-upload-tab" data-bs-toggle="pill" data-bs-target="#pills-upload" type="button" role="tab" aria-controls="pills-upload" aria-selected="false">
                Image handeler
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="btn border nav-link" id="pills-passwordtools-tab" data-bs-toggle="pill" data-bs-target="#pills-passwordtools" type="button" role="tab" aria-controls="pills-passwordtools" aria-selected="false">
                Passwords tools
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
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
                                        <?= $display->htmlTableForm($value, "index.php?page=backoffice&action=edit_del&table=$key") ?>
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
        <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
            <!-- Upload img -->

            <?= $display->imgGallery('public/img/') ?>
            <!-- Upload img -->
        </div>
        <div class="tab-pane fade" id="pills-passwordtools" role="tabpanel" aria-labelledby="pills-passwordtools-tab">
            <!-- Password tools -->
            <!-- Password tools -->
        </div>
    </div>


</div>