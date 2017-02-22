<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sentimentdb';
$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn)
{
  die('Could not connect: ' .mysql_error());
}
$sql = 'INSERT into posts'. '(PostContent, tags)'.'VALUES ("$PostContent", "$tags")';
mysql_select_db('$dbname');
$retval = mysql_query($sql);
// if(! $retval)
// {
//   die('Could not enter data: '.mysql_error());
// }
echo "Entered Data Successfully\n";
?>
