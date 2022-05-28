<!DOCTYPE html>
<html lang="pt-br" class="admin-html">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
  <?= $seo ?>

  <link href="<?= url("assets/scss/style.css") ?>" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
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
          <a href="<?= url("admin/painel") ?>" class="active">
            <span class="las la-igloo"></span>
            <span>Dashboard</span>
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
            Dashboard
          </span>
        </h2>
      </div>
      <?php if (isset($user)) :
        $accesName = ($user->access_level === "2") ? "Admin" : "Super Admin";
      ?>
        <div class="user-wrapper">
          <img src="<?= $user->profile_src ?>" alt="Icone de usúario" width="40px" height="40px">
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
</body>

</html>