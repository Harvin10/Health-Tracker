<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Health tracker</title>
</head>

<body>
    <div class="container">
        <input type="text" class="search" onkeyup="getData(this.value)" placeholder="Citizen ID">
        <div class="data-container">
        </div>
    </div>
    <script>
        let div = document.querySelector(".data-container");
        let search = document.querySelector(".search");
        let ul = null;

        function getData(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    div.innerHTML = "";
                    let datas = JSON.parse(this.responseText);
                    let jsx;
                    if (typeof datas[0] == 'string') {
                        jsx = `${datas[0]}`;
                        ul = document.createElement("ul");
                        ul.innerHTML = jsx;
                        div.appendChild(ul);
                    } else {
                        datas.map(data => {
                            jsx = ` 
                            <li>id: <span class="data">${data.id}</span></li>
                            <li>name: <span class="data">${data.name}</span></li>
                            <li>age: <span class="data">${data.age}</span></li>
                            <li>gender: <span class="data">${data.gender}</span></li>
                            <li>health: <span class="data">${data.id_health}</span></li>
                        `;
                            ul = document.createElement("ul");
                            ul.innerHTML = jsx;
                            div.appendChild(ul);
                        })
                    }
                }
            };
            xhttp.open("GET", "data.php?q=" + id, true);
            xhttp.send();
        }

        search.addEventListener("keyup", () => {
            if (search.value != "") {
                div.style.display = "block";
                div.style.backgroundColor = "#f5fac8";
                search.classList.add("change-search");
            } else {
                div.style.backgroundColor = "#aee8e6";
                search.classList.remove("change-search");
            }
        })
    </script>
</body>

</html>