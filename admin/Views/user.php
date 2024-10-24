
    <a href="/user/create">Ajouter un utilisateur</a>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user->user_firstname); ?></td>
                        <td><?php echo htmlspecialchars($user->user_lastname); ?></td>
                        <td><?php echo htmlspecialchars($user->user_mail); ?></td>
                        <td>
                            <?php
                            $role = $this->roleModel->selectOne('role_name', 'id_role = ?', [$user->id_role]);
                            echo htmlspecialchars($role->role_name);
                            ?>
                        </td>
                        <td>
                            <a href="/admin/user/edit/<?php echo $user->id_user; ?>">Modifier</a>
                            <a href="/admin/user/delete/<?php echo $user->id_user; ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Aucun utilisateur trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>