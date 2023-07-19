// Функція для повернення у видимість чекбоксів
function showCheckboxes(checkboxes) {
    checkboxes.forEach(function (checkbox) {
        checkbox.closest('label').style.display = '';
    });
}

// Отримати всі чекбокси для категорій
var categoryCheckboxes = document.querySelectorAll('input[name="tags"]');
// Отримати всі чекбокси для регіонів
var regionCheckboxes = document.querySelectorAll('input[name="region"]');
var slider = document.getElementById("myRange");
var output = document.getElementById("sliderValue");
output.innerHTML = slider.value;

// Отримати всі рядки таблиці вакансій
var rows = document.querySelectorAll('.table-vacancies tbody tr');

// Додати обробник події для кожного чекбоксу категорій
categoryCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', filterVacancies);
});

// Додати обробник події для кожного чекбоксу регіону
regionCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', filterVacancies);
});

slider.oninput = function () {
    output.innerHTML = this.value;
    filterVacancies();
};

// Функція для фільтрації вакансій
function filterVacancies() {
    // Отримати всі обрані значення чекбоксів категорій
    var selectedCategoryValues = Array.from(document.querySelectorAll('input[name="tags"]:checked')).map(function (checkbox) {
        return checkbox.value;
    });

    // Отримати всі обрані значення чекбоксів регіонів
    var selectedRegionValues = Array.from(document.querySelectorAll('input[name="region"]:checked')).map(function (checkbox) {
        return checkbox.value;
    });

    // Перевірити, чи всі чекбокси категорій та регіонів деактивовані
    var allCategoryUnchecked = Array.from(categoryCheckboxes).every(function (checkbox) {
        return !checkbox.checked;
    });

    var allRegionUnchecked = Array.from(regionCheckboxes).every(function (checkbox) {
        return !checkbox.checked;
    });

    // Перебрати кожен рядок і змінити видимість відповідно до обраних чекбоксів категорій та регіонів
    rows.forEach(function (row) {
        var tagsCell = row.querySelector('.vacancytags');
        var tags = tagsCell.textContent;

        var regionCell = row.querySelector('.vacancyregion');
        var region = regionCell.textContent;

        var priceCell = row.querySelector('.price');
        var price = parseFloat(priceCell.textContent);

        var isCategoryVisible = allCategoryUnchecked || selectedCategoryValues.some(function (value) {
            return tags.includes(value);
        });

        var isRegionVisible = allRegionUnchecked || selectedRegionValues.some(function (value) {
            return region.includes(value);
        });

        var isPriceVisible = price >= slider.value;

        var isVisible = isCategoryVisible && isRegionVisible && isPriceVisible;

        row.style.display = isVisible ? '' : 'none';
    });


}
