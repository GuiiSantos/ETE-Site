class UploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    abort() {
        if(this.xhr) {
            this.xhr.abort();
        }
    }


    // Inicia o XMLHttpRequest
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        xhr.open("POST", App.URLROOT + "/api/posts/imagem/" + id, true);
    }

    // Configurações
    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Não foi possivel fazer o upload da imagem: ${file.name}.`;

        console.log(loader);

        xhr.addEventListener("error", () => reject(genericErrorText));
        xhr.addEventListener("abort", () => reject());
        xhr.addEventListener("load",  () => {
            const data = JSON.parse(xhr.responseText);
            console.log(data);

            if(!data.success) {
                customAlert.showAlert(data.message)
                return reject();
            }

            resolve({
                default: data.url
            });
        });
    }

    // Envia as requusições
    _sendRequest(file) {
        const data = new FormData();
        data.append('id', id);
        data.append('upload', file);

        this.xhr.send(data);
    }
}

const ckeditorConfig = {
    extraPlugins: [ UploadAdapterPlugin ],
    fontFamily: {
        options: [
            'default',
            'Impact, sans-serif',
            'Ubuntu Mono, Courier New, Courier, monospace'
        ]
    },
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            'link',
            '|',
            'bulletedList',
            'numberedList',
            'outdent',
            'indent',
            '|',
            'imageUpload',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'undo',
            'redo',
            '|',
            'alignment',
            'fontFamily',
            'fontColor',
            'fontSize',
            '|',
            'findAndReplace',
            'removeFormat',
            'highlight',
            'horizontalLine'
        ]
    },
    language: 'pt-br',
    image: {
        toolbar: [
            'imageTextAlternative',
            'imageStyle:block',
            'imageStyle:alignLeft',
            'imageStyle:full',
            'imageStyle:alignRight',
            'linkImage'
        ]
    },
    table: {
        contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells',
            'tableCellProperties',
            'tableProperties'
        ]
    },
    licenseKey: '',

}

// Criação do plugin do uploadAdapter
function UploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new UploadAdapter(loader);
    };
}