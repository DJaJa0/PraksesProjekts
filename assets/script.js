// Palīdz izvairīties no formu atkārtotas iesniegšanas (resubmission)
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

// Masīvs ar datiem (lokāli)
const dati = {
    dators: [
        { nosaukums: "Dell",apraksts:"213232", kabinets: "201" },
        { nosaukums: "Acer",apraksts:"5664677757", kabinets: "202" },
        { nosaukums: "MSI",apraksts:"23424", kabinets: "23" }
    ],
    monitors: [
        { nosaukums: "Samsung Lite",apraksts:"213", kabinets: "121" },
        { nosaukums: "HP",apraksts:"967564", kabinets: "201" },
        { nosaukums: "Samsung Lite",apraksts:"786442", kabinets: "202" },
        { nosaukums: "HP",apraksts:"966532", kabinets: "23" }

    ],
    projektors: [
        { nosaukums: "Dell smart",apraksts:"26564", kabinets: "121" },
        { nosaukums: "Dell smart",apraksts:"26566", kabinets: "202" },
    ]
};

// Parāda izvēlēto datu kategoriju
function paraditDatus(value) {
    const satursD = document.getElementById("saturs");
    const inventaraDetaļas = document.getElementById("inventāraDetaļas");
    const labotF = document.getElementById("labotFormu");

    if (value === "none") {
        satursD.style.display = "none";
        labotF.style.display = "none";
        return;
    }

    // Ģenere sarakstu ar datiem
    const kategorijasDati = dati[value] || [];
    let html = "";
    kategorijasDati.forEach((item, index) => {
        html += `Nosaukums:${item.nosaukums} || Inventrāra Nr:${item.apraksts} || Kabinets:(${item.kabinets})<br>`;
    });

    inventaraDetaļas.innerHTML = html || "Nav informācijas";
    satursD.style.display = "block";
}
document.getElementById("inventars").addEventListener("change", (event) => {
    paraditDatus(event.target.value);
});

// Saglabā izmaiņas lokāli
function saglabatDatus() {
    const nosaukums = document.getElementById("nosaukums").value;
    const apraksts = document.getElementById("apraksts").value;
    const kabinets = document.getElementById("kabinets").value;
    const kategorija = document.getElementById("inventars").value;

    // Pievieno jauno informāciju masīvam(tie nesaglabājas ja lietotājs iejiet pa jaunu)
    dati[kategorija].push({ nosaukums: nosaukums, kabinets: kabinets });

    // Vnk paziņojums kad viss ir veiksmīgi
    alert("Dati veiksmīgi saglabāti!");

    // Notīra ievades laukus kad labo lai nerādās iepriekšējie dati/informācija
    document.getElementById("nosaukums").value = "";
    document.getElementById("apraksts").value = "";
    document.getElementById("kabinets").value = "";
    document.getElementById("labotFormu").style.display = "none";

    paraditDatus(kategorija);
}

// Parāda labošanas formu(izsauc arā formu kur var labot datus)
function labot() {
    document.getElementById("labotFormu").style.display = "block";
}
