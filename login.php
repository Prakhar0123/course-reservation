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
  </head>
  <body>
    <div class="crs"><h1>Course Reservation System</h1></div>
   
    <div class="login_form_container">
      <div class="login_form">
        <h2>Welcome to 1,2,3 Learn!<br>Fill in your details to resume learning</h2>
        <form action="in.php" method="POST">
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input
            type="email"
            placeholder="Email"
            class="input_text"
            autocomplete="off"
            name="mail"
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
          />
        </div>
        <div class="button_group" id="login_button">
        <button type="submit">Login</button>
        </div>
        </form>
        <div class="footer">
          <a href="forgot.php" style="color:white;">Forgot Password ?</a>
          <a href="sign.php" style="color: white;">Sign Up</a>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">
      $(".input_text").focus(function(){
    $(this).prev('.fa').addclass('glowIcon')
})
$(".input_text").focusout(function(){
    $(this).prev('.fa').removeclass('glowIcon')
})
    </script>
    <script src="login.js"></script>
  </body>
</html>