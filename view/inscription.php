<div class="container-fluid p-0">
    <section class="inscription-screen">
        <img class="inscription-screen__img" src="public/img/Rectangle 8.png">
        <h1 class="inscription-screen__title">Inscription</h1>
    </section>

    <!-- Bloc Inscription -->
    <div class="conteneur-inscription">
        <div class="conteneur-bg">
            <div class="colgauche">
                <h1 class="titreinscription">Inscrit-toi dès maintenant !</h1>
                <?= (isset($msg)) ?  $msg : '' ?>
                <form class="form-user" action="index.php?page=inscription" method="post">
                    <div class="ligne">

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingLogin" placeholder="Login" name="login_u" value="<?= isset($_POST['login_u']) ? $_POST['login_u'] : ''; ?>">
                            <label for="floatingLogin">Login</label>
                        </div>
                    </div>
                    <div class="ligne">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNom" name="nom_u" placeholder="Nom" value="<?= isset($_POST['nom_u']) ? $_POST['nom_u'] : ''; ?>">
                            <label for="floatingNom">Nom</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPrenom" name="prenom_u" placeholder="Prénom" value="<?= isset($_POST['prenom_u']) ? $_POST['prenom_u'] : ''; ?>">
                            <label for="floatingPrenom">Prénom</label>
                        </div>
                    </div>
                    <div class="ligne">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingN" name="numero_rue_adresse_u" placeholder="N°" value="<?= isset($_POST['numero_rue_adresse_u']) ? $_POST['numero_rue_adresse_u'] : ''; ?>">
                            <label for="floatingN">N°</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNomrue" name="nom_rue_adresse_u" placeholder="Nom de la rue" value="<?= isset($_POST['nom_rue_adresse_u']) ? $_POST['nom_rue_adresse_u'] : ''; ?>">
                            <label for="floatingNomrue">Nom de la rue</label>
                        </div>
                    </div>
                    <div class="ligne">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingVille" name="ville_adresse_u" placeholder="Ville" value="<?= isset($_POST['ville_adresse_u']) ? $_POST['ville_adresse_u'] : ''; ?>"">
                            <label for=" floatingVille">Ville</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingCodepostal" name="postal_adresse_u" placeholder="Code postal" value="<?= isset($_POST['postal_adresse_u']) ? $_POST['postal_adresse_u'] : ''; ?>">
                            <label for="floatingCodepostal">Code postal</label>
                        </div>
                    </div>
                    <div class="ligne">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingMail" name="mail_u" placeholder="Email" value="<?= isset($_POST['mail_u']) ? $_POST['mail_u'] : ''; ?>">
                            <label for="floatingMail">Adresse mail</label>
                        </div>
                        <div class="form-floating">
                            <input type="tel" class="form-control" id="floatingTel" name="telephone_u" placeholder="Téléphone" value="<?= isset($_POST['telephone_u']) ? $_POST['telephone_u'] : ''; ?>"">
                            <label for=" floatingTel">Numéro de téléphone</label>
                        </div>
                    </div>

                    <div class="ligne">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingNaissance" name="datedenaissance_u" placeholder="Date de naissance" value="<?= isset($_POST['datedenaissance_u']) ? $_POST['datedenaissance_u'] : ''; ?>">
                            <label for="floatingNaissance">Date de naissance</label>
                        </div>
                    </div>
                    <div class="ligne">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="motdepass_u" placeholder="Password" value="<?= isset($_POST['motdepass_u']) ? $_POST['motdepass_u'] : ''; ?>">
                            <label for="floatingPassword">Mot de passe</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingCpassword" name="motdepass_u_conf" placeholder="Confirmation du password" value="<?= isset($_POST['motdepass_u_conf']) ? $_POST['motdepass_u_conf'] : ''; ?>">
                            <label for="floatingCpassword">Confirmation du mot de passe</label>
                        </div>
                    </div>
                    <div class="ligneb">
                        <input class="boutoninscription" type="submit" value="Inscription" name="inscription">
                    </div>
                </form>
            </div>
            <div class="coldroite">
                <p>
                    Prenez bien le temps de compléter au mieux les informations relatives à votre personne, relisez, corrigez avant votre envoi.</br>
                    Si, après envoi, vous souhaitez apporter une correction, contacter le Webmaster.</br>
                    Le comité de lecture ainsi que les administrateurs du site, se réservent le droit de corriger, d'alléger ou de détailler les documents lors de leur publication, sans obligation d'en faire part au contributeur.
                    Protection des données personnelles</br></br>

                    Les informations vous concernant nous sont réservées et nous nous engageons à ne pas céder ces données à des tiers.</br>

                    Vous disposez d’un droit d’accès, de rectification et de suppression des données vous concernant (articles 27 et 34 de la loi du 6 janvier 1978 Informatique et Libertés). Pour l’exercer, veuillez envoyer un e-mail avec le lien de contact situé en bas de chaque page
                </p>
            </div>
        </div>
    </div>

</div>