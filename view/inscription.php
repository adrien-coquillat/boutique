<h1>Inscription</h1>
<form action="index.php?page=inscription" method="post">
    <input type="text" name="login_u" placeholder="Login" value="<?= isset($_POST['login_u']) ? $_POST['login_u'] : ''; ?>">
    <input type="text" name="nom_u" placeholder="Nom" value="<?= isset($_POST['nom_u']) ? $_POST['nom_u'] : ''; ?>">
    <input type="text" name="prenom_u" placeholder="Prénom" value="<?= isset($_POST['prenom_u']) ? $_POST['prenom_u'] : ''; ?>">
    <input type="text" name="numero_rue_adresse_u" placeholder="N°" value="<?= isset($_POST['numero_rue_adresse_u']) ? $_POST['numero_rue_adresse_u'] : ''; ?>">
    <input type="text" name="nom_rue_adresse_u" placeholder="Nom de la rue" value="<?= isset($_POST['nom_rue_adresse_u']) ? $_POST['nom_rue_adresse_u'] : ''; ?>">
    <input type="text" name="ville_adresse_u" placeholder="Ville" value="<?= isset($_POST['ville_adresse_u']) ? $_POST['ville_adresse_u'] : ''; ?>">
    <input type="text" name="postal_adresse_u" placeholder="Code postal" value="<?= isset($_POST['postal_adresse_u']) ? $_POST['postal_adresse_u'] : ''; ?>">
    <input type="email" name="mail_u" placeholder="Email" value="<?= isset($_POST['mail_u']) ? $_POST['mail_u'] : ''; ?>">
    <input type="tel" name="telephone_u" placeholder="Téléphone" value="<?= isset($_POST['telephone_u']) ? $_POST['telephone_u'] : ''; ?>">
    <input type="password" name="motdepass_u" placeholder="Password" value="<?= isset($_POST['motdepass_u']) ? $_POST['motdepass_u'] : ''; ?>">
    <input type="password" name="motdepass_u_conf" placeholder="Confirmation du password" value="<?= isset($_POST['motdepass_u_conf']) ? $_POST['motdepass_u_conf'] : ''; ?>">
    <input type="submit" value="Inscription" name="inscription">
</form>