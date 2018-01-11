<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?= $menu->name ?><br>
<?php foreach ($category as $item) : ?>
    - <?= $item->name ?><br>
    <?php endforeach; ?>
</div>
