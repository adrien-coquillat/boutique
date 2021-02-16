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
        $id_key = key($dataSet[0]);

        ob_start(); ?>
        <div class="table-responsive">
            <table class='table table-sm table-striped table-hover'>
                <thead>
                    <th></th>
                    <th></th>
                    <?php
                    foreach ($dataSet[0] as $key => $value) { ?>
                        <th><?= $key ?></th>
                    <?php
                    } ?>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataSet as $data) { ?>
                        <tr>
                            <form action="<?= $actionURL ?>" method="POST">
                                <td><input type='submit' name='submit' value='edit'></td>
                                <td><input type='submit' name='submit' value='del'></td>
                                <?php
                                foreach ($data as $key => $value) { ?>
                                    <td><input class='bo-input' type='text' name='<?= $key ?>' value='<?= $value ?>'></td>
                                <?php
                                } ?>
                            </form>
                        </tr> <?php
                            }
                                ?>
                <tbody>
            </table>
        </div>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    /**
     * Return HTML form according parameters
     */
    public function addForm(object $model, string $actionURL = '')
    {
        reset($model);
        $ignore = key($model);
        ob_start();
    ?>

        <form action="<?= $actionURL ?>" method="POST">
            <?php
            foreach ($model as $key => $value) {
                if ($key == $ignore) {
                    continue;
                }
            ?>
                <div class="mb-3">
                    <label class="form-label" for="<?= $key ?>"><?= $key ?></label>
                    <input class="form-control form-control-sm" id="<?= $key ?>" name="<?= $key ?>" type="text" placeholder="<?= $value ?>">
                </div>
            <?php
            }
            ?>
            <input type="submit" value="Add">
        </form>
    <?php
        $html = ob_get_clean();
        return $html;
    }

    /**
     * 
     */
    public function dashboard($dataSet)
    {
    ?>
        <div class="accordion" id="accordionExample">
            <?php
            $i = 1;

            foreach ($dataSet as $key => $value) { ?>
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
                                    <?= $this->htmlTableForm($value, "index.php?page=backoffice&action=edit_del&table=$key") ?>
                                </div>
                                <div class="tab-pane fade" id="nav-add<?= $i ?>" role="tabpanel" aria-labelledby="nav-add-tab">
                                    <?= $this->addForm($value[0], "index.php?page=backoffice&action=add&table=$key") ?>
                                </div>
                            </div>
                            <!-- panel stop here-->
                        </div>
                    </div>
                </div>
            <?php
                $i++;
            } ?>
        </div>
<?php
    }
}
