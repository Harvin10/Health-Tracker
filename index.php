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
        <div class="data">
        </div>
    </div>
    <script>
        function getData(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(JSON.parse(this.responseText));
                    let div = document.querySelector(".data");
                    div.innerHTML = "";
                    let ul;
                    let datas = JSON.parse(this.responseText);
                    datas.map(data => {
                        let jsx = ` 
                            <li>id: ${data.id}</li>
                            <li>name: ${data.name}</li>
                            <li>age: ${data.age}</li>
                            <li>gender: ${data.gender}</li>
                            <li>health: ${data.id_health}</li>
                        `;
                        ul = document.createElement("ul");
                        ul.innerHTML = jsx;
                        div.appendChild(ul);
                    })


                }
            };
            xhttp.open("GET", "data.php?q=" + id, true);
            xhttp.send();
        }
    </script>
</body>

</html>