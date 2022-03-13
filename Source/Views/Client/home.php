<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="widht=device=widht, initial-scale=1.0" />

  <title>ETE Edson Mororó Moura</title>
  <link rel="icon" type="image/png" href="<?=CONF_URL_PATH ?>/img/etelogo.png">

  <link href="<?=CONF_URL_PATH ?>/scss/style.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <img class="etelogo" src="<?=CONF_URL_PATH ?>/img/etelogo.png" alt="logo">

      <p class="title">Edson Mororó Moura</p>

      <input type="checkbox" id="chk">

      <label for="chk" class="btn-menu">
        <i class="fas fa-bars"></i>
      </label>

      <nav aria-label="Principal">
        <ul class="menu">
          <li><a href="#sitedaete">Home</a></li>
          <li><a href="#sobre">Sobre</a></li>
          <li><a href="#contatooo">Contato</a></li>

          <label for="chk" class="btn-menu hide">
            <i class="fas fa-times"></i>
          </label>
        </ul>
      </nav>
    </div>
  </header> <!-- HEADER -->

  <main class="main">
    <section class="introduction">
      <div class="container">
        <img id="sitedaete" class="call-to-action" width="" src="<?=CONF_URL_PATH ?>/img/colocaessadaqui.png">

        <ul class="differentials">
            <li class="differentials-item">
                <div><i class="fas fa-mouse-pointer"></i></div>
                <h2>Processo Seletivo</h2>
                <p>Ingresso no Médio Integrado, Subsequente e EAD.</p>
                <a href="https://sisacad.educacao.pe.gov.br/sissel/" target="_blank"><button class="btn-click-here">Clique aqui</button></a>
            </li>

            <li class="differentials-item">
                <div><i class="fas fa-mouse-pointer"></i></div>
                <h2>Siepe</h2>
                <p>Sistema de Informações da Educação de Pernambuco.</p>
                <a href="https://www.siepe.educacao.pe.gov.br/" target="_blank"><button class="btn-click-here">Clique aqui</button></a>
            </li>

            <li class="differentials-item">
                <div><i class="fas fa-mouse-pointer"></i></div>
                <h2>Secretaria de Educação - PE</h2>
                <p>Acesso ao site com informações atualizadas.</p>
                <a href="http://www.educacao.pe.gov.br/" target="_blank"><button class="btn-click-here">Clique aqui</button></a>
            </li>

            <li class="differentials-item">
                <div><i class="fas fa-mouse-pointer"></i></div>
                <h2>Estrutura Física</h2>
                <p>Imagens do espaço da ETEEMM que contribuem com conhecimento.</p>
                <a href="/estrutura"><button class="btn-click-here">Clique aqui</button></a>
            </li>
        </ul>
      </div>
    </section>

    <section id="sobre" class="about">
      <div class="container">
        <div class="about-title">
          <h2>Sobre a ETEEMM</h2>

          <p>Venha fazer parte desta história de sucesso!</p>
        </div>
        <div class="about-content">
          <div class="about-content-item creation">
            <p>A Escola Técnica Estadual Edson Mororó Moura - ETEEMM foi criada através do Decreto de Criação: Nº 42.612 de 28/01/2016 e inaugurada em 01 de abril de 2016. O nome da escola foi dado em homenagem ao empreendedor Edson Mororó Moura que fundou a empresa Baterias Moura, a qual tem grande relevância econômica e social no Município, além de destaque Nacional e Internacional.</p>

            <span><i class="fas fa-check-double"></i> Médio Integrado: Administração e Desenvolvimento de Sistemas</span>
            <span><i class="fas fa-check-double"></i> Subsequente: Administração, Química e Redes de Computadores</span>
            <span><i class="fas fa-check-double"></i> EAD: Cursos Técnicos em Administração, Biblioteconomia, Design de Interiores, Design Gráfico, Informática, Logística, Multimídia, Recursos Humanos, Secretaria Escolar, Segurança do Trabalho, Tradução e Interpretação em Libras</span>
          </div>

          <div class="about-content-item target">
            <p>A ETEEMM tem como Visão ser referência em Educação Profissional e Integral, em Belo Jardim e região, ressaltando os princípios éticos e o pleno exercício da cidadania, assim como a Missão de desenvolver competências, habilidades, atitudes e valores dos nossos estudantes para que tenham um futuro profissional e acadêmico promissor enaltecendo os seguintes valores: ética, disciplina, inovação, integração, justiça, respeito e empatia. Os cursos ofertados pela ETEEMM são na modalidade Médio Integrado, Subsequente e EAD.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="conquistas">
      <!--Área das conquistas parte 1-->
      <div class="center">
        <div class="conquista-single">
          <h2>+200</h2>
          <p>Estudantes aprovados em Universidades Públicas</p>
        </div>
        <!--conquista-single-->
        <div class="conquista-single">
          <h2>980</h2>
          <p>Redação ENEM 2020</p>
        </div>
        <div class="conquista-single">
          <h2>IDEB 5,90</h2>
          <p>IDEPE 6,08</p>
        </div>
        <div class="conquista-single">
          <h2>Esporte</h2>
          <p>Campeão Municipal, Regional e Pernambucano</p>
        </div>
      </div>
      <!--center-->
    </section>
    <!--conquistas--> <br><br>

    <section class="professores">
      <div class="center">
        <img class="professores-img" src="<?=CONF_URL_PATH ?>/img/canalprof.jpg">
        <div class="professores-content">
          <h2>Canal no YouTube de Educadores ETEEMM</h2>
          <p>Diante do contexto pandemia Covid-19, os Educadores ETEEMM buscaram inovar cada vez mais com o intuito de oportunizar aos estudantes mais possibilidades no desenvolvimento de seu conhecimento, criaram, portanto, canais no YouTube. Seguem os links:</p> <br>

          <a class="canalpro" href="https://www.youtube.com/channel/UCOcN4dBVVYjTgSkK_RGrTbg" target="_blank">
            <p>Profª. Ma. Michele Noberta (Matemática)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCj5ezwgCNW9aQhLlfPEyRLQ" target="_blank">
            <p>Profª. Elaisa Souza (Inglês)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCIMUN2nB84lEleQZGz5wtgw" target="_blank">
            <p>Prof. Eduardo Max (Biologia)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCXJPdWOwuXxtHF7rEQe3_pQ" target="_blank">
            <p>Prof. Me. Marcos Vier (Matemática)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCydb2qANhJwMxHzuJHXCG-g" target="_blank">
            <p>Profª. Iaponira Campos (Química)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCkFMdRLNAUDhVFSBxP-UorA" target="_blank">
            <p>Prof. Erandi Oliveira (Matemática)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCCRmPuoD-pc_uFomr6koSSw" target="_blank">
            <p>Prof. Me. Fhelipe (Desenvolvimento de Sistemas)</p>
          </a>
          <a class="canalpro" href="https://www.youtube.com/channel/UCB-eqa9SYduJym3scgCv1Ng" target="_blank">
            <p>Prof. Paulo Jacinto (Administração)</p>
          </a>

        </div>
        <!--sobre-empreendedor-content-->
      </div>
      <!--center-->
    </section>
    <!--sobre-empreendedor-->

    <section class="depoimentos">
      <!--DEPOIMENTOS-->
      <div class="center">
        <div class="depoimentos-chamada">
          <h2>Depoimentos</h2>
          <p>O maior patrimônio da ETEEMM são as pessoas que constroem sua história! Nossos funcionários, educadores, estudantes, estudantes egressos, empresas parceiras são parte de um construto cheio de grandes conquistas.</p>
        </div>
        <!--depoimentos-chamada-->
      </div>
    </section>
    <!--depoimentos-->

    <div class="slideshow-container">

      <div class="mySlides fade">

        <div class="numbertext"></div>
        <img src="<?=CONF_URL_PATH ?>/img/nade.jpg">

        <div class="text"></div>

      </div>
      <!--final do mySlides fade-->

      <div class="mySlides fade">

        <div class="numbertext"></div>
        <img src="<?=CONF_URL_PATH ?>/img/eduarslide.jpg">

        <div class="text"></div>

      </div>
      <!--final do mySlides fade-->

      <div class="mySlides fade">

        <div class="numbertext"></div>
        <img src="<?=CONF_URL_PATH ?>/img/barbasalide.jpg">

        <div class="text"></div>

      </div>
      <!--final do mySlides fade-->

      <div class="mySlides fade">

        <div class="numbertext"></div>
        <img src="<?=CONF_URL_PATH ?>/img/anaslide.jpg">

        <div class="text"></div>

      </div>
      <!--final do mySlides fade-->

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <!--isso "&#10094" é o ícone da seta-->
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      <!--isso "&#10094" é o ícone da seta-->

    </div>
    <!--final do slideshow-container-->
    <br>

    <div style="text-align: center">

      <span class="dot" onclick="currentSlides(1)"></span>
      <span class="dot" onclick="currentSlides(2)"></span>
      <span class="dot" onclick="currentSlides(3)"></span>
      <span class="dot" onclick="currentSlides(4)"></span>

    </div>
    <!--final do text-align: center-->

    <script>

      var slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlides(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }

    </script> <br><br>

    <section class="portfolio">
      <!--PORTIFOLIO-->
      <div class="center">
        <div class="portfolio-aqui">
          <h2>Portfolio</h2>
          <div class="constru">
            <h2>(em construção...)</h2>
          </div>
          <p>A ETEEMM é uma escola que vivencia experiências ricas em conhecimento sociocultural que contribuem para o exercício da cidadania de nossos educandos.</p>
          <div>
          </div>
        </div>
        <!--portfolio-aqui-->
      </div>
      <!--center-->
    </section>
    <!--portfolio-->


    <section class="flex">
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/primeira.jpg">
        </a>
        <p>Semana de Empreendedorismo e Inovação Tecnológica</p>
      </div>
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/projetos.jpg">
        </a>
        <p>Projetos do Médio Integrado e Subsequente</p>
      </div>
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/esporte.jpg">
        </a>
        <p>Competições esportivas ETEEMM</p>
      </div>
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/gremio.jpg">
        </a>
        <p>Protagonismo Juvenil e Grêmio Estudantil</p>
      </div>
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/sarau.jpg">
        </a>
        <p>Sarau Literomusical ETEEMM</p>
      </div>
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/feras.jpg">
        </a>
        <p>Feras ETEEMM</p>
      </div>
      <div class="img">
        <a href="" target="_blank">
          <img src="<?=CONF_URL_PATH ?>/img/conquistas.jpg">
        </a>
        <p>Galeria de conquistas</p>
      </div>
    </section>
  </main>

  <footer class="footer">
    <p>ETE. Todos os Direitos Reservados.</p>
  </footer>
</body>

</html>