<?php
/** @var array<int, \mini_mvc\app\Models\Category> $categories */
?>
<h1>Catégories</h1>
<table border="1" cellpadding="4" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($categories)): foreach ($categories as $categorie): ?>
        <tr>
            <td><?php echo htmlspecialchars((string)($categorie->id_categorie ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($categorie->nom ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($categorie->description ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($categorie->created_at ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($categorie->updated_at ?? '')); ?></td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="5">Aucune catégorie.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
