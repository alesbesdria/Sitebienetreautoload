<h1>Modifier l'utilisateur</h1>
<?php if ($user): ?>
    <form action="admin/user/update/<?= $user->id_user ?>" method="POST">
        <div>
            <label for="user_firstname">Prénom :</label>
            <input type="text" id="user_firstname" name="user_firstname" value="<?= $user->user_firstname ?>" required>
        </div>
        <div>
            <label for="user_lastname">Nom :</label>
            <input type="text" id="user_lastname" name="user_lastname" value="<?= $user->user_lastname ?>" required>
        </div>
        <div>
            <label for="user_mail">Email :</label>
            <input type="email" id="user_mail" name="user_mail" value="<?= $user->user_mail ?>" required>
        </div>
        <div>
            <label for="id_role">Rôle :</label>
            <select name="id_role" id="id_role" required>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role->id_role ?>" <?= $role->id_role == $user->id_role ? 'selected' : '' ?>>        
                        <?= $role->role_name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="user_mdp">Nouveau mot de passe (laisser vide si inchangé) :</label>
            <input type="password" id="user_mdp" name="user_mdp">
        </div>
        <div>
            <label for="confMdp">Confirmation du mot de passe :</label>
            <input type="password" id="confMdp" name="confMdp">
        </div>
        <div>
            <button type="submit">Modifier l'utilisateur</button>
        </div>
    </form>
<?php else: ?>
    <p>L'utilisateur n'a pas été trouvé.</p>
<?php endif; ?>