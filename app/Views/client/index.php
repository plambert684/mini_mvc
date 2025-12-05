<?php
/** @var array<int, \mini_mvc\app\Models\Client> $clients */
?>
<h1>Clients</h1>
<table border="1" cellpadding="4" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Code postal</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($clients)): foreach ($clients as $client): ?>
        <tr>
            <td><?php echo htmlspecialchars((string)($client->id_client ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->nom ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->prenom ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->email ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->adresse ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->ville ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->code_postal ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->created_at ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($client->updated_at ?? '')); ?></td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="9">Aucun client.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
