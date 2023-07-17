
    function submitForm(event) {
    event.preventDefault(); // Забороняємо стандартну дію форми
    this.closest('form').submit(); // Відправляємо форму
}

    document.querySelector('.searchbar input').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
    submitForm.call(this, event);
}
});

    document.querySelector('.search-button').addEventListener('click', function (event) {
    submitForm.call(this, event);
});
