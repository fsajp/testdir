<?php


$hostname='localhost';
$username='root';
$password='kagaku';





try
{
//open the database
//$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');

$db = new PDO("mysql:host=$hostname; dbname=addressbooksql",$username,$password);
//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}

//get Id
if(isset($_GET['Id']))
{
$Id=$_GET['Id'];


$select=
"
DELETE FROM additionalinfosql WHERE Id=$Id
";
$result=$db->prepare($select);
$result->execute();

$select2=
"
DELETE FROM fulladdresssql WHERE Id=$Id
";
$result2=$db->prepare($select2);
$result2->execute();





echo "Data is deleted";

echo '<p><p>';

header("Location:addressbooksql.php");

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

