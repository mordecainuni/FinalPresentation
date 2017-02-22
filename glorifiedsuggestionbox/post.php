<?php
include 'connect.php';

// if(!conn)
// {
//   die('Could not connect: '.mysql_error());
// }
try {
    $conn = new PDO("mysql:host=$servername;dbname=sentimentdb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$sql = 'INSERT into posts'. '(PostContent, tags)'.'VALUES ("$PostContent", "$tags")';
mysql_select_db('$dbname');
$retval = mysql_query($sql);

// if(! $retval )
// {
//   die('Could not Enter Data: ' . mysql_error());
// }
echo "Entered Data Successfully\n";
mysql_close($conn);
 ?>
