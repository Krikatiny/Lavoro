const scrollYPosition = window.scrollY;

// Отримуємо посилання на кнопку перезавантаження
const reloadButton = document.getElementById('star-btn');

function reload() {

    window.location.reload();

    window.scrollTo(0, scrollYPosition);
};