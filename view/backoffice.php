<?php
if (isset($data)) {
    extract($data);
}
?>
<div class="container-fluid p-5">

    <h1 class="mt-5 pt-5">Back office</h1>
    <?= (isset($msg)) ?  $msg : '' ?>


    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-utilisateur-tab" data-bs-toggle="tab" data-bs-target="#nav-utilisateur" type="button" role="tab" aria-controls="nav-utilisateur" aria-selected="true">Utilisateurs</button>
            <button class="nav-link" id="nav-categorie-tab" data-bs-toggle="tab" data-bs-target="#nav-categorie" type="button" role="tab" aria-controls="nav-categorie" aria-selected="false">Categorie</button>
            <button class="nav-link" id="nav-produit-tab" data-bs-toggle="tab" data-bs-target="#nav-produit" type="button" role="tab" aria-controls="nav-produit" aria-selected="false">Produit</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-utilisateur" role="tabpanel" aria-labelledby="nav-utilisateur-tab">
            <div class="table-responsive">
                <form action="index.php?page=backoffice" method="POST">
                    <table class='table table-sm table-striped table-hover'>
                        <?php
                        echo '<thead>';
                        echo "<th></th>";
                        echo "<th></th>";
                        foreach ($users[0] as $key => $value) {
                            echo "<th>$key</th>";
                        }
                        echo '</thead>';
                        echo '<tbody>';
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo "<td><input type='submit' name='edit-{$user->id_u}' value='Edit'></td>";
                            echo "<td><input type='submit' name='supp-{$user->id_u}' value='Supp'></td>";
                            foreach ($user as $key => $value) {
                                echo "<td><input class='bo-input' type='text' name='$key' value='$value'></td>";
                            }
                            echo '</tr>';
                        }
                        echo '<tbody>';

                        ?>
                    </table>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-categorie" role="tabpanel" aria-labelledby="nav-categorie-tab">..2.</div>
        <div class="tab-pane fade" id="nav-produit" role="tabpanel" aria-labelledby="nav-produit-tab">..3.</div>
    </div>
</div>