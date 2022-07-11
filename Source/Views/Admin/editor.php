<?php $this->layout("admin/base", ["posts" => $posts]) ?>

<div id="cropper-page">
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

<div class="admin-paper">
    <form action="<?= $posts ? url("api/posts/atualizar/{$posts->id}") : url("api/posts/criar"); ?>"
          method="post"
          onsubmit="<?php if ($posts): ?> updatePost(event);
          <?php else: ?>createPost(event);
          <?php endif; ?>" autocomplete="off">

        <div class="input-data">
            <div class="wrapper">
                <input name="title" type="text" maxlength="100" required
                       value="<?= $posts ? htmlspecialchars($posts->title) : "" ?>">
                <div class="underline"></div>
                <label>Título</label>
            </div>
        </div>

        <input type="file" accept="image/*" id="cape-input">

        <div class="btn-options">
            <label for="cape-input" class="btn-ckeditor">
                <i class="las la-image"></i> &nbsp;
                Escolher Capa
            </label>

            <button type="submit" class="btn-ckeditor">
                <i class="las la-save"></i> &nbsp;
                <?= $posts ? "Atualizar" : "Criar"; ?> Post
            </button>

            <?php if ($posts): ?>
                <button type="button" class="btn-ckeditor" onclick="deleteNotice(<?= $posts->id ?>)">
                    <i class="las la-trash"></i> &nbsp;
                    Apagar Post
                </button>
            <?php endif; ?>
        </div>

        <textarea style="display: none" id="ckeditor"></textarea>
    </form>

    <div id="preview-container" class="img-preview-container">
        <h4>Prévia da Capa</h4>

        <div class="img-preview">
            <div class="img-container">
                <div id="preview-img">
                    <img alt="Prévia da imagem">
                </div>
            </div>

            <div class="text-example">
                <div class="text text-1"></div>
                <div class="text text-2"></div>
                <div class="text text-3"></div>
            </div>
        </div>
    </div>
</div>

<?php if ($posts): ?>
    <?php $this->start("js") ?>
    <script src="<?= url("assets/js/ckeditor.js") ?>"></script>
    <script type="text/javascript">
        const id = "<?= $posts->id; ?>";
        const ckeditorContent = "<?= addslashes($posts->posts); ?>";
    </script>
    <?php $this->stop() ?>
<?php endif; ?>
