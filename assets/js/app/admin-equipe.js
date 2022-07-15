const customSelectCreate = document.getElementById("custom-select");
const customSelectResultCreate = document.getElementById("custom-select-result");
let customSelectCreateClass;

const customSelectUpdate = document.getElementById("custom-select-update");
const customSelectResultUpdate = document.getElementById("custom-select-result-update");
let customSelectUpdateClass;

if(customSelectCreate) {
    customSelectCreateClass = new CustomSelect(customSelectCreate, 0, customSelectResultCreate);
}

if(customSelectUpdate) {
    customSelectUpdateClass = new CustomSelect(customSelectUpdate, 0, customSelectResultUpdate);
}

let addMemberInProcess = false;
function addMember() {
    addMemberInProcess = true;
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const youtube = formData.get("youtube");

    if(canvas) formData.append("canvas", canvas);
    if(youtube.trim() && !validateYoutubeURL(youtube)) return;

    fetch(form.action, {method: form.method, body: formData})
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if(data.success) {
                window.location.href = App.URLROOT + "/admin/equipe";
            } else {
                addMemberInProcess = false;
                customAlert.showAlert(data.message, 3);
            }
        })
        .catch(function(err) {
            customAlert.showAlert("Ocorreu um erro, tente mais tarde", 4);
        });
}

let updateMemberInProcess = false;
function updateMember() {
    updateMemberInProcess = true;
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const youtube = formData.get("youtube");
    if(canvas) formData.append("canvas", canvas);
    if(youtube.trim() && !validateYoutubeURL(youtube)) return;

    console.log(canvas)
    fetch(form.action, {method: form.method, body: formData})
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if(data.success) {
                window.location.href = App.URLROOT + "/admin/equipe";
            } else {
                updateMemberInProcess = false;
                customAlert.showAlert(data.message, 3);
            }
        })
        .catch(function(err) {
            console.log(err);
            customAlert.showAlert("Ocorreu um erro, tente mais tarde", 4);
        });
}

function deleteMember(id) {
    const link = App.URLROOT + "/api/equipe/apagar/" + id;

    fetch(link, {method: "DELETE"})
        .then(function (response) {
            return response.text();
        })
        .then(function(data) {
            console.log(data)
            // if(data.success) {
            //     window.location.href = App.URLROOT + "/admin/equipe";
            // }
        })
        .catch(function(e) {
            console.log(e.message);
        });
}

function openUpdatePage(id, name, job, job_category, youtube = null) {
    const updateMemberPage = document.getElementById("update-member-page");

    updateMemberPage.querySelector("input[name='id']").value = id;
    updateMemberPage.querySelector("input[name='name']").value = name;
    updateMemberPage.querySelector("input[name='job']").value = job;
    if(youtube) {
        updateMemberPage.querySelector("input[name='youtube']").value = youtube;
    }
    const optionToActive = updateMemberPage.querySelector(`.options-custom-select .item[data-value="${job_category}"]`);
    const optionToActiveIndex = Array.from(optionToActive.parentNode.children).indexOf(optionToActive);
    customSelectUpdateClass.setValue(optionToActiveIndex);

    const image = document.getElementById("equipe-item-"+id).querySelector(".avatar img");
    if(image) {
        canvas = imageToCanvas(image);
    }

    updateMemberPage.classList.add("active");
}

function claseUpdatePage() {
    const updateMemberPage = document.getElementById("update-member-page");
    updateMemberPage.classList.remove("active");
}

function validateYoutubeURL(string) {
    let url;

    try {
        url = new URL(string);
    } catch(e) {
        customAlert.showAlert("O link é inválido", 3);
        return false;
    }

    if(url.protocol !== "https:") {
        customAlert.showAlert("O link deve ser HTTPS", 3);
    }

    if(url.host !== "www.youtube.com") {
        customAlert.showAlert("O link deve ser do Youtube", 3);
    }

    return true;
}

function imageToCanvas(image) {
    if(!image.complete || image.naturalWidth === 0) return;

    const imgCanvas = document.createElement("canvas")
    const imgContext = imgCanvas.getContext("2d");

    // Deixa o canvas do tamanho da imagem
    imgCanvas.width = image.width;
    imgCanvas.height = image.height;


    // Desenha a imagem no canvas
    imgContext.drawImage(image, 0, 0, image.width, image.height);

    // Retorna a imagem como data URL
    return imgCanvas.toDataURL("image/png");
}