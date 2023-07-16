const addToFavoritesButtons = document.querySelectorAll(".add-to-favorites");

addToFavoritesButtons.forEach(button => {
    button.addEventListener("click", function() {
        const vacancyId = button.getAttribute("id");

        fetch(`../php/vacancy-page.php=${vacancyId}`)
            .then(response => response.json())
            .then(data => {
                alert("Added!");
            })
            .catch(error => {
                alert("Not Added((");
            });
    });
});