// Izvairās no formu atkārtotas iesniegšanas
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

let dati = [];
let pašreizējaisIndekss = null;
let pašreizējāLapa = 1;
const ierakstuSkaitsLapa = 5;

document.addEventListener("DOMContentLoaded", function () {
    console.log(" DOMContentLoaded: JavaScript ielādēts!");
    let inventarsSelect = document.getElementById("inventars");
    if (inventarsSelect) {
        inventarsSelect.addEventListener("change", ieladetDatus);
    } else {
        console.error(" Kļūda: 'inventars' ID netika atrasts!");
    }
});

function ieladetDatus() {
    let selectElement = document.getElementById("inventars");
    if (!selectElement) {
        console.error(" Kļūda: 'inventars' select elements nav atrasts!");
        return;
    }

    let tips = selectElement.value;
    console.log(` Izvēlēts inventārs: ${tips}`);

    if (tips === "none") {
        document.getElementById("inventāraDetaļas").innerHTML = "Lūdzu, izvēlieties kategoriju.";
        return;
    }

    fetch(`/Projekts/pagFaili/dati.php?tips=${tips}`)
        .then(response => response.json())
        .then(datiNoServera => {
            console.log(" Ielādētie dati:", datiNoServera);
            if (datiNoServera.error) {
                document.getElementById("inventāraDetaļas").innerHTML = datiNoServera.error;
                return;
            }

            dati = datiNoServera;
            pašreizējāLapa = 1; 
            paraditDatus();
        })
        .catch(error => {
            console.error(" Kļūda ielādējot datus:", error);
        });
}


function paraditDatus() {
    console.log(" Rāda datus tabulā...");
    const inventaraDetaļas = document.getElementById("inventāraDetaļas");
    if (!inventaraDetaļas) {
        console.error(" Kļūda: 'inventāraDetaļas' elements nav atrasts!");
        return;
    }

    if (dati.length === 0) {
        inventaraDetaļas.innerHTML = "Nav pievienotu datu.";
        return;
    }

    let sākums = (pašreizējāLapa - 1) * ierakstuSkaitsLapa;
    let beigas = sākums + ierakstuSkaitsLapa;
    let datiRādīšanai = dati.slice(sākums, beigas);

    let html = "<table><thead><tr><th>Kabinets</th><th>Nosaukums</th><th>Inventāra Nr.</th><th>Darbība</th></tr></thead><tbody>";
    datiRādīšanai.forEach((ieraksts, index) => {
        html += `<tr>

                    <td>${ieraksts.kabinets}</td>
                    <td>${ieraksts.nosaukums}</td>
                    <td>${ieraksts.numurs}</td>
                    <td><button onclick="labot(${sākums + index})">Labot</button>
                    </td>
                </tr>`;
    });
    html += "</tbody></table>";


    html += `<div>
                <button onclick="iepriekšējāLapa()" ${pašreizējāLapa === 1 ? "disabled" : ""}>⬅️ Iepriekšējā</button>
                <button onclick="nākamāLapa()" ${beigas >= dati.length ? "disabled" : ""}>Nākamā ➡️</button>
             </div>`;

    inventaraDetaļas.innerHTML = html;
}


function nākamāLapa() {
    if (pašreizējāLapa * ierakstuSkaitsLapa < dati.length) {
        pašreizējāLapa++;
        paraditDatus();
    }
}

function iepriekšējāLapa() {
    if (pašreizējāLapa > 1) {
        pašreizējāLapa--;
        paraditDatus();
    }
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