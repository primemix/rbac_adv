<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
<?php foreach ($category as $item) : ?>
    <?= $item->name ?>
    <?php endforeach; ?>
</div>
