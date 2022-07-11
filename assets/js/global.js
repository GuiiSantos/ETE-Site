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

/**
 * #########################
 * ###   CUSTOM SELECT   ###
 * #########################
 */
const customSelect = document.getElementById("custom-select");
const customSelectResult = document.getElementById("custom-select-result");

if(customSelect) {
    const select = customSelect.querySelector(".btn-custom-select");
    const optionBox = customSelect.querySelector(".options-custom-select");
    const options = [...customSelect.querySelectorAll(".options-custom-select .item")];

    let activeOption = 0; // default should be 0

    options.forEach((item, i) => {
        item.onmousemove = () => {
            hoverOptions(i);
        }
    })
    const hoverOptions = (i) => {
        options[activeOption].classList.remove("active");
        options[i].classList.add("active");
        activeOption = i;
        setValue();
    }

    // Abre e fecha o select
    window.onclick = (e) => {
        if(!e.target.className.includes("select")){
            select.classList.remove("active");
            optionBox.classList.remove("active");
        } else{
            select.classList.toggle("active");
            optionBox.classList.toggle("active");
        }
    }

    // Define as setas do teclado
    window.onkeydown = (e) => {
        if(select.className.includes("active")){
            e.preventDefault();
            if(e.key === "ArrowDown" && activeOption < options.length - 1){
                hoverOptions(activeOption + 1);
            } else if(e.key === "ArrowUp" && activeOption > 0){
                hoverOptions(activeOption - 1);
            } else if(e.key === "Enter"){
                select.classList.remove("active");
                optionBox.classList.remove("active");
            }
        }
    }

    // Configura o valor
    const setValue = () => {
        select.innerHTML = select.value = options[activeOption].innerHTML;
        customSelectResult.value = select.value = options[activeOption].dataset.value;
    }
    setValue();
}
