/**
 * ########################
 * ###   CUSTOM ALERT   ###
 * ########################
 */
const customAlertElement = document.getElementById("custom-alert");
let customAlert;

if(customAlertElement) {
    customAlert = new CustomAlert(customAlertElement);
}

/**
 * ###################
 * ###   CROPPER   ###
 * ###################
 */
const cropperPage = document.getElementById("cropper-page");
const capeInput = document.getElementById("cape-input");
let canvas;

if(cropperPage && capeInput) {
    const cropperEditor = document.getElementById("cropper-editor");
    const cropperConfig = {
        viewMode: 1
    }
    let objectURL;
    let cropper;

    const URL = window.URL || window.webkitURL;
    if(URL) {

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

    let scaleX = -1; let scaleY = -1;
    function rotateUndo() {cropper.rotate(-45)}
    function rotateRedo() {cropper.rotate(45)}
    function invertX() {cropper.scaleX(scaleX); scaleX = scaleX * -1}
    function invertY() {cropper.scaleY(scaleY); scaleY = scaleY * -1}
    function finish() {
        canvas = cropper.getCroppedCanvas().toDataURL();
        cropperPage.classList.remove("active");

        customAlert.showAlert("Imagem selecionado com sucesso!", 1);
    }
    function cancel() {cropperPage.classList.remove("active");}
}
