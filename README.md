## Come usar o SCSS

### Após ter instalado o sass no [SITE OFICIAL](https://sass-lang.com/), você poderá ultilizar este comando no terminal (na raiz do projeto)

`sass -w scss/style.scss:scss/style.css --style compressed --no-source-map`

### para compilar todo o scss no arquivo scss/style.css

1. `sass` : Nome do comando
2. `-w` : Serve para manter o scss sendo compilado
3. `scss/style.scss:scss/style.css` : Caminho dos arquivos
4. `--style compressed` : Serve para minificar o css
5. `--no-source-map` : Serve para impedir criação do arquivo style.map.css
