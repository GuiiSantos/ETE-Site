if(App.pageId === "editor")
{
    if(typeof id !== "undefined") {
        document.getElementById("preview-container").classList.add("active");
        updatePreviewImg();
    }

    const customAlert = new CustomAlert(document.getElementById("custom-alert"));
    let inProcess = false;


    // ################
    // ### CKEDITOR ###
    // ################
    let ckeditor;
    if(typeof id !== "undefined") {
        const ckeditorElement = document.getElementById("ckeditor");
        ckeditorElement.style.display = "inline-block";

        ClassicEditor.create(ckeditorElement, ckeditorConfig)
            .then(function(newEditor) {
                ckeditor = newEditor;

                if(id) {
                    ckeditor.setData(ckeditorContent);
                }
            });
    }

    // ###############
    // ### CROPPER ###
    // ###############
    const cropperPage = document.getElementById("cropper-page");
    const cropperEditor = document.getElementById("cropper-editor")
    const cropperConfig = {
        viewMode: 1
    }
    let objectURL;
    let cropper;
    let canvas;

    const URL = window.URL || window.webkitURL;
    if(URL) {
        const capeInput = document.getElementById("cape-input");

        capeInput.addEventListener("change", function() {
            const files = this.files;

            if(files && files.length) {
                const file = files[0];

                if(/^image\/\w+/.test(file.type)) {
                    if(objectURL) URL.revokeObjectURL(objectURL);
                    if(cropper) cropper.destroy();

                    cropperEditor.src = objectURL = URL.createObjectURL(file);

                    cropper = new Cropper(cropperEditor, cropperConfig);

                    capeInput.value = null;
                    cropperPage.classList.add("active");

                } else {
                    customAlert.showAlert("Selecione uma imagem (png, jpg, jpeg)", 2);
                }
            }
        });
    }

    function cropperMove() {cropper.setDragMode("move");}
    function cropperCrop() {cropper.setDragMode("crop");}
    function rotateUndo() {cropper.rotate(-45)}
    function rotateRedo() {cropper.rotate(45)}

    let scaleX = -1; let scaleY = -1;
    function invertX() {cropper.scaleX(scaleX); scaleX = scaleX * -1}
    function invertY() {cropper.scaleY(scaleY); scaleY = scaleY * -1}
    function finish() {
        canvas = cropper.getCroppedCanvas().toDataURL();
        cropperPage.classList.remove("active");

        customAlert.showAlert("Imagem escolhida, salve para ver", 1);
    }
    function cancel() {cropperPage.classList.remove("active");}

    // ###############
    // ### FUNCÕES ###
    // ###############
    function createPost(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        if(canvas) formData.append("canvas", canvas);

        fetch(form.action, {method: form.method, body: formData})
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if(data.success) {
                    window.location.href = App.URLROOT + "/admin/editar/" + data.id;
                } else {
                    customAlert.showAlert(data.message, 3);
                }
            })
            .catch(function(err) {
                customAlert.showAlert("Ocorreu um erro, tente mais tarde", 4);
            });
    }

    function updatePost(event) {
        event.preventDefault();
        if(!ckeditor) return;
        const form = event.target;
        const formData = new FormData(form);
        if(canvas) formData.append("canvas", canvas);
        formData.append("ckeditor", ckeditor.getData());

        fetch(form.action, {method: form.method, body: formData})
            .then(function(response) {
                return response.json()
            })
            .then(function(data) {
                if(data.success) {
                    customAlert.showAlert("post atualizado com sucesso", 1);
                    updatePreviewImg();
                } else {
                    customAlert.showAlert(data.message, 3);
                }
            })
            .catch(function(err) {
                console.error(err);
                customAlert.showAlert("Ocorreu um erro, tente mais tarde", 4);
            });
    }

    function updatePreviewImg() {
        const previewImg = document.getElementById("preview-img");
        const imgElement = document.querySelector("#preview-img img");
        if(imgElement) {
            previewImg.removeChild(imgElement);
        }

        const img = document.createElement("img");
        img.src = App.URLROOT + "/assets/img/post/" + id + "/cape.png?" + Math.random();
        img.alt = "Prévia da imagem";
        img.addEventListener("error",function() {
            this.style.display = "none";
        })
        previewImg.appendChild(img);
    }
}
