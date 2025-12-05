<?php
/** @var array<int, \mini_mvc\app\Models\Admin> $admins */
?>
<h1>Administrateurs</h1>
<table border="1" cellpadding="4" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Créé le</th>
        <th>Mis à jour le</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($admins)): foreach ($admins as $a): ?>
        <tr>
            <td><?php echo htmlspecialchars((string)($a->id_admin ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($a->username ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($a->email ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($a->created_at ?? '')); ?></td>
            <td><?php echo htmlspecialchars((string)($a->updated_at ?? '')); ?></td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="5">Aucun administrateur.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
