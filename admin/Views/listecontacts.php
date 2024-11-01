<?php if (!empty($contacts)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date de contact</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td class="marge"><?= htmlspecialchars($contact->id); ?></td>
                    <td class="marge"><?= htmlspecialchars($contact->visitcontact_lastname); ?></td>
                    <td class="marge"><?= htmlspecialchars($contact->visitcontact_firstname); ?></td>
                    <td class="marge"><?= htmlspecialchars($contact->visitcontact_mail); ?></td>
                    <td class="marge"><?= htmlspecialchars($contact->visitcontact_tel); ?></td>
                    <td class="marge"><?= htmlspecialchars($contact->visitcontact_date); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun contact trouvé.</p>
<?php endif; ?>
