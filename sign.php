<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>1,2,3 Learn!</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="login.css" />
    <style>
      /* Popup styles */
      .popup_container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
      }

      .popup_form {
        background-color: #990f02;
        padding: 30px;
        border-radius: 10px;
        color: white;
        text-align: center;
      }

      .popup_form input {
        padding: 10px;
        margin-top: 15px;
        width: 80%;
        font-size: 18px;
      }

      .popup_form button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="crs">
      <h1>Course Reservation System</h1>
    </div>

    <div class="login_form_container">
      <div class="login_form">
        <h2>Welcome to 1,2,3 Learn!<br>Join us to start learning today</h2>
        <form id="registerForm" onsubmit="return false;">
          <div class="input_group">
            <i class="fa fa-user"></i>
            <input
              type="email"
              placeholder="Email"
              class="input_text"
              autocomplete="off"
              name="mail"
              id="email"
              required
            />
          </div>
          <div class="input_group">
            <i class="fa fa-unlock-alt"></i>
            <input
              type="password"
              placeholder="Password"
              class="input_text"
              autocomplete="off"
              name="pw"
              id="password"
              required
            />
          </div>
          <div class="button_group" id="login_button">
            <button type="submit" onclick="openPopup()">Register</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Popup form -->
    <div class="popup_container" id="popup">
      <div class="popup_form">
        <h2>One last milestone before letting you in</h2>
        <p>Please enter your phone number:</p>
        <input type="number" placeholder="Phone Number" id="phone" required />
        <button onclick="submitForm()">Proceed</button>
      </div>
    </div>

    <script>
      function openPopup() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Email validation regex for Gmail addresses
        const gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        if (email && password) {
          if (gmailPattern.test(email)) {
            document.getElementById('popup').style.display = 'flex';
          } else {
            alert('Please provide a valid Gmail address.');
          }
        } else {
          alert('Please fill in all fields before registering.');
        }
      }

      function submitForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const phone = document.getElementById('phone').value;

        if (phone) {
          const formData = new FormData();
          formData.append('mail', email);
          formData.append('pw', password);
          formData.append('no', phone);
          fetch('up.php', {
            method: 'POST',
            body: formData,
          })
            .then((response) => response.text())
            .then((result) => {
              alert('Registration successful!');
              window.location.href = 'login.php';
            })
            .catch((error) => {
              alert('Error registering user');
            });
        } else {
          alert('Please enter a phone number.');
        }
      }
    </script>
  </body>
</html>
