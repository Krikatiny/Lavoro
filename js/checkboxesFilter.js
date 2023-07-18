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

// Додати обробник події для кожного чекбоксу категорій
categoryCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // Викликати функцію для повернення у видимість чекбоксів регіонів
        showCheckboxes(regionCheckboxes);

        // Отримати всі обрані значення чекбоксів категорій
        var selectedCategoryValues = Array.from(document.querySelectorAll('input[name="tags"]:checked')).map(function (checkbox) {
            return checkbox.value;
        });

        // Отримати всі рядки таблиці вакансій
        var rows = document.querySelectorAll('.table-vacancies tr');

        // Перевірити, чи всі чекбокси категорій деактивовані
        var allCategoryUnchecked = Array.from(categoryCheckboxes).every(function (checkbox) {
            return !checkbox.checked;
        });

        // Перебрати кожен рядок і змінити видимість відповідно до обраних чекбоксів категорій
        rows.forEach(function (row) {
            // Отримати елемент з тегом <td> для тегів вакансій
            var tagsCell = row.querySelector('.vacancytags');

            // Отримати текстовий вміст тегів
            var tags = tagsCell.textContent;

            // Перевірити, чи містить текстовий вміст хоча б одне обране значення чекбоксів категорій
            var isVisible = allCategoryUnchecked || selectedCategoryValues.some(function (value) {
                return tags.includes(value);
            });

            // Встановити видимість рядка відповідно до результату перевірки
            row.style.display = isVisible ? '' : 'none';
        });

        // Якщо всі чекбокси категорій деактивовані, показати всі рядки таблиці
        if (allCategoryUnchecked) {
            rows.forEach(function (row) {
                row.style.display = '';
            });
        }
    });
});

// Додати обробник події для кожного чекбоксу регіону
regionCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // Викликати функцію для повернення у видимість чекбоксів категорій
        showCheckboxes(categoryCheckboxes);

        // Отримати всі обрані значення чекбоксів регіонів
        var selectedRegionValues = Array.from(document.querySelectorAll('input[name="region"]:checked')).map(function (checkbox) {
            return checkbox.value;
        });

        // Отримати всі рядки таблиці вакансій
        var rows = document.querySelectorAll('.table-vacancies tr');

        // Перевірити, чи всі чекбокси регіонів деактивовані
        var allRegionUnchecked = Array.from(regionCheckboxes).every(function (checkbox) {
            return !checkbox.checked;
        });

        // Перебрати кожен рядок і змінити видимість відповідно до обраних чекбоксів регіонів
        rows.forEach(function (row) {
            // Отримати елемент з тегом <td> для регіонів вакансій
            var regionCell = row.querySelector('.vacancyregion');

            // Отримати текстовий вміст регіону
            var region = regionCell.textContent;

            // Перевірити, чи містить текстовий вміст хоча б одне обране значення чекбоксів регіонів
            var isVisible = allRegionUnchecked || selectedRegionValues.some(function (value) {
                return region.includes(value);
            });

            // Встановити видимість рядка відповідно до результату перевірки
            row.style.display = isVisible ? '' : 'none';
        });

        // Якщо всі чекбокси регіонів деактивовані, показати всі рядки таблиці
        if (allRegionUnchecked) {
            rows.forEach(function (row) {
                row.style.display = '';
            });
        }
    });
});
