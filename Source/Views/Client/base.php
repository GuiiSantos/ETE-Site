<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETE Edson Mororó Moura</title>
    <link rel="icon" type="image/png" href="<?= CONF_URL_PATH ?>/img/etelogo.png">

    <link href="<?= CONF_URL_PATH ?>/scss/style.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5fb103eefc.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="container">
            <img class="etelogo" src="<?= CONF_URL_PATH ?>/img/etelogo.png" alt="logo">

            <p class="title">Edson Mororó Moura</p>

            <input type="checkbox" id="chk">

            <label for="chk" class="btn-menu">
                <i class="fas fa-bars"></i>
            </label>

            <nav aria-label="Principal">
                <ul class="menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/#sobre">Sobre</a></li>
                    <li><a href="/#portifolio">Portifólio</a></li>

                    <label for="chk" class="btn-menu hide">
                        <i class="fas fa-times"></i>
                    </label>
                </ul>
            </nav>
        </div>
    </header> <!-- HEADER -->

    <main class="main">
        <?= $this->section("content") ?>
    </main>

    <footer class="footer">
        <p>ETE. Todos os Direitos Reservados.</p>
    </footer>

    <?= $this->section("js") ?>
</body>

</html>