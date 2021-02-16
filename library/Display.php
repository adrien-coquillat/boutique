<?php

namespace library;

class Display
{
    public function htmlTableForm(array $dataSet)
    { ?>
        <div class="table-responsive">
            <form action="index.php?page=backoffice" method="POST">
                <table class='table table-sm table-striped table-hover'>
                    <?php
                    echo '<thead>';
                    echo "<th></th>";
                    echo "<th></th>";
                    foreach ($dataSet[0] as $key => $value) {
                        echo "<th>$key</th>";
                    }
                    echo '</thead>';
                    echo '<tbody>';
                    foreach ($dataSet as $data) {
                        echo '<tr>';
                        echo "<td><input type='submit' name='edit-{$data->id_u}' value='Edit'></td>";
                        echo "<td><input type='submit' name='supp-{$data->id_u}' value='Supp'></td>";
                        foreach ($data as $key => $value) {
                            echo "<td><input class='bo-input' type='text' name='$key' value='$value'></td>";
                        }
                        echo '</tr>';
                    }
                    echo '<tbody>';
                    ?>
                </table>
            </form>
        </div>
<?php
    }
}
