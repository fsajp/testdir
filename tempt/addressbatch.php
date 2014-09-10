<?php

$hostname='localhost';
$username='root';
$password='kagaku';


//connect to database
try
{
//open the database
$db = new PDO("mysql:host=$hostname; dbname=addressbooksql",$username,$password);
$db2 = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');

#echo 'Connected to Database<br/>';
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}

//Get data
$select="SELECT * FROM fulladdress";
$result=$db2->prepare($select);
$result->execute();
foreach($result as $row)
{

$FirstName=$row['FirstName'];
$FamilyName=$row['FamilyName'];
$Country=$row['Country'];
$City=$row['City'];
$Street=$row['Street'];
$Number=$row['Number'];


$query2=$db->prepare("INSERT INTO fulladdresssql (FirstName, FamilyName, Country,City,Street, Number) VALUES (:FirstName, :FamilyName, :Country, :City, :Street, :Number)");
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 20);
$query2->bindParam(':Country', $Country, PDO::PARAM_STR, 20);
$query2->bindParam(':City', $City, PDO::PARAM_STR, 20);
$query2->bindParam(':Street', $Street, PDO::PARAM_STR, 20);
$query2->bindParam(':Number', $Number, PDO::PARAM_INT);
$query2->execute();
}
//create the table
	//$sqlcreate=("CREATE TABLE IF NOT EXISTS addressbook2 (Id INTEGER PRIMARY KEY, FirstName TEXT, FamilyName TEXT, Country TEXT)");

//$createTable=$db->exec($sqlcreate);

//insert some data
//$sqlfill=("INSERT INTO fulladdresssql (Id, FirstName, FamilyName, Country, City, Street, Number) VALUES (1,'Brian','Pauw','Japan', 'Hyogo', 'Kamigori', 103);");

//$fillTable=$db->exec($sqlfill);

//ouput the data to a simple html table

$db=NULL;
}

catch(PDOException $e)
{
print 'Exception : '.$e->getMessage();
}

?>
