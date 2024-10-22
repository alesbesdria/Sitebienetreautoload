<h1>Supprimer l'utilisateur</h1>
    <p>Êtes-vous sûr de vouloir supprimer l'utilisateur <?= $user->user_firstname ?> <?= $user->user_lastname ?> ?</p>
    <form action="/user/delete/<?= $user->id_user ?>" method="POST">
        <button type="submit">Confirmer la suppression</button>
        <a href="/user">Annuler</a>
    </form>