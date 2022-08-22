<?php $this->layout("Admin/base") ?>
<?php if(isset($posts) && is_array($posts)): ?>
<div class="content">
    <table class="content-table table-sortable">
        <thead>
        <tr>
            <th data-sort="true">Titúlo</th>
            <th>Editar</th>
            <th>Apagar</th>
            <th data-sort="true" data-date="true">Data</th>
            <th>Ativo</th>
            <th>Fixados</th>
        </tr>
        </thead>
        <tbody>

            <?php foreach($posts as $post):
                $title = $post->title;
                $titleUrl = $post->title_url;

                $id = $post->id;
                $view = url("posts/{$titleUrl}");
                $editar = url("admin/editar/{$id}");
                $date = new DateTime($post->created_at);
                $active = ($post->active) ? "checked" : "";
                $pinned = ($post->pinned) ? "checked" : "";

                ?>
                <tr>
                    <td>
                        <a href="<?= $view ?>" target="_blank"><?= $title ?></a>
                    </td>
                    <td class="active"><a href="<?= $editar ?>">Editar</a></td>
                    <td class="active" onclick="deleteNotice(<?= $id ?>)">Apagar</td>
                    <td><?= $date->format("d/m/Y H:i:s") ?></td>
                    <td>
                        <label>
                            <input type='checkbox' autocomplete="off" onclick="toggleActive(<?= $id ?>)" <?= $active ?>>
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type='checkbox' autocomplete="off" onclick="togglePinned(<?= $id ?>)" <?= $pinned ?>>
                        </label>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: echo "<h1>não tem nenhum conteúdo postado!:(</h1>"; endif; ?>
        </tbody>
    </table>
</div>
