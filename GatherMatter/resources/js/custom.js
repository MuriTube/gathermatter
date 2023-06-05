window.addEventListener('load', function() {
    var preloader = document.getElementById('preloader');
    setTimeout(function(){
        preloader.style.display = 'none';
    }, 1000); // set delay to 1000 milliseconds (1 second)
});

window.addEventListener('DOMContentLoaded', function() {
    var preloader = document.querySelector('.preloader');
  
    // Funktion zum Ausblenden des Preloaders
    function hidePreloader() {
      preloader.classList.add('hidden');
      setTimeout(function() {
        preloader.style.display = 'none';
      }, 500); // Warte 500ms, bevor du den Preloader vollständig ausblenden
    }
  
    // Zeige den Preloader für 0.4 Sekunden an
    setTimeout(hidePreloader, 400); // Hier kannst du die gewünschte Zeit in Millisekunden angeben (z.B. 3000 für 3 Sekunden)
  });
  
  function previewImage(event) {
    var reader = new FileReader();
    var imageField = document.getElementById("preview");
    
    reader.onload = function() {
        if (reader.readyState == 2) {
            imageField.src = reader.result;
            imageField.style.display = "block";
        }
    }
    reader.readAsDataURL(event.target.files[0])};