<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Résultat de votre recherche pour : <?= isset($keywords) ? $keywords : 'OOoOps, j\'ai oublié..' ?></h1>

    <!-- Tag used to display exception -->
    <?= (isset($msg)) ?  $msg : '' ?>

    <div class="row">
        <?php
        $html = '';
        ob_start();
        foreach ($results as $produit) {
            $display->productCard($produit, 15, 20, 50);
        }
        $html .= ob_get_clean();
        echo $html = $html == '' ? 'Désolé, aucun résultat pour votre recherche, il va falloir fouiller à la main.' : $html;
        ?>
    </div>

</div>