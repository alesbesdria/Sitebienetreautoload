<a href="/admin/user">Retour en arrière</a>

<form action="/admin/user/store" method="POST">
        <div>
            <label for="user_firstname">Prénom :</label>
            <input type="text" id="user_firstname" name="user_firstname" >
        </div>
        <div>
            <label for="user_lastname">Nom :</label>
            <input type="text" id="user_lastname" name="user_lastname" >
        </div>
        <div>
            <label for="user_mail">Email :</label>
            <input type="email" id="user_mail" name="user_mail" >
        </div>
        <div>
            <label for="id_role">Rôle :</label>
            <select name="id_role" id="id_role" >
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role->id_role ?>"><?= $role->role_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="user_mdp">Mot de passe :</label>
            <input type="password" id="user_mdp" name="user_mdp" >
        </div>
        <div>
            <label for="confMdp">Confirmation du mot de passe :</label>
            <input type="password" id="confMdp" name="confMdp" >
        </div>
        <div>
            <button type="submit">Ajouter l'utilisateur</button>
        </div>
    </form>