let addMemberInProcess = false;
function addMember() {
    addMemberInProcess = true;
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