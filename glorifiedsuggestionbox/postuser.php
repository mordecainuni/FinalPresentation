<?php
include 'connect.php';

// if(!conn)
// {
//   die('Could not connect: '.mysql_error());
// }
// $connection = mysql_connect("localhost","root","");
// if(!$connection) {
//    die("Database connection failed: " . mysql_error());
// }else{
//    $db_select = mysql_select_db("sentimentdb",$connection);
//    if (!$db_select) {
//        die("Database selection failed:: " . mysql_error());
//    }
// }
try {
    $conn = new PDO("mysql:host=localhost;dbname=sentimentdb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$sql = 'INSERT into citizenuserinformation'. '(FirstName, LastName, UserName, Email, PhoneNumber, Password)'.'VALUES ("$FirstName", "$LastName", "$UserName", "$Email", "$PhoneNumber", "$Password")';
mysql_select_db("sentimentdb");
$retval = mysql_query($sql);

// if(! $retval )
// {
//   die('Could not Enter Data: ' . mysql_error());
// }
echo "Entered Data Successfully\n";
mysql_close($conn);
 ?>
