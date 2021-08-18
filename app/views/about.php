<?php $this->layout('layout', ['title' => 'About']) ?>

<?php
echo flash()->display();
?>
<p>О нас <?= $this->e($name)?></p>

