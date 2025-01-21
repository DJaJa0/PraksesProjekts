let dati = [
    { nosaukums: "Galda lampa", apraksts: "12345", kabinets: "201" },
    { nosaukums: "Krēsls", apraksts: "67890", kabinets: "202" }
];

let pašreizējaisIndekss = null;

document.addEventListener("DOMContentLoaded", function () {
    paraditDatus();
});

function pievienotJaunu() {
    document.getElementById("nosaukums").value = "";
    document.getElementById("apraksts").value = "";
    document.getElementById("kabinets").value = "";
    pašreizējaisIndekss = null;
    document.getElementById("labotFormu").style.display = "block";
}

function labot(index) {
    pašreizējaisIndekss = index;
    const ieraksts = dati[index];
    document.getElementById("nosaukums").value = ieraksts.nosaukums;
    document.getElementById("apraksts").value = ieraksts.apraksts;
    document.getElementById("kabinets").value = ieraksts.kabinets;
    document.getElementById("labotFormu").style.display = "block";
}

function saglabatDatus() {
    const nosaukums = document.getElementById("nosaukums").value;
    const apraksts = document.getElementById("apraksts").value;
    const kabinets = document.getElementById("kabinets").value;

    if (pašreizējaisIndekss !== null) {
        dati[pašreizējaisIndekss] = { nosaukums, apraksts, kabinets };
        alert("Dati veiksmīgi atjaunināti!");
    } else {
        dati.push({ nosaukums, apraksts, kabinets });
        alert("Jauns ieraksts veiksmīgi pievienots!");
    }

    document.getElementById("nosaukums").value = "";
    document.getElementById("apraksts").value = "";
    document.getElementById("kabinets").value = "";
    document.getElementById("labotFormu").style.display = "none";
    paraditDatus();
}

function paraditDatus() {
    const inventaraDetaļas = document.getElementById("inventāraDetaļas");
    if (dati.length === 0) {
        inventaraDetaļas.innerHTML = "Nav pievienotu datu.";
        return;
    }

    let html = "<table><thead><tr><th>Nosaukums</th><th>Inventāra Nr.</th><th>Kabineta Nr.</th><th>Darbība</th></tr></thead><tbody>";
    dati.forEach((ieraksts, index) => {
        html += `<tr>
                    <td>${ieraksts.nosaukums}</td>
                    <td>${ieraksts.apraksts}</td>
                    <td>${ieraksts.kabinets}</td>
                    <td>
                        <button onclick="labot(${index})">Labot</button>
                    </td>
                </tr>`;
    });
    html += "</tbody></table>";
    inventaraDetaļas.innerHTML = html;
}
