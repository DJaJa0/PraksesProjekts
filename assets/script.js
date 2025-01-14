// Palīdz izvairīties no formu atkārtotas iesniegšanas (resubmission):
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

// Masīvs ar datiem (Pagaidām, lai pārbaudītu funkcionalitāti)
const dati = {
//....
};

// funkcija lai parādītu datus utt.
function paraditDatus(value){
    const satursD = document.getElementById("saturs");
    const inventāraDetaļas = document.getElementById("inventāraDetaļas");
    const labotF = document.getElementById("labotFormu");

    if (value == "none"){
        satursD.style.display = "none";
        labotF.style.display = "none";
    }
    return;
}