<h1>Lignes de commande</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>ID Commande</th>
        <th>ID Produit</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Sous-total</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($lignes)): foreach ($lignes as $lc): ?>
        <tr>
            <td><?php echo htmlspecialchars((string)($lc->id_ligne ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->id_commande ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->id_produit ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->quantite ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->prix_unitaire ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->sous_total ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->created_at ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($lc->updated_at ?? '')); ?></td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="8">Aucune ligne.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
