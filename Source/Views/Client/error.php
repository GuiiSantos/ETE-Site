<?php $this->layout("Client/base"); ?>

<div class="error">
    <h2><?= $errCode ?></h2>
    <p>Página não encontrada</p>

    <a class="btn" href="<?= url_back()?>">Continuar Navegando</a>
</div>
