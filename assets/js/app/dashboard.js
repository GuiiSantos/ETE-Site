if(App.pageId === "dashboard")
{
    // ORDENA A TABELA de noticias
    document.querySelectorAll(".table-sortable th").forEach(headerCell => {
        if(headerCell.dataset.sort) {
            headerCell.addEventListener("click", () => {
                const tableElement = headerCell.parentElement.parentElement.parentElement;
                const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
                const currentIsAscending = headerCell.classList.contains("th-sort-asc");
                sortTableByColumn(tableElement, headerIndex, !currentIsAscending, headerCell.dataset.date);
            });
        }
    });
    document.querySelector(".table-sortable th:nth-child(4)").click();
    document.querySelector(".table-sortable th:nth-child(4)").click();

    /**
     * Tenta ativar ou desativar um post
     *
     * @param {number} id
     */
    function toggleActive(id) {
        event.preventDefault();
        const link = App.URLROOT + "/api/posts/alternar/ativo/" + id;

        fetch(link, {method: "POST"})
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if(data.success) {
                    window.location.href = App.URLROOT + "/admin/painel";
                }
            })
            .catch(function(err) {
                customAlert.showAlert("Ocorreu um erro, tente mais tarde", 4);
            });
    }

    /**
     * Tenta fixar ou desfixar um post
     *
     * @param {number} id
     */
    function togglePinned(id) {
        event.preventDefault();
        const link = App.URLROOT + "/api/posts/alternar/fixado/" + id;

        fetch(link, {method: "POST"})
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if(data.success) {
                    window.location.href = App.URLROOT + "/admin/painel";
                }
            })
            .catch(function(err) {
                customAlert.showAlert("Ocorreu um erro, tente mais tarde", 4);
            });
    }
}