const App = {};
App.URLROOT = window.location.origin;
App.pageId = document.body.getAttribute("data-page-id");
App.breakpoints = [];

///
///   FUNÇÕES
///

/**
 * Ordena uma tabela HTML
 *
 * @param {HTMLTableElement} table Ordena a table
 * @param {number} column Coluna a ser ordena
 * @param {boolean} asc Define se a ordenação será ascendente
 * @param {boolean} isDate Define se a coluna é do tipo data
 */
function sortTableByColumn(table, column, asc = true, isDate = false) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    // Ordena cada linha
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${column + 1})`).textContent.trim();

        if(!isDate) {
            return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
        } else {
            return (new Date(formatDate(aColText)).valueOf() - new Date(formatDate(bColText)).valueOf()) * dirModifier;
        }
    });

    // Limpa a tabela
    while(tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    // Adiciona novamente os items agora ordenados
    tBody.append(...sortedRows);

    // Salva como a tabela esta atualmente ordenada
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${column + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${column + 1})`).classList.toggle("th-sort-desc", !asc);
}

/**
 * Retorna uma data do formato d/m/y h:m:s no formato m/d/y h:m:s
 *
 * @param {string} date
 * @return {string}
 */
function formatDate(date) {
    const dateTime = date.trim().split(" "); // Separa a data do tempo
    const dateArray = dateTime[0].split("/"); // Divide a data
    return `${dateArray[1]}/${dateArray[0]}/${dateArray[2]} ${dateTime[1]}`;
}

/**
 * Tenta apagar uma Post
 *
 * @param {number} id
 */
function deleteNotice(id) {
    const link = App.URLROOT + "/api/posts/apagar/" + id;

    fetch(link, {method: "DELETE"})
        .then(function (response) {
            return response.json();
        })
        .then(function(data) {
            if(data.success) {
                window.location.href = App.URLROOT + "/admin/painel";
            }
        })
}
