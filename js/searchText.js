document.addEventListener("DOMContentLoaded", function() {
    var searchForm = document.querySelector(".searchbar");
    var searchButton = document.getElementById("searchButton");
    var searchText = document.getElementById("searchText");

    searchForm.addEventListener("submit", function(event) {
        event.preventDefault();
        performSearch();
    });

    searchButton.addEventListener("click", function(event) {
        if (event.target === searchText) {
            event.preventDefault();
            performSearch();
        }
    });


    searchText.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            performSearch();
        }
    });

    function performSearch() {
        var searchValue = searchText.value.toLowerCase();
        var table = document.getElementsByClassName("table-vacancies")[0];
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var nameColumn = rows[i].querySelector(".vacancyname");
            if (nameColumn) {
                var nameText = nameColumn.innerText.toLowerCase();
                if (nameText.includes(searchValue)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
});
