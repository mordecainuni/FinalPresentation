<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Home</a>

      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light btn" href="login.html">Log In</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="row">
    <form class="col s12" action="">
      <div class="row">
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate">
          <label for="password">New Password</label>
        </div>
        <div class="input-field col s6">
          <input id="password" type="password" class="validate">
          <label for="password">Retype New Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="Phone_Number" type="number" class="validate">
          <label for="Phone Number" data-error="wrong" data-success="right">Phone Number</label>
        </div>
      <div>
        <div class="input-field col s6">
          <input id="User_Name" type="text" class="validate">
          <label for="User Name">User Name</label>
        </div>
      </div>
    <hr>
      <div align="center">

        <a class="waves-effect waves-light btn">Sign Up</a>
      </div>
    </form>
  </div>
  <div align="center "class="footer-copyright">
    <div class="container">
    Made by
    <a class="brown-text text-lighten-3" href="http://materializecss.com">
      Materialize
    </a>
    </div>
  </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
