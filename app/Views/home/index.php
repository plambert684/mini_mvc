<?php
// vue minimale : utilise $title et $message fournis par le controller
?>
<h1><?php echo htmlspecialchars($title ?? ''); ?></h1>
<p><?php echo htmlspecialchars($prenom ?? ''); ?></p>
<p><?php echo htmlspecialchars($prenom2 ?? ''); ?></p>

