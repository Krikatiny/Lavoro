var slider = document.getElementById("myRange");
var output = document.getElementById("sliderValue");
output.innerHTML = slider.value;

slider.oninput = function () {
    output.innerHTML = this.value;

    var rows = Array.from(document.querySelectorAll(".table-vacancies tr"));

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var priceCell = row.querySelector(".price");
        var price = parseFloat(priceCell.textContent);

        if (price >= this.value) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
};

