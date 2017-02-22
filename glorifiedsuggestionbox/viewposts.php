<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>View Posts</title>

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
      <a id="logo-container" href="#" class="brand-logo">View Posts</a>
      <ul class="right hide-on-med-and-down">

        <li><a href="login.php">Log In</a></li>
        <li><a href="signout.php">Log Out</a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div align='center'>
    <h4>You are Viewing Posts made by Other Users</h4>
    <h6>You can Comment and Upvote on these Posts</h6>
  </div>
  <hr>
  <div class="input-field col s6" align="center">
    <input id="last_name" type="text" class="validate" name="search" autofocus="on">
    <label for="last_name">Search By Category/Topic</label>
  </div>
  <div>
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
          <form class="w3-container w3-light-grey" action="post.php">
    <label>TYPE HERE</label>
    <input class="w3-input w3-border-0" type="text" name="content">

    <label class="w3-tooltip">Categories(Type Each Category Separated by a Comma) <span class="w3-text w3-tag w3-animate-opacity">Categories help to classify your post, to make it easier to address.</span></label>
    <input class="w3-input w3-border-0 w3-tooltip" type="text" placeholder="e.g Category 1, Category 2, Category 3" name="tags">
    <button class="btn waves-effect waves-light" type="submit" name="action">Post
<i class="material-icons right">send</i>
</button>
  </form>
        </div>
      </div>
    </div>
  <hr>
</body>
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
