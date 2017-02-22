<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Sign Up</title>

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
  </div>
<?php
include 'connect.php';

if($_SERVER ['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo
     '
     <form class="col s12" action="login.php">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name="FirstName">
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

      <button class="btn waves-effect waves-light" type="submit" name="action">Sign Up
  <i class="material-icons right">send</i>
</button>
      </div>
    </form>';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data
    */
    $errors = array(); /* declare the array for later use */

    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if
        (!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if
        (strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
    if
    (isset($_POST['user_name']))
    {
        //the user name exists
        if
        (!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if
        (strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }


    if
    (isset($_POST['Password']))
    {
        if
        ($_POST['Password'] != $_POST['PasswordCheck'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }

    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $sql = "INSERT INTO
                    citizenuserinformation(Username, FirstName, LastName , Email , PhoneNumber , Password)
                VALUES('" . mysql_real_escape_string($_POST['Username']) . "', '" . mysql_real_escape_string($_POST['FirstName']) . "','" . mysql_real_escape_string($_POST['LastName']) . "','" . mysql_real_escape_string($_POST['Email']) . "', '" . mysql_real_escape_string($_POST['PhoneNumber']) . "',
                       '" . sha1($_POST['Password']) . "', NOW(), 0)";

        $result = mysql_query($sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="login.php">sign in</a> and start posting! :-)';
        }
    }
}
 ?>
</div>
<footer class="page-footer teal">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Company Bio</h5>
        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


      </div>
      <div class="col l3 s12">
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
      </div>
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
</body>
</html>
