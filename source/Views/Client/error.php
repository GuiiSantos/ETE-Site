<?php $this->layout("Client/base"); ?>

<div class="error-page">
    <p class="errcode"><?= $errCode ?></p>
    <h2>Ooops, Conteúdo indisponivel! :/</h2>
    <p class="message">Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/</p>

    <a class="btn" href="<?= url_back()?>">Continuar Navegando</a>
</div>
