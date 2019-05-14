<?php
use yii\helpers\Html;
?>

<main class="project">
    <div class="container">
        <div class="breadcrumbs">
            <?= Html::a('К фотопроектам', ['/']) ?>
        </div>
        <?php print_r($project['name']) ?>
    </div>
</main>