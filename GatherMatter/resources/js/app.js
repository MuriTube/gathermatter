import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    var cookieBanner = document.getElementById('cookie-banner');
    var acceptButton = cookieBanner.querySelector('.accept-button');
    
    if (localStorage.getItem('cookie_consent')) {
      cookieBanner.style.display = 'none';
    }
    
    acceptButton.addEventListener('click', function() {
      localStorage.setItem('cookie_consent', 'true');
      cookieBanner.style.display = 'none';
    });
  });
  