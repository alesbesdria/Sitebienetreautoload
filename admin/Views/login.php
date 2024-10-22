<h1>Connexion</h1>
    <form action="/admin/user" method="POST">
        <div>
            <label for="user_mail">Email :</label>
            <input type="email" id="user_mail" name="user_mail" required>
        </div>
        <div>
            <label for="user_mdp">Mot de passe :</label>
            <input type="password" id="user_mdp" name="user_mdp" required>
        </div>
        <div>
            <button type="submit">Se connecter</button>
        </div>
        <?php if (isset($error)): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>
    </form>