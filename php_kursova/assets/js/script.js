function loadMovies() {
    fetch("api/load.php")
        .then(res => res.json())
        .then(data => {
            if (data.status !== "success") return;

            const movies = data.movies;
            const container = document.querySelector("#movieList");
            container.innerHTML = "";

            movies.forEach(movie => {
                container.innerHTML += `
                    <tr>
                        <td>${movie.title}</td>
                        <td>${movie.genre}</td>
                        <td>${movie.year}</td>
                        <td>${movie.description}</td>
                        <td>
                            <button onclick="window.location.href='edit.php?movie_id=${movie.movie_id}'">Редактиране</button>
                            <button onclick="deleteMovie(${movie.movie_id})" style="background:red;color:white;">Изтриване</button>
                        </td>
                    </tr>
                `;
            });
        });
}


function addMovie() {
    const formData = new FormData();
    formData.append("title", document.querySelector("#title").value);
    formData.append("genre", document.querySelector("#genre").value);
    formData.append("year", document.querySelector("#year").value);
    formData.append("description", document.querySelector("#description").value);

    fetch("api/add.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert("Филмът е добавен!");
                loadMovies();
                document.querySelector("#title").value = "";
                document.querySelector("#genre").value = "";
                document.querySelector("#year").value = "";
                document.querySelector("#description").value = "";
            } else {
                alert("Грешка при добавяне.");
            }
        });
}

function editMovie(id, title, genre, year, description) {
    document.querySelector("#edit_id").value = id;
    document.querySelector("#edit_title").value = title;
    document.querySelector("#edit_genre").value = genre;
    document.querySelector("#edit_year").value = year;
    document.querySelector("#edit_description").value = description;
}

function searchMovies() {
    const formData = new FormData();
    formData.append("title", document.querySelector("#search_title").value);
    formData.append("genre", document.querySelector("#search_genre").value);
    formData.append("year", document.querySelector("#search_year").value);

    fetch("api/search.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status !== "success") {
                alert("Моля, въведете поне един критерий.");
                return;
            }

            const container = document.querySelector("#movieList");
            container.innerHTML = "";

            data.movies.forEach(movie => {
                container.innerHTML += `
                <tr>
                    <td>${movie.title}</td>
                    <td>${movie.genre}</td>
                    <td>${movie.year}</td>
                    <td>${movie.description}</td>
                    <td>
                        <button onclick="window.location.href='edit.php?movie_id=${movie.movie_id}'">Редактиране</button>
                        <button onclick="deleteMovie(${movie.movie_id})" style="background:red;color:white;">Изтриване</button>
                    </td>
                </tr>
            `;
            });

            if (data.movies.length === 0) {
                container.innerHTML = `
                <tr><td colspan="5" style="text-align:center;">Няма намерени резултати.</td></tr>
            `;
            }
        });
}



function updateMovie() {
    const formData = new FormData();
    formData.append("movie_id", document.querySelector("#edit_id").value);
    formData.append("title", document.querySelector("#edit_title").value);
    formData.append("genre", document.querySelector("#edit_genre").value);
    formData.append("year", document.querySelector("#edit_year").value);
    formData.append("description", document.querySelector("#edit_description").value);

    fetch("api/update.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert("Филмът е редактиран!");
                loadMovies();
            } else {
                alert("Грешка при редактиране.");
            }
        });
}

function deleteMovie(id) {
    if (!confirm("Искате ли да изтриете филма?")) return;

    const formData = new FormData();
    formData.append("movie_id", id);

    fetch("api/delete.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert("Филмът е изтрит.");
                loadMovies();
            } else {
                alert("Грешка при изтриване.");
            }
        });
}

window.onload = loadMovies;
