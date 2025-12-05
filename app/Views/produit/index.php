<?php
/** @var array<int, \mini_mvc\app\Models\Produit> $produits */
?>
<h1>Produits</h1>
<table border="1" cellpadding="4" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Actif</th>
        <th>ID Catégorie</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($produits)): foreach ($produits as $p): ?>
        <tr>
            <td><?php echo htmlspecialchars((string)($p->id_produit ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->nom ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->description ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->prix ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->stock ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->image ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->actif ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->id_categorie ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->created_at ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($p->updated_at ?? '')); ?></td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="10">Aucun produit.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
