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

    <div class="form">
      <div class="login_form">
        <h2>Password Reset Form</h2>
        <form id="resetForm" onsubmit="return false;">
          <div class="input_group">
            <i class="fa fa-user"></i>
            <input
              type="text"
              placeholder="Email"
              class="input_text"
              autocomplete="off"
              name="mail"
              id="email"
              required
            />
          </div>
          <div class="input_group">
            <i class="fa fa-phone"></i>
            <input
              type="number"
              placeholder="Phone"
              class="input_text"
              autocomplete="off"
              name="no"
              id="phone"
              required
            />
          </div>
          <div class="button_group" id="login_button">
            <button type="submit" onclick="verifyUser()">Verify</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Popup form for new password -->
    <div class="popup_container" id="popup">
      <div class="popup_form">
        <h2>Set New Password</h2>
        <input type="password" placeholder="New Password" id="newPassword" required />
        <button onclick="setPassword()">Set Password</button>
      </div>
    </div>

    <script>
      function verifyUser() {
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;

        if (email && phone) {
          // Send AJAX request to reset.php for verification
          const formData = new FormData();
          formData.append('mail', email);
          formData.append('no', phone);

          fetch('reset.php', {
            method: 'POST',
            body: formData,
          })
            .then(response => response.text())
            .then(result => {
              if (result.trim() === 'valid') {
                document.getElementById('popup').style.display = 'flex';
              } else {
                alert('Invalid credentials. Please fill in your details correctly.');
              }
            })
            .catch(error => {
              alert('Error verifying user');
            });
        } else {
          alert('Please fill in all fields.');
        }
      }

      function setPassword() {
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const newPassword = document.getElementById('newPassword').value;

        if (newPassword) {
          // Send AJAX request to reset.php to set the new password
          const formData = new FormData();
          formData.append('mail', email);
          formData.append('no', phone);
          formData.append('new_password', newPassword);

          fetch('reset.php', {
            method: 'POST',
            body: formData,
          })
            .then(response => response.text())
            .then(result => {
              if (result.trim() === 'password_updated') {
                window.location.href = 'login.php';
              } else {
                alert('Error updating password. Please try again.');
              }
            })
            .catch(error => {
              alert('Error setting password');
            });
        } else {
          alert('Please enter a new password.');
        }
      }
    </script>
  </body>
</html>
