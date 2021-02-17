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
                                <td><input type='submit' name='submit' value='del'></td>
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
    public function imgGallery(string $path)
    {
        $dirContent = scandir($path);
        $imgList = [];
        foreach ($dirContent as $file) {
            if (preg_match('/[jpg|png|gif]$/', $file))
                $imgList[] = $path . $file;
        } ?>
        <?php foreach ($imgList as $imgFileName) : ?>
            <img src='<?= $imgFileName ?>' width='100px' height='100px'>
        <?php endforeach; ?>
<?php
    }
}
