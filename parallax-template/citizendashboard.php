<!DOCTYPE html>
<html>
<title>Citizen Dashboard</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Home</a>

      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light btn" href="login.php">Log In</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<div class="w3-container">
<h2><img src="profileicon.png" height="42" width="42">Your Dashboard</h2>


  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'London');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Your Posts</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">View Posts</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Your Profile</div>
    </a>
  </div>

  <div id="London" class="w3-container city" style="display:none">
    <h2>These are the Posts You have Made</h2>
    <?php
    include 'connect.php';
     ?>
  </div>

  <div id="Paris" class="w3-container city" style="display:none">
    <h2>View Posts</h2>
    <div align="right"><a href="viewposts.php" align="right"> View Full Screen</a></div>

    <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>PostID</th><th>PostDate</th><th>UserID</th><th>PostContent</th><th>Tags</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
      parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
      echo "<tr>";
  }

  function endChildren() {
      echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sentimentdb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sentimentdb", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT PostId, PostDate, UserID, PostContent, Tags FROM posts");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
      echo $v;
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
  </div>

  <div id="Tokyo" class="w3-container city" style="display:none">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
  </div>
</div>
<div align="right">
  <button class="btn-floating btn-large waves-effect waves-light red" type="submit" name="action" onclick="document.getElementById('id01').style.display='block'" class="w3-btn">add
    <i class="material-icons right">add</i>
  </button>
</div>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">&times;</span>
        <p>
          <h2 align="center">
            Make A new Post
        </h2>
      </p>
        <form class="w3-container w3-light-grey">
  <label>TYPE HERE</label>
  <input class="w3-input w3-border-0" type="text">

  <label class="w3-tooltip">Categories(Type Each Category Separated by a Comma) <span class="w3-text w3-tag w3-animate-opacity">Categories help to classify your post, to make it easier to address.</span></label>
  <input class="w3-input w3-border-0 w3-tooltip" type="text" placeholder="e.g Category 1, Category 2, Category 3">
</form>
      </div>
    </div>
  </div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>
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
<?php

 ?>
