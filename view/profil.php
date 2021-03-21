<div class="container-fluid m-6 bg-profil col-11">
    <?php if ((!isset($_SESSION['user'])) || ($_SESSION['user']['nom_u'] == "temp" &&  $_SESSION['user']['prenom_u'] == "temp")) : ?>
        <h2>Veuillez vous inscrire ou vous connnecter pour pouvoir modifier votre profil.</h2>
    <?php else : ?>
        <?php $array = explode(', ', $_SESSION['user']['adresse_u'], 4); ?>
        <div class="col-8">
            <h1 class="titreinscription">Modifie ton profil ici !</h1>
            <form class="form-user" action="index.php?page=panier&pane=profile" method="post">
                <div class="ligne">
                    <div class="form-floating col-5 ms-5">
                        <input type="text" class="form-control" id="floatingNom" name="nom_u" placeholder="Nom" value="<?= $_SESSION['user']['nom_u'] ?>">
                        <label for="floatingNom">Nom</label>
                    </div>

                    <div class="form-floating col-5 ms-5">
                        <input type="text" class="form-control" id="floatingPrenom" name="prenom_u" placeholder="Prénom" value="<?= $_SESSION['user']['prenom_u'] ?>">
                        <label for="floatingPrenom">Prénom</label>
                    </div>
                </div>
                <div class="ligne">
                    <div class="form-floating col-5 ms-5">
                        <input type="text" class="form-control" id="floatingN" name="numero_rue_adresse_u" placeholder="N°" value="<?= $array[0] ?>">
                        <label for="floatingN">N°</label>
                    </div>
                    <div class="form-floating col-5 ms-5">
                        <input type="text" class="form-control" id="floatingNomrue" name="nom_rue_adresse_u" placeholder="Nom de la rue" value="<?= $array[1] ?>">
                        <label for="floatingNomrue">Nom de la rue</label>
                    </div>
                </div>
                <div class="ligne">
                    <div class="form-floating col-5 ms-5">
                        <input type="text" class="form-control" id="floatingVille" name="ville_adresse_u" placeholder="Ville" value="<?= $array[2] ?>">
                        <label for=" floatingVille">Ville</label>
                    </div>
                    <div class="form-floating col-5 ms-5">
                        <input type="text" class="form-control" id="floatingCodepostal" name="postal_adresse_u" placeholder="Code postal" value="<?= $array[3] ?>">
                        <label for="floatingCodepostal">Code postal</label>
                    </div>
                </div>
                <div class="ligne">
                    <div class="form-floating col-5 ms-5">
                        <input type="email" class="form-control" id="floatingMail" name="mail_u" placeholder="Email" value="<?= $_SESSION['user']['mail_u'] ?>">
                        <label for="floatingMail">Adresse mail</label>
                    </div>
                    <div class="form-floating col-5 ms-5">
                        <input type="tel" class="form-control" id="floatingTel" name="telephone_u" placeholder="Téléphone" value="<?= $_SESSION['user']['telephone_u'] ?>">
                        <label for=" floatingTel">Numéro de téléphone</label>
                    </div>
                </div>

                <div class="ligne">
                    <div class="form-floating col-5 ms-5">
                        <input type="date" class="form-control" id="floatingNaissance" name="datedenaissance_u" placeholder="Date de naissance" value="<?= $_SESSION['user']['datedenaissance_u'] ?>">
                        <label for="floatingNaissance">Date de naissance</label>
                    </div>
                </div>
                <div class="ligne">
                    <div class="form-floating col-5 ms-5">
                        <input type="password" class="form-control" id="floatingPassword" name="motdepass_u" placeholder="Password" value="">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <div class="form-floating col-5 ms-5">
                        <input type="password" class="form-control" id="floatingCpassword" name="motdepass_u_conf" placeholder="Confirmation du password" value="">
                        <label for="floatingCpassword">Confirmation du mot de passe</label>
                    </div>
                </div>
                <div class="ligneb">
                    <input class="boutoninscription" type="submit" value="Modifier" name="modification">
                </div>
            </form>
        </div>
        <div class="col-4">
            <p class="textprofil">
                Prenez bien le temps de compléter au mieux les informations relatives à votre personne, relisez, corrigez avant votre envoi.</br>
                Si, après envoi, vous souhaitez apporter une correction, contacter le Webmaster.</br>
                Le comité de lecture ainsi que les administrateurs du site, se réservent le droit de corriger, d'alléger ou de détailler les documents lors de leur publication, sans obligation d'en faire part au contributeur.
                Protection des données personnelles</br></br>

                Les informations vous concernant nous sont réservées et nous nous engageons à ne pas céder ces données à des tiers.</br>

                Vous disposez d’un droit d’accès, de rectification et de suppression des données vous concernant (articles 27 et 34 de la loi du 6 janvier 1978 Informatique et Libertés). Pour l’exercer, veuillez envoyer un e-mail avec le lien de contact situé en bas de chaque page
            </p>
        </div>
    <?php endif; ?>
</div>