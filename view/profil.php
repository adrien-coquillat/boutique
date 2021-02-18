<?php
$array = explode(', ', $_SESSION['user']['adresse_u'], 4);
?>

<div class="container-fluid p-5">
    <h1 class="mt-5 pt-5">Profil</h1>
    <?= (isset($msg)) ?  $msg : '' ?>
    <form action="index.php?page=profil" method="post">
        <input type="text" name="login_u" placeholder="Login" value="<?= $_SESSION['user']['login_u'] ?>">
        <input type="text" name="nom_u" placeholder="Nom" value="<?= $_SESSION['user']['nom_u'] ?>">
        <input type="text" name="prenom_u" placeholder="Prénom" value="<?= $_SESSION['user']['prenom_u'] ?>">
        <input type="text" name="numero_rue_adresse_u" placeholder="N°" value="<?= $array[0] ?>">
        <input type="text" name="nom_rue_adresse_u" placeholder="Nom de la rue" value="<?= $array[1] ?>">
        <input type="text" name="ville_adresse_u" placeholder="Ville" value="<?= $array[2] ?>">
        <input type="text" name="postal_adresse_u" placeholder="Code postal" value="<?= $array[3] ?>">
        <input type="email" name="mail_u" placeholder="Email" value="<?= $_SESSION['user']['mail_u'] ?>">
        <input type="tel" name="telephone_u" placeholder="Téléphone" value="<?= $_SESSION['user']['telephone_u'] ?>">
        <input type="date" name="datedenaissance_u" placeholder="Date de naissance" value="<?= $_SESSION['user']['datedenaissance_u'] ?>">
        <input type="password" name="motdepass_u" placeholder="Password" value="">
        <input type="password" name="motdepass_u_conf" placeholder="Confirmation du password" value="">
        <input type="submit" value="Profil" name="profil">
    </form>
</div>