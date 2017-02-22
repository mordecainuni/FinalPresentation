
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>New User</title>

  <!-- CSS  -->
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
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

    <form class="col s12" action="postuser.php" method=POST>
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name="FirstName" autofocus="on">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="LastName">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="Email">
          <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="Phone_Number" type="number" class="validate" name="PhoneNumber">
          <label for="Phone Number" data-error="wrong" data-success="right">Phone Number</label>
        </div>
      <div>
        <div class="input-field col s6">
          <input id="User_Name" type="text" class="validate" name="UserName">
          <label for="User Name">User Name</label>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="password" type="password" class="validate" name="Password">
            <label for="password">New Password</label>
          </div>
          <div class="input-field col s6">
            <input id="password" type="password" class="validate" name="PasswordCheck">
            <label for="password">Retype New Password</label>
          </div>
        </div>
      </div>
    <hr>
      <div align="center">

        <button class="btn waves-effect waves-light" type="submit" name="action">Sign Up!
<i class="material-icons right">send</i>
</button>
      </div>
    </form>
  </div>
  <<footer class="page-footer teal">
    <div class="container">
      <div class="row" align="center">
        <div class="col l6 s12">
          <h5 class="white-text">Developer Bio</h5>
          <p class="grey-text text-lighten-4">076431. BBIT 4 Exempt, 2017</p>


        </div>
        <!-- <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div> -->
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
