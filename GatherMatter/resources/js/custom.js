window.addEventListener('load', function() {
    var preloader = document.getElementById('preloader');
    if (preloader) {
        setTimeout(function(){
            preloader.style.display = 'none';
        }, 1000); // set delay to 1000 milliseconds (1 second)
    }

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


    //Suchfunktion in Navbar , sucht nacht alle event title und description in der datenbank.
    $(document).ready(function() {
      var currentRequest = null; // Variable für aktuelle Anfrage
      var debounceTimeout = null; // Variable für debounce timeout

      $('#search-input').on('input keyup', function() {
          var query = $(this).val().trim();

          // Alle vorherigen Anfragen abbrechen
          if (currentRequest) {
              currentRequest.abort();
              currentRequest = null;
          }

          // Bestehendes debounce Timeout löschen
          if (debounceTimeout) {
              clearTimeout(debounceTimeout);
          }

          debounceTimeout = setTimeout(function() {
              if (query !== '') {
                  currentRequest = $.ajax({
                      url: "/search",
                      type: "GET",
                      data: { 'query': query },
                      success: function(data) {
                          $('#search-results').html('');

                          if (data.length === 0) {
                              $('#search-results').hide();
                              return;
                          }

                          $.each(data, function(key, value) {
                              var card = `
                                  <div class="card mt-2">
                                      <div class="card-body d-flex">
                                          <div>
                                              <h5 class="card-title">${value.title}</h5>
                                              <p class="card-text">${value.description.substring(0, 100)}...</p>
                                              <a href="/events/${value.id}" class="btn btn-primary">View Event</a>
                                          </div>
                                      </div>
                                  </div>`;

                              $('#search-results').append(card);
                          });

                          $('#search-results').show();
                      },
                      complete: function() {
                          currentRequest = null; // Setze die aktuelle Anfrage zurück, wenn sie abgeschlossen ist
                      }
                  });
              } else {
                  $('#search-results').html('');
                  $('#search-results').hide();
              }
          }, 500); // Debounce-Zeit auf 500 Millisekunden einstellen
      });

      // Verhindern Sie das Drücken der Eingabetaste
      $('#search-input').on('keypress', function(e) {
          if (e.which == 13) {
              e.preventDefault();
          }
      });
  });

 // Funktion zum Umschalten der Passwort-Sichtbarkeit
$('.toggle-password').on('click', function() {
    $(this).toggleClass('fa-eye fa-eye-slash');
    let input = $($(this).attr('toggle'));
    if (input.attr('type') == 'password') {
        input.attr('type', 'text');
    } else {
        input.attr('type', 'password');
    }
});

// Funktion zur Überprüfung der Passwortstärke

var element = document.getElementById('password');
if (element) {
    element.addEventListener('click', function() {
        // Your code here
    });
}

var passwordElement = document.getElementById('password');
var passwordStrengthElement = document.getElementById('passwordStrength');

if (passwordElement && passwordStrengthElement) {
    passwordElement.addEventListener('input', function (e) {
        const password = e.target.value;
        let strength = 0;
        if (password.length >= 8) {
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/)) strength += 25;
            if (password.match(/[.@$!%*#?&]/)) strength += 25;
        }

        if (password.length === 0) {
            passwordStrengthElement.style.width = '0';
        } else {
            passwordStrengthElement.style.width = Math.max(strength, 10) + '%';
        }

        // Setzt die Farbe basierend auf der Stärke
        if (strength < 75) {
            passwordStrengthElement.style.backgroundColor = '#f00';
        } else if (strength < 100 || !password.match(/[.@$!%*#?&]/)) {
            passwordStrengthElement.style.backgroundColor = '#ff0';
            passwordStrengthElement.style.width = '75%';
        } else {
            passwordStrengthElement.style.backgroundColor = '#0f0';
        }
    });
}

