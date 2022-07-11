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