<?php $this->layout("Client/base") ?>

<div class="equipe-wrapper">
    <div class="container">
        <ul class="equipe">
            <?php foreach($equipe as $equipeItem): ?>
            <li class="equipe-item">
                <header class="avatar-wrapper">
                    <div class="avatar">
                        <img src="<?= url("assets/img/equipe/$equipeItem->id/cape.png") ?>" alt="<?= $equipeItem->name?>" />
                    </div>
                </header>

                <h3><?= $equipeItem->name?></h3>
                <div class="desc">
                    <?= $equipeItem->job?>
                </div>

                <div class="contacts">
                    <?php if(!empty($equipeItem->youtube)): ?>
                        <a href="<?= $equipeItem->youtube ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
</div>