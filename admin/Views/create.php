<a href="/admin/user">Retour en arrière</a>

<form action="/admin/user/store" method="POST">
        <div>
            <label for="user_firstname">Prénom :</label>
            <input type="text" id="user_firstname" name="user_firstname" required>
        </div>
        <div>
            <label for="user_lastname">Nom :</label>
            <input type="text" id="user_lastname" name="user_lastname" required>
        </div>
        <div>
            <label for="user_mail">Email :</label>
            <input type="email" id="user_mail" name="user_mail" required>
        </div>
        <div>
            <label for="id_role">Rôle :</label>
            <select name="id_role" id="id_role" required>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role->id_role ?>"><?= $role->role_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="user_mdp">Mot de passe :</label>
            <input type="password" id="user_mdp" name="user_mdp" required>
        </div>
        <div>
            <label for="confMdp">Confirmation du mot de passe :</label>
            <input type="password" id="confMdp" name="confMdp" required>
        </div>
        <div>
            <button type="submit">Ajouter l'utilisateur</button>
        </div>
    </form>