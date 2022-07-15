

class CustomSelect {

    /**
     *
     * @param {Element} customSelectContainer
     * @param {number} activeOption
     * @param {Element} customSelectElementResult - Elemento onde será salvo o value (opcional)
     */
    constructor(customSelectContainer, activeOption = 0, customSelectElementResult = null) {
        this.customAlertContainer = customSelectContainer;
        this.select = this.customAlertContainer.querySelector(".btn-custom-select");
        this.optionBox = this.customAlertContainer.querySelector(".options-custom-select");
        this.options = [...this.customAlertContainer.querySelectorAll(".options-custom-select .item")];
        this.activeOption = activeOption;
        this.customSelectElementResult = customSelectElementResult;

        this.options.forEach((item, i) => {
            item.onmousemove = () => {
                this.hoverOptions(i);
            }
        })

        // Fecha outros select na página e abre o select atual
        this.select.onclick = () => {
            document.querySelectorAll(".custom-select").forEach((e) => {
                if(e.id === this.customAlertContainer.id) return;
                e.querySelector(".btn-custom-select").classList.remove("active");
                e.querySelector(".options-custom-select").classList.remove("active");
            })

            this.select.classList.toggle("active");
            this.optionBox.classList.toggle("active");
        }

        // Fecha o select
        window.addEventListener("click", (e) => {
            if(!e.target.className.includes("select")){
                this.select.classList.remove("active");
                this.optionBox.classList.remove("active");
            }
        });

        // Define as setas do teclado
        window.addEventListener("keydown",  (e) => {
            if(this.select.className.includes("active")) {
                e.preventDefault();
                if(e.key === "ArrowDown" && this.activeOption < this.options.length - 1) {
                    this.hoverOptions(this.activeOption + 1);
                } else if(e.key === "ArrowUp" && this.activeOption > 0){
                    this.hoverOptions(this.activeOption - 1);
                } else if(e.key === "Enter") {
                    this.select.classList.remove("active");
                    this.optionBox.classList.remove("active");
                }
            }
        });

        this.setValue();
    }

    hoverOptions(i) {
        this.options[this.activeOption].classList.remove("active");
        this.options[i].classList.add("active");
        this.activeOption = i;
        this.setValue();
    }

    setValue(i = null) {
        if(i) {
            this.options[this.activeOption].classList.remove("active");
            this.activeOption = i;
        }

        this.select.innerHTML = this.options[this.activeOption].innerHTML;
        this.select.value = this.options[this.activeOption].dataset.value;
        this.options[this.activeOption].classList.add("active");

        if(this.customSelectElementResult) {
            this.customSelectElementResult.setAttribute("value", this.options[this.activeOption].dataset.value);
        }
    }
}