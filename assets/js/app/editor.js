if(App.pageId === "editor")
{
    if(typeof id !== "undefined") {
        document.getElementById("preview-container").classList.add("active");
        updatePreviewImg();
    }

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
                    if(canvas) updatePreviewImg();
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
