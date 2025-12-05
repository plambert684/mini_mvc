<?php
// layout minimal : affiche $title et le contenu ($content)
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($title ?? ''); ?></title>
</head>
<body>
<?php echo $content ?? ''; ?>
</body>
</html>
