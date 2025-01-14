// Palīdz izvairīties no formu atkārtotas iesniegšanas (resubmission):
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}