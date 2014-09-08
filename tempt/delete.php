<?php

try
{
//open the database
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}

//get Id
if(isset($_GET['Id']))
{
$Id=$_GET['Id'];


$select="DELETE FROM fulladdress WHERE Id=$Id";
$result=$db->prepare($select);
$result->execute();

echo "Data is deleted";

echo '<p><p>';

header("Location:addressbook.php");

}

//include ('addressbook.php');

//close the database connection
$db=NULL;
}

catch(PDOException $e)
{
print 'Exception : '.$e->getMessage();
}

?>

<p></p>
<p></p>

