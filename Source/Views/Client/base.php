<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETE Edson Mororó Moura</title>
    <link rel="shortcut icon" href="<?= URLBASE ?>/assets/img/favicon.ico" type="image/x-icon">
    <link href="<?= CONF_URL_PATH ?>/scss/style.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5fb103eefc.js" defer crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="container">
            <a class="title" href="/">ETE</a>

            <input type="checkbox" id="checkbox-hidden">
            <label for="checkbox-hidden" class="btn-menu">
                <i class="fas fa-bars"></i>

                <i class="fas fa-times"></i>
            </label>

            <nav aria-label="Principal">
                <ul class="menu" id="menu">
                    <li><a href="/#home">Home</a></li>
                    <li><a href="/#sobre">Sobre</a></li>
                    <li><a href="/#portifolio">Portifólio</a></li>
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

    <script type="text/javascript">
        const checkboxHidden = document.getElementById("checkbox-hidden");
        const links = document.querySelectorAll("#menu a");

        links.forEach(function(link) {
            link.addEventListener("click", function() {
                checkboxHidden.checked = false;
            })
        })
    </script>
    <?= $this->section("js") ?>
</body>

</html>