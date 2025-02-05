// Izvairās no formu atkārtotas iesniegšanas
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

let dati = [];
let pašreizējaisIndekss = null;

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOMContentLoaded: JavaScript ielādēts!");
    let inventarsSelect = document.getElementById("inventars");
    if (inventarsSelect) {
        inventarsSelect.addEventListener("change", ieladetDatus);
    } else {
        console.error("Kļūda: 'inventars' ID netika atrasts!");
    }
});

let pašreizējāLapa = 1; 

function ieladetDatus() {
    let selectElement = document.getElementById("inventars");
    if (!selectElement) {
        console.error("Kļūda: 'inventars' select elements nav atrasts!");
        return;
    }

    let tips = selectElement.value;
    console.log(`Izvēlēts inventārs: ${tips}`);

    if (tips === "none") {
        document.getElementById("inventāraDetaļas").innerHTML = "Lūdzu, izvēlieties kategoriju.";
        return;
    }

    fetch(`/PraksesProjekts/pagFaili/dati.php?tips=${tips}&page=${pašreizējāLapa}`)
        .then(response => response.json())
        .then(datiNoServera => {
            console.log("Ielādētie dati:", datiNoServera);
            if (datiNoServera.error) {
                document.getElementById("inventāraDetaļas").innerHTML = datiNoServera.error;
                return;
            }

            dati = datiNoServera;
            paraditDatus();
        })
        .catch(error => {
            console.error("Kļūda ielādējot datus:", error);
        });
}


function nākamāLapa() {
    pašreizējāLapa++;
    ieladetDatus();
}


function iepriekšējāLapa() {
    if (pašreizējāLapa > 1) {
        pašreizējāLapa--;
        ieladetDatus();
    }
}


function paraditDatus() {
    console.log("Rāda datus tabulā...");
    const inventaraDetaļas = document.getElementById("inventāraDetaļas");
    if (!inventaraDetaļas) {
        console.error("Kļūda: 'inventāraDetaļas' elements nav atrasts!");
        return;
    }

    if (dati.length === 0) {
        inventaraDetaļas.innerHTML = "Nav pievienotu datu.";
        return;
    }

    let html = `
        <div class="scroll-container">
            <table>
                <thead>
                    <tr>
                        <th>Kabinets</th>
                        <th>Nosaukums</th>
                        <th>Inventāra Nr.</th>
                        <th>Darbība</th>
                    </tr>
                </thead>
                <tbody>`;

    dati.slice(0, 5).forEach((ieraksts, index) => {
        html += `
            <tr>
                <td>${ieraksts.kabinets}</td>
                <td>${ieraksts.nosaukums}</td>
                <td>${ieraksts.numurs}</td>
                <td><button onclick="labot(${index})">Labot</button></td>
            </tr>`;
    });

    html += `</tbody></table></div>`;

    inventaraDetaļas.innerHTML = html;
}

function labot(index) {
    pašreizējaisIndekss = index;
    const ieraksts = dati[index];
    document.getElementById("nosaukums").value = ieraksts.nosaukums;
    document.getElementById("apraksts").value = ieraksts.numurs;
    document.getElementById("kabinets").value = ieraksts.kabinets;
    document.getElementById("labotFormu").style.display = "block";
}

function pievienotJaunu() {
    document.getElementById("nosaukums").value = "";
    document.getElementById("apraksts").value = "";
    document.getElementById("kabinets").value = "";
    pašreizējaisIndekss = null;
    document.getElementById("labotFormu").style.display = "block";
}
