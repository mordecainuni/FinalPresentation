<?php
include 'connect.php';
$query = mysql_query("SELECT * FROM citizenuserinformation WHERE Username = '$Username'");
if (mysql_num_rows($query) > 0){

	$row = mysql_fetch_assoc($query);

	if (password_verify($password, $row["Password"])){ //if it verifies correctly, then session begin

		$_SESSION["id"] = $row[id];
		$_SESSION["username"] = $row[username];

	}
	else{
		$message = "Invalid Username or Password!";
	}
}

if(isset($_SESSION["id"])) {
header("Location:citizendashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Log In</title>

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
      <a id="logo-container" href="index.html" class="brand-logo">Home</a>
      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light btn" href="#">Log In</a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="index.php">Home</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="row">

    <?php
    //signin.php
    include 'connect.php';
    echo '<h3 align="center">Log In</h3>';

  //first, check if the user is already signed in. If that is the case, there is no need to display this page
  if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
  {
      echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
  }
  else
  {
      if($_SERVER['REQUEST_METHOD'] != 'POST')
      {
          /*the form hasn't been posted yet, display it
            note that the action="" will cause the form to post to the same page it is on */
          echo '<form class="col s12" method="POST" name="login" action="governmentdashboard.php">
            <div class="row">
              <div class="input-field col s6">
                <input id="Username" type="text" class="validate" autocomplete="off" autofocus="on" name="Username">
                <label for="Username">Your User Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input id="password" type="password" class="validate" autocomplete="off" name="Password">
                <label for="password">Your Password</label>
              </div>
            </div>
          <hr>
            <div align="center">
            <button class="btn waves-effect waves-light" type="submit" name="action">Log In
  <i class="material-icons right">send</i>
</button>

            <hr>
                Did You Forget Your Password? Click
                <a href="resetpassword.php">
                  Here
                </a>
                 to get a new one
               </p>
             </div>
          </form>';
      }
      else
      {
          /* so, the form has been posted, we'll process the data in three steps:
              1.  Check the data
              2.  Let the user refill the wrong fields (if necessary)
              3.  Varify if the data is correct and return the correct response
          */
          $errors = array(); /* declare the array for later use */

          if(!isset($_POST['UserName']))
          {
              $errors[] = 'The username field must not be empty.';
          }

          if(!isset($_POST['Password']))
          {
              $errors[] = 'The password field must not be empty.';
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
              //the form has been posted without errors, so save it
              //notice the use of mysql_real_escape_string, keep everything safe!
              //also notice the sha1 function which hashes the password
              $sql = "SELECT
                          UserName,
                          Password
                      FROM
                          citizenuserinformation
                      WHERE
                          UserName = '" . mysql_real_escape_string($_POST['UserName']) . "'
                      AND
                          Password = '" . sha1($_POST['Password']) . "'";

              $result = mysql_query($sql);
              if(!$result)
              {
                  //something went wrong, display the error
                  echo 'Something went wrong while signing in. Please try again later.';
                  //echo mysql_error(); //debugging purposes, uncomment when needed
              }
              else
              {
                  //the query was successfully executed, there are 2 possibilities
                  //1. the query returned data, the user can be signed in
                  //2. the query returned an empty result set, the credentials were wrong
                  if(mysql_num_rows($result) == 0)
                  {
                      echo 'You have supplied a wrong user/password combination. Please try again.';
                  }
                  else
                  {
                      //set the $_SESSION['signed_in'] variable to TRUE
                      $_SESSION['signed_in'] = true;

                      //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                      while($row = mysql_fetch_assoc($result))
                      {
                          $_SESSION['user_id']    = $row['user_id'];
                          $_SESSION['user_name']  = $row['user_name'];
                          $_SESSION['user_level'] = $row['user_level'];
                      }

                      echo 'Welcome, ' . $_SESSION['UserName'] . '. <a href="citizendashboard.php">Proceed to Your Dashboard</a>.';
                  }
              }
          }
      }
  }
  ?>
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
