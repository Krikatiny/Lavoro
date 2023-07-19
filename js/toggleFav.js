function toggleStar(star) {
    const dataId = star.getAttribute("data-id");
    const starBtn = document.querySelector('.star-btn');
    let stared = star.getAttribute('starred');

    if (stared === "false") {
        star.innerHTML = '★';
        star.setAttribute('starred', "true");
        const vacancyId = star.getAttribute("data-id");

        const formData = new FormData();
        formData.append("vac_id", vacancyId);

        fetch("../php/addToFav.php", {
            method: "POST",
            body: formData
        })
            .catch(error => {
                alert("Error: " + error);
            });
    } else {
        star.innerHTML = '☆';
        const vacancyId = star.getAttribute("data-id");

        const formData = new FormData();
        formData.append("vac_id", vacancyId);

        fetch("../php/delFromFav.php", {
            method: "POST",
            body: formData
        })
            .catch(error => {
                alert("Error: " + error);
            });
        star.setAttribute('starred', "false");
    }
}
