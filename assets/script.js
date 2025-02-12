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

    let tipsMap = {
        "dators": "datori",
        "monitors": "monitori",
        "projektors": "projektori",
        "tumbas": "tumbas",
        "printers": "printeri",
        "dok": "dok"
    };

    let tips = tipsMap[selectElement.value] || selectElement.value; 

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
function saglabatDatus() {
    let nosaukums = document.getElementById("nosaukums").value;
    let apraksts = document.getElementById("apraksts").value;
    let kabinets = document.getElementById("kabinets").value;
    
    let dati = {
        nosaukums: nosaukums,
        numurs: apraksts,
        kabinets: kabinets
    };

    if (pašreizējaisIndekss !== null) {
        dati.id = dati[pašreizējaisIndekss].id; // Piešķir ID rediģēšanas gadījumā
    }

    fetch('/PraksesProjekts/pagFaili/saglabat.php', {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dati)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            aizvertFormu();
            ieladetDatus(); // Pārlādē datus
        } else {
            alert("Kļūda: " + data.error);
        }
    })
    .catch(error => console.error("Kļūda saglabājot:", error));
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

function aizvertFormu() {
    document.getElementById("labotFormu").style.display = "none";
}

function pievienotJaunu() {
    document.getElementById("labotFormu").style.display = "block";
}


//Ritināšanas poga uz augšu


document.addEventListener("DOMContentLoaded", function() {
    let scrollTopBtn = document.getElementById("scrollTopBtn");

    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollTopBtn.classList.add("show");
        } else {
            scrollTopBtn.classList.remove("show");
        }
    };

    window.scrollToTop = function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };
});

//konta dzēšana

function showDeleteForm() {
    document.getElementById("delete-form").style.display = "block";
}

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        let errorMsg = document.getElementById("error-message");
        if (errorMsg) {
            errorMsg.style.opacity = "0"; 
            setTimeout(() => errorMsg.style.display = "none", 1000);
        }
    }, 5000);
});

function hideDeleteForm() {
    document.getElementById("delete-form").style.display = "none";
}

//Konta paroles
function hidePasswordForm(){
    document.getElementById("password-form").style.display = "none"; 
}

function hidePassword() {
    location.reload(); 
}

