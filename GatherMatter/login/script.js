// Function to be executed after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
  // Login form submit event
  document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form data
    var username = document.getElementsByName('username')[0].value;
    var password = document.getElementsByName('password')[0].value;

    // Send login request to server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Redirect to the logged-in page
                window.location.href = 'dashboard.html';
            } else {
                // Display error message
                alert(response.message);
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
  });

  // Registration form submit event
  document.getElementById('registerForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form data
    var username = document.getElementsByName('username')[0].value;
    var password = document.getElementsByName('password')[0].value;
    var email = document.getElementsByName('email')[0].value;

    // Send registration request to server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Redirect to the login page
                window.location.href = 'index.html';
            } else {
                // Display error message
                alert(response.message);
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password) + '&email=' + encodeURIComponent(email));
  });
});
