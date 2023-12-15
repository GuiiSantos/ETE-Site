# Site ETE

Esse Projeto foi feito com intuito para postar notícias, boletim e eventos da escola.

## Conteúdos

- [Como iniciar o Composer](#como-iniciar-o-composer)
- [Como compilar o CSS com o SASS](#como-compilar-o-css-com-o-sass)


## Como iniciar o Composer

- Instale o Composer no [SITE OFICIAL](https://getcomposer.org/)
- Utilize o comando `composer update` na raiz do projeto
- E voilà, será criada a pasta vendor com todas as dependências, e seu PHP estará funcionando

## Como compilar o CSS com o SASS

- Instale o SASS no [SITE OFICIAL](https://sass-lang.com/)
- Utilize o comando `sass -w assets/scss/style.scss:assets/scss/style.css --style compressed --no-source-map` na raiz do projeto
- E voilà, você estara compilando o seu pré-processador css (SASS)

#### Explicação do comando

1. `sass` : Nome do comando
2. `-w` : Serve para manter o scss sendo compilado
3. `assets/scss/style.scss:assets/scss/style.css` : Caminho dos arquivos
4. `--style compressed` : Serve para minificar o css
5. `--no-source-map` : Serve para impedir criação do arquivo style.map.css
