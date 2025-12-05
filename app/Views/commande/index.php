<?php
/** @var array<int, \mini_mvc\app\Models\Commande> $commandes */
?>
<h1>Commandes</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>N° commande</th>
        <th>Statut</th>
        <th>Montant total</th>
        <th>Adresse livraison</th>
        <th>Ville livraison</th>
        <th>Code postal livraison</th>
        <th>Date commande</th>
        <th>ID Client</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($commandes)): foreach ($commandes as $o): ?>
        <tr>
            <td><?php echo htmlspecialchars((string)($o->id_commande ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->numero_commande ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->statut ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->montant_total ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->adresse_livraison ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->ville_livraison ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->code_postal_livraison ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->date_commande ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->id_client ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->created_at ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($o->updated_at ?? '')); ?></td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="11">Aucune commande.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
