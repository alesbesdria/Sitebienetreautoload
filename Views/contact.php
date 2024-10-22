<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Stéphanie Chantôme-Formation Bien Être</title>
</head>

<body>


    <header>

        <div class="etp">
            <div class="etpcontent">
                <img class="imgetp" src="assets/icone/ornement.png" alt="contour du titre">
                <div class="etpname">
                    <center>La Diction</center>
                </div>
                <div class="clientname">
                    <center>Stéphanie Chantôme</center>
                </div>
            </div>
        </div>
        <nav>
            <menu class="mininav">
                <a href="valeurs.html">
                    <center>Mes valeurs</center>
                </a>
                <a class="text1" href="formasens.html">
                    <center>Formations</center>
                </a>

                <a href="ressources.html">
                    <center>Ressources</center>
                </a>
            </menu>
            <div class="navcolor">
                <div class="navcontent">
                    <a class="entretientitre" href="index.html">Entretien motivationnel</a>
                    <a class="grayscale" href="formasens.html">Formation de base</a>
                    <a class="grayscale" href="formaappro.html">Formation approfondissement</a>
                    <a class="grayscale" href="formapc.html">Parcours complet</a>
                    <a class="grayscale" href="formasuper.html">Supervision</a>
                </div>
                <div class="navcontent">
                    <a class="entretientitre" href="seancindiv.html">Séances individuelles</a>
                    <a class="grayscale" href="decision.html">Prise de décision</a>
                    <a class="grayscale" href="changement.html">Changement de comportement</a>
                </div>
                <div class="navcontent">
                    <a class="entretientitre" href="atelierspe.html">Ateliers spécifiques</a>

                </div>
            </div>
        </nav>
        <div class="logoaccueil">
            <a class="logo" href="./index.html"><img src="assets/icone/feuilleoiseauorange.png" id="logoaccueuil"
                    alt="logo accueil"></a>
            <div class="logotext">
                <a href="./index.html">
                    Accueil
                </a>
            </div>
        </div>

    </header>


    <main>

        <div class="maincontent">

            <div class="menubulles">
                <div class="bubulle">
                    <div class="bulle">
                        <img class="bubu1" src="assets/icone/bulle1.png" alt="bulle">
                        <img class="bubu2" src="assets/icone/bulle3.png" alt="bulle">
                        <div class="text">
                            <a href="valeurs.html">
                                <center>Mes valeurs</center>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bubulle">
                    <div class="bulle">
                        <img class="bubu1" src="assets/icone/bulle1.png" alt="bulle">
                        <img class="bubu2" src="assets/icone/bulle3.png" alt="bulle">
                        <div class="text">
                            <a class="text1" href="formasens.html">
                                <center>Formations</center>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bubulle">

                    <div class="bulle">
                        <img class="bubu1" src="assets/icone/bulle1.png" alt="bulle">
                        <img class="bubu2" src="assets/icone/bulle3.png" alt="bulle">
                        <div class="text">
                            <a href="ressources.html">
                                <center>Ressources</center>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form" action="contact" method="POST">
                <section class="formulaire">
                    <h2 class="nouscontacter">Nous contacter : <br> <br></h2>

                    <div>
                        <div>
                            <label for="nom">Nom</label>
                            <input placeholder="Votre nom" type="text" id="nom" name="nom" required>
                        </div>
                        <div>
                            <label for="prenom">Prénom</label>
                            <input placeholder="Votre prénom" type="text" id="prenom" name="prenom" required>
                        </div>
                    </div>
                    <div class="telephone">
                        <div>
                            <label for="telephone">Téléphone</label>
                            <input placeholder="0238000102" type="tel" id="telephone" name="telephone"
                                pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
                            <div>
                                <label for="email">Email</label>
                                <input placeholder="zzz@zzz.com" type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="sujet">
                            <div class="sujetmess">
                                <div>
                                    <label for="sujet">Sujet</label>
                                    <input placeholder="Sujet du message" type="text" id="sujet"
                                        name="--Objet de votre demande--" required>
                                </div>
                                <div class="message">
                                    <label for="message"></label>
                                    <textarea name="message" id="message" cols="30" rows="10"
                                        placeholder="Ecrivez votre message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="envoyer">
                            <label for="rgpd"></label>
                            <fieldset>
                                <label for="submit"></label>
                                <div class="button">
                                    <button type="submit" id="submit">Envoyer le message</button>
                                </div>
                                <label for="reset"></label>
                                <div class="button">
                                    <button type="reset" id="reset">Réinitialiser le formulaire</button>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        </div>
        <div class="contentcontact">

            <div class="bird">

                <div class="contact">
                    <img class="birdfeuille" src="assets/icone/feuille_automne.png" alt="oiseau">
                    <div class="ecrire">
                        <a class="textcontact" href="contact.php">Contactez-moi !</a>
                        <a class="logocontact" href="contact.php"><img src="assets/icone/plume.png" alt="contact"
                                id="contact"></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="mentions">
            <a href="mentions.html">Mentions légales</a>
            <a href="cgv.html">Conditions générales de vente</a>
            <a href="politique.html">Politique de confidentialité</a>
        </div>
        <div class="icones">
            <a class="soc" href="https://www.facebook.com/"><img src="assets/icone/Facebook.png" alt="bouton facebook"
                    id="facebook"></a>
            <a class="soc" href="https://twitter.com/?lang=fr"><img src="assets/icone/twitter.png" alt="bouton twitter"
                    id="twitter"></a>
            <a class="soc" href="https://www.instagram.com/"><img src="assets/icone/instagram.png"
                    alt="bouton instagram" id="instagram"></a>
        </div>
    </footer>
    <script src="/public/js/main.js"></script>
</body>

</html>