<?php
if (!isset($data)) :
    // GET data in case of Exception has been generated
    $data = $controller->dashboard();
endif;
?>
<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Back office</h1>


    <?= (isset($msg)) ?  $msg : '' ?>
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



</div>