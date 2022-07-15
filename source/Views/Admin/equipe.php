<?php $this->layout("Admin/base") ?>


<div id="update-member-page" class="popup-page">
    <button class="close-update-member-page" onclick="claseUpdatePage()">
        <i class="fa fa-solid fa-xmark"></i>
    </button>

    <div class="admin-paper admin-equipe">
        <form action="<?= url("api/equipe/atualizar") ?>" method="post" onsubmit="updateMember()" autocomplete="off">
            <input type="text" style="display: none" name="id" value="">
            <div class="input-wrapper">
                <div class="input-data">
                    <div class="wrapper">
                        <input name="name" type="text" maxlength="100" placeholder=" " value="" required>
                        <div class="underline"></div>
                        <label>Nome</label>
                    </div>
                </div>

                <div class="input-data">
                    <div class="wrapper">
                        <input name="job" type="text" maxlength="100" placeholder=" " value="" required>
                        <div class="underline"></div>
                        <label>Função</label>
                    </div>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="input-data">
                    <div class="wrapper">
                        <input name="youtube" type="text" maxlength="80" placeholder=" " value="">
                        <div class="underline"></div>
                        <label>Youtube (opcional)</label>
                    </div>
                </div>

                <input id="custom-select-result-update" type="text" style="display: none" name="job-category" value="">
                <div id="custom-select-update" class="custom-select">
                    <button type="button" class="btn-custom-select" name="select"></button>
                    <div class="options-custom-select">
                        <?php foreach($jobsCategory as $jobCategory):?>
                            <p data-value="<?= $jobCategory->job_category_id ?>" class="item"><?= $jobCategory->name ?></p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>


            <div class="btn-options">
                <label for="cape-input" class="btn-ckeditor">
                    <i class="las la-image"></i> &nbsp;
                    Mudar Foto
                </label>

                <button type="submit" class="btn-ckeditor">
                    <i class="las la-user"></i> &nbsp;
                    Atualizar Membro
                </button>
            </div>
        </form>
    </div>
</div>

<div id="cropper-page" class="popup-page">
    <div class="cropper-image">
        <img alt="Editor de Imagem" id="cropper-editor">
    </div>

    <div class="btn-options">
        <div class="btn-group">
            <button onclick="rotateUndo()">
                <span class="tooltip">Girar -45deg</span>
                <i class="fa fa-undo-alt"></i>
            </button>
            <button onclick="rotateRedo()">
                <span class="tooltip">Girar +45deg</span>
                <i class="fa fa-redo-alt"></i>
            </button>
        </div>

        <div class="btn-group">
            <button onclick="invertX()">
                <span class="tooltip">Inverter horizontalmente</span>
                <i class="fa fa-arrows-alt-h"></i>
            </button>
            <button onclick="invertY()">
                <span class="tooltip">Inverter verticalmente</span>
                <i class="fa fa-arrows-alt-v"></i>
            </button>
        </div>

        <div class="btn-group">
            <button onclick="finish()">
                <span class="tooltip">Finalizar</span>
                <i class="fa fa-check"></i>
            </button>
            <button onclick="cancel()">
                <span class="tooltip">Cancelar</span>
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
</div>

<div class="admin-paper admin-equipe">
    <form action="<?= url("api/equipe/adicionar") ?>" method="post" onsubmit="addMember()" autocomplete="off">
        <div class="input-wrapper">
            <div class="input-data">
                <div class="wrapper">
                    <input name="name" type="text" maxlength="100" placeholder=" " value="" required>
                    <div class="underline"></div>
                    <label>Nome</label>
                </div>
            </div>

            <div class="input-data">
                <div class="wrapper">
                    <input name="job" type="text" maxlength="100" placeholder=" " value="" required>
                    <div class="underline"></div>
                    <label>Função</label>
                </div>
            </div>
        </div>
        <div class="input-wrapper">
            <div class="input-data">
                <div class="wrapper">
                    <input name="youtube" type="text" maxlength="80" placeholder=" " value="">
                    <div class="underline"></div>
                    <label>Youtube (opcional)</label>
                </div>
            </div>

            <input id="custom-select-result" type="text" style="display: none" name="job-category" value="">
            <div id="custom-select" class="custom-select">
                <button type="button" class="btn-custom-select" name="select"></button>
                <div class="options-custom-select">
                    <?php foreach($jobsCategory as $jobCategory):?>
                        <p data-value="<?= $jobCategory->job_category_id ?>" class="item"><?= $jobCategory->name ?></p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>


        <div class="btn-options">
            <input type="file" accept="image/*" id="cape-input">
            <label for="cape-input" class="btn-ckeditor">
                <i class="las la-image"></i> &nbsp;
                Escolher Foto
            </label>

            <button type="submit" class="btn-ckeditor">
                <i class="las la-user"></i> &nbsp;
                Adicionar Membro
            </button>
        </div>
    </form>
</div>

<div class="admin-equipe-wrapper">
<?php if(isset($equipe)): ?>
<?php foreach($jobsCategory as $jobCategory):
        $jobCategoryId = $jobCategory->job_category_id;

        $equipeFinalArray = array_filter($equipe, function($equipeItem) use ($jobCategoryId) {
            return ($equipeItem->job_category_id == $jobCategoryId);
        });
        $arrayFinalCount = count($equipeFinalArray);

        if($arrayFinalCount === 0) continue;
        ?>

        <h2><?= $jobCategory->name ?></h2>
        <ul class="equipe <?= ($arrayFinalCount < 3) ? "justify-start" : ""?>">

            <?php foreach($equipeFinalArray as $equipeItem):?>
                <li id="<?= "equipe-item-$equipeItem->id" ?>" class="equipe-item">
                    <div  class="avatar-wrapper">
                        <div class="avatar">
                            <img src="<?= url("assets/img/equipe/$equipeItem->id/cape.png") ?>" alt="<?= $equipeItem->name ?>" />
                        </div>
                    </div>

                    <h3><?= $equipeItem->name ?></h3>
                    <div class="desc">
                        <?= $equipeItem->job ?>
                    </div>

                    <div class="contacts">
                        <button class="btn-icon" onclick="openUpdatePage(<?= "'$equipeItem->id', '$equipeItem->name', '$equipeItem->job', '$equipeItem->job_category_id'" . ((!empty($equipeItem->youtube)) ? ",'$equipeItem->youtube'" : "") ?>)">
                            <i class="fa fa-solid fa-pen"></i>
                        </button>
                        <button class="btn-icon remove" onclick="deleteMember('<?= $equipeItem->id ?>')"><i class="fa fa-solid fa-xmark"></i></button>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
<?php endforeach; ?>
<?php endif; ?>

</div>