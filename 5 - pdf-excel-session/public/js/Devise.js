function info(id, value) {
    document.getElementById(id).value = value;
}


function info_update(Symbole, Description, localisation, commentaire) {
    document.getElementById("Symbole_update").value = Symbole;
    document.getElementById("Description_update").value = Description;

}

function rechercher(input) {
    let val = input.value;
    var x = new XMLHttpRequest();

    if (val === "") {
        x.open("GET", "/Devise/search/", true);
    } else {
        x.open("GET", `/Devise/search/${val}`, true);
    }
    
    x.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            Devise = JSON.parse(this.responseText);
            document.getElementById("resultats").innerHTML = "";
            
            if (Devise.length != 0) {
                for (const i in Devise) {
                    ligne = "<tr>";
                    ligne += `<td>${Devise[i].Symbole}</td>`;
                    ligne += `<td>${Devise[i].Description}</td>`;
                    ligne += `<td>-</td>`;
     
                    ligne += `<td> 
                            <a class="btn btn-danger" href="#deleteDevise" data-bs-toggle="modal" onclick="info('Symbole_delete','${Devise[i].Symbole}')"><i class="bi bi-trash"></i></a>
                            <a class="btn btn-warning" href="#updateDevise" data-bs-toggle="modal" onclick="info_update('${Devise[i].Symbole}','${Devise[i].Description}')"><i class="bi bi-pencil"></i></a>
                        </td>`;
                    ligne += "</tr>";
                    document.getElementById("resultats").innerHTML += ligne;
                }
            } else {
                document.getElementById("resultats").innerHTML = `<tr><td colspan="7" class="alert alert-danger text-center fw-bold p-3 text-light">N'est aucun Devise</td></tr>`;
            }
        }
    };
    x.send();
}



setTimeout(function () {
    document.querySelector("#autoCloseAlert").style.display = "none";
}, 5000);
