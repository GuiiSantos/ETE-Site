<!DOCTYPE html>
<html lang="pt-br" class="admin-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <?= $seo ?>
    <link rel="shortcut icon" href="<?= url("assets/img/favicon.ico") ?>" type="image/x-icon">
    <link href="<?= url("assets/scss/style.css") ?>" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body data-page-id="<?= $pageId ?>">
<div id="custom-alert"></div>
<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2>
            <img src="<?= url("assets/img/logo-e.png") ?>" alt=""> <span>TE</span>
        </h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="<?= url("admin/painel") ?>" <?= ($pageId === "dashboard") ? "class='active'" : "" ?>>
                    <span class="las la-igloo"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= url("admin/criar") ?>" <?= ($pageId === "editor") ? "class='active'" : "" ?>>
                    <span class="las la-pen"></span>
                    <span>Criar</span>
                </a>
            </li>
            <li>
                <a href="<?= url("admin/sair") ?>">
                    <span class="las la-sign-out-alt"></span>
                    <span>Sair</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-content">
    <header>
        <div class="header-title">
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                <span>
            <?= $pageId ?>
          </span>
            </h2>
        </div>
        <?php if (isset($user)) :
            $accesName = ($user->access_level === "2") ? "Admin" : "Super Admin";
            ?>
            <div class="user-wrapper">
                <img src="<?= $user->img ? url("assets/img/user/perfil.jpg") : url("assets/img/user/".$user->id."/profile.png") ?>" alt="Icone de usúario" width="40px" height="40px">
                <div>
                    <h4><?= $user->username ?></h4>
                    <small><?= $accesName ?></small>
                </div>
            </div>
        <?php endif; ?>
    </header>
    <main class="main-sidebar">
        <?= $this->section("content") ?>
    </main>
</div>
<?= $this->section("js"); ?>
<script src="<?= url("assets/js/main.js") ?>"></script>
</body>
</html>