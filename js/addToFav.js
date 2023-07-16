const addToFavoritesButtons = document.querySelectorAll(".add-to-favorite");

addToFavoritesButtons.forEach(button => {
    button.addEventListener("click", function() {
        const vacancyId = button.getAttribute("data-id");

        const formData = new FormData();
        formData.append("vac_id", vacancyId);

        fetch("../php/addToFav.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .catch(error => {
                alert("Error: " + error);
            });
    });
});
