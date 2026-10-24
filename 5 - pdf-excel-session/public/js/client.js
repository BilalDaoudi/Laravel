function info(id, value) {
    document.getElementById(id).value = value;
}

function info_bloque(id, value, info) {
    document.getElementById(id).value = value;
    document.getElementById("verrouiller").innerHTML = info;
}

function info_update(username, nom, localisation, commentaire) {
    document.getElementById("username_update").value = username;
    document.getElementById("nom_update").value = nom;
    document.getElementById("localisation_update").value = localisation;
    document.getElementById("commentaire_update").value = commentaire;
}

function rechercher(input) {
    let val = input.value;
    var x = new XMLHttpRequest();

    if (val === "") x.open("GET", `/clients/search/`, true);
    else x.open("GET", `/clients/search/${val}`, true);
    x.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            Clients = JSON.parse(this.responseText);
            document.getElementById("resultats").innerHTML = "";
            if (Clients.length != 0) {
                for (const i in Clients) {
                    ligne = "<tr>";
                    ligne += `<td>${Clients[i].username}</td>`;
                    ligne += `<td>${Clients[i].nom}</td>`;
                    ligne += `<td>${Clients[i].localisation}</td>`;
                    ligne += `<td>${Clients[i].commentaire}</td>`;
                    ligne += `<td>-</td>`;
                    ligne += `<td></td>`;
                    ligne += `<td> 
                            <a class="btn btn-info" href="#passwordClient" data-bs-toggle="modal" onclick="info('username_password','${Clients[i].username}')"><i class="bi bi-key"></i></a>
                            <a class="btn btn-danger" href="#deleteClient" data-bs-toggle="modal" onclick="info('username_delete','${Clients[i].username}')"><i class="bi bi-trash"></i></a>
                            <a class="btn btn-warning" href="#updateClient" data-bs-toggle="modal" onclick="info_update('${Clients[i].username}','${Clients[i].nom}','${Clients[i].localisation}','${Clients[i].commentaire}')"><i class="bi bi-pencil"></i></a>
                        </td>`;
                    ligne += "</tr>";
                    document.getElementById("resultats").innerHTML += ligne;
                }
            } else
                document.getElementById(
                    "resultats"
                ).innerHTML = `<tr><td colspan="7" class="alert alert-danger text-center fw-bold p-3 text-light">N'est aucun client</td></tr>`;
        }
    };
    x.send();
}

setTimeout(function () {
    document.querySelector("#autoCloseAlert").style.display = "none";
}, 5000);
