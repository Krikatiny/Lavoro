// У вашому скрипті addToFav.js
const addToFavoritesButtons = document.querySelectorAll(".add-to-favorite");
const deleteFromFavoritesButtons = document.querySelectorAll(".delete-from-favorite");

addToFavoritesButtons.forEach(button => {
    button.addEventListener("click", function () {
        if (event.target.classList.contains("add-to-favorite")) {
            const vacancyId = button.getAttribute("data-id");

            const formData = new FormData();
            formData.append("vac_id", vacancyId);

            fetch("../php/addToFav.php", {
                method: "POST",
                body: formData
            })
                .catch(error => {
                    alert("Error: " + error);
                });
        }
    });
});

deleteFromFavoritesButtons.forEach(button => {
    button.addEventListener("click", function () {
        const vacancyId = button.getAttribute("data-id");

        const formData = new FormData();
        formData.append("vac_id", vacancyId);

        fetch("../php/delFromFav.php", {
            method: "POST",
            body: formData
        })
            .catch(error => {
                alert("Error: " + error);
            });
    });
});
