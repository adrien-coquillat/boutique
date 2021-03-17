<div class="container-fluid p-0">
    <section class="title-screen">
        <img class="title-screen__img" src="public/img/Categorie.jpg">
        <h1 class="title-screen__title">Recherche</h1>
    </section>
</div>
<div class="container-fluid mt-3 mb-3">
    <h1 class="">Résultat de votre recherche pour : <?= isset($keywords) ? $keywords : 'OOoOps, j\'ai oublié..' ?></h1>

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