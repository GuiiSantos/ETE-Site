<?php $this->layout("Client/base"); ?>
<div class="posts">
    <div class="container container-box">
        <h1 class="title"><?= $post->title; ?></h1>
        <img src="<?= url("/assets/img/post/$post->id")?>/cape.png" alt="<?= $post->title; ?>" class="cape">
        <div class="ck-content">
            <?= $post->posts; ?>
        </div>
    </div>
</div>
