<!DOCTYPE html>
<html lang="pt-br" class="client-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $seo ?>

    <link href="<?= url("assets/scss/style.css") ?>" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= url("assets/img/favicon.ico") ?>" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css">
    <script src="https://kit.fontawesome.com/5fb103eefc.js" defer crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="container">
            <a class="title" href="/">
                <h1>Escola Técnica Estadual</h1>
                <p>Edson Mororó Moura</p>
            </a>
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
        <div class="container">
            <ul class="links">
                <li>
                    <h2>Redes Sociais</h2>
<!--                    <i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-instagram"></i><i class="fa-brands fa-youtube"></i>-->
                    <ul>
                        <li>
                            <a href="https://www.instagram.com/ete_edson_mororo_moura/" target="_blank">Instagram</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/EscolaTecnica.EMM" target="_blank"> Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UC3vq4moLhseuegyZQx1zB9Q" target="_blank">Youtube</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h2>Projetos</h2>

                    <ul>
                        <li>
                            <a href="https://www.instagram.com/protagonistas_eteemm/" target="_blank">Protagonistas ETEEM</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/protagonmidiatico_/" target="_blank">Protagon Midíátivco</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/ete_edson_mororo_moura/" target="_blank">Grémio da ETE</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h2>Acesso Rápido</h2>

                    <ul>
                        <li>
                            <a href="/#home">Home</a>
                        </li>
                        <li>
                            <a href="/#sobre">Sobre</a>
                        </li>
                        <li>
                            <a href="/#portifolio">Portifólio</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h2>Contato</h2>

                    <ul>
                        <li>
                            Telefone: (81) 3726-8901
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
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