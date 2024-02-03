<head>
    <link rel="stylesheet" href="public/css/tableclient.css">
</head>
<div class="bg-dark">
    <table class="table table_client">
        <div class="d-flex justify-content-between align-items-center">
            <a href="client&action=insert" button type="button" class="btn btn-secondary my-2">CREER</button><i class="fas fa-plus"></i></a>
            <div class="d-flex justify-content-center align-items-center mx-3">
                <input id="mot" name="mot" onkeydown="touch(event)" type="search" class="search" placeholder="Recherche">
                <a href="javascript:search()" class="search-logo text-light"><i class="fa fa-search fa-lg"></i></a>
            </div>

        </div>

        <!-- <div class="button d-flex justify-content-between my-3">
        <a href="client&action=insert" class="btn btn-primary">Ajourter</a>
        <a href="client&action=afficher" class="btn btn-primary">Afficher</a>
        <a href="" class="btn btn-primary">Modifier</a>
        <a href="" class="btn btn-primary">Supprimer</a>
    </div> -->
        <thead id="thead_client">
            <tr>
                <th class="w5"></th>
                <th class="w10">CODE</th>
                <th class="w20">NOM</th>
                <th class="w30">PRENOM</th>
                <th class="w30">EMAIL</th>
                <th> ACTION</th>
            </tr>
        </thead>
        <tbody id="tbody_client">
        </tbody>
        <tfoot id="tfoot_client">
            <tr>
                <th colspan="7" class="text-center" id="count">Total</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    let listClients = <?= json_encode($listClients); ?>;
    // console.log(Clients);  // Add this line
    allClients(listClients);

    function allClients(tableName) {
        let template = listClients.map((client) => {
            return `
                <tr>
                <td class = "w5"><input type = "checkbox"></td>
                    <td class = "w10">${client.id}</td>
                    <td class = "w20">${client.nom}</td>
                    <td class = "w30">${client.prenom}</td>

                    <td class = "w30">${client.email}</td>
                    <td>
                    <div class="button d-flex justify-content-between my-3">
                        <a href="client&action=afficher&id=${client.id}" class="btn btn-sm btn-secondary mx-2" ><i class="fas fa-eye"></i></a>
                        <a href="client&action=modifier&id=${client.id}" class="btn btn-sm btn-success mx-2"><i class = "fas fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger mx-2" onclick="supprimer(${client.id})"><i class="fas fa-trash"></i></a> 
                    </div>
                    </td>
                </tr>
            `;
        }).join(' ');

        document.getElementById('tbody_client').innerHTML = template;
        let count = listClients.length;
        document.getElementById('count').innerHTML = `<h3>Total Client : ${count}</h3>`;
    }
    const supprimer = (id) => {
        let confirmation = confirm('Voulez-vous vraiment supprimer ce client?');
        if (confirmation) {
            document.location.href = `client&action=supprimer&id=${id}`;
        }
    }

    const touch = (event) => {
        if (event.key == "Enter") {
            search();
        }
    }

   

    function search() {
        let xhr = new XMLHttpRequest();
        let mot = document.getElementById('mot').value;
        xhr.open('GET', `client&action=search&mot=${mot}`);
        xhr.onload = function() {
            if (xhr.status == 200) {
                listClients = JSON.parse(xhr.responseText);
                allClients(listClients);
            }
        }
        xhr.send();
    }
</script>