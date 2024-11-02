<form class="form" action="/contacts/submit" method="POST">
    <section class="formulaire">
        <h2 class="nouscontacter">Nous contacter : <br> <br></h2>

        <div>

            <div>
                <label for="nom">Nom</label>
                <input placeholder="Votre nom" type="text" id="nom" name="nom" required>
                <div id="nomError" class="error-message"></div>
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <input placeholder="Votre prénom" type="text" id="prenom" name="prenom" required>
                <div id="prenomError" class="error-message"></div>
            </div>
        </div>
        <div class="telephone">
            <div>
                <label for="telephone">Téléphone</label>
                <input placeholder="0238000102" type="tel" id="telephone" name="telephone" required>
                <div id="telephoneError" class="error-message"></div>
                <label for="email">Email</label>
                <input placeholder="zzz@zzz.com" type="email" id="email" name="email" required>
                <div id="emailError" class="error-message"></div>
            </div>
            <div class="sujet">
                <div class="sujetmess">
                    <div>
                        <label for="sujet">Sujet</label>
                        <input placeholder="Sujet du message" type="text" id="sujet" name="sujet" required>
                        <div id="sujetError" class="error-message"></div>
                    </div>
                    <div class="message">
                        <label for="message"></label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Ecrivez votre message"></textarea>
                        <div id="messageError" class="error-message"></div>
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



<!-- 

<form class="form" action="/contacts/submit" method="POST">
    <section class="formulaire">
        <h2 class="nouscontacter">Nous contacter :</h2>
        <div>
            <label for="nom">Nom</label>
            <input placeholder="Votre nom" type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input placeholder="Votre prénom" type="text" id="prenom" name="prenom" required>
        </div>
        <div>
            <label for="telephone">Téléphone</label>
            <input placeholder="0238000102" type="tel" id="telephone" name="telephone" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input placeholder="zzz@zzz.com" type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="sujet">Sujet</label>
            <input placeholder="Sujet du message" type="text" id="sujet" name="sujet" required>
        </div>
        <div>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Ecrivez votre message" required></textarea>
        </div>
        <button type="submit" id="submit">Envoyer le message</button>
        <button type="reset" id="reset">Réinitialiser le formulaire</button>
    </section>
</form> -->