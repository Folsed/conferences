<?php
require_once 'db.php';

$sql = 'SELECT * FROM conferences';

$result = $pdo->query($sql);
?>

<div class="features">
    <h1>Our conferences</h1>
    <?php
    while ($conf = $result->fetch(PDO::FETCH_OBJ)) :
    ?>
        <div class="alert alert-secondary">
            <h3><?= $conf->title ?></h3>
            <p><?= $conf->date ?></p>
            <a href='conf_details.php?id=<?= $conf->id ?>' class="button2 button-new">More...</a>
        </div>
    <?php endwhile; ?>
</div>