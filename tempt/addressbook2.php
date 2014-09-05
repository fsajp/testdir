<html>
<head>

<title> Address Book </title>
</head>

<body>

<?php

//open the database
try
{
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}

if(isset($_GET['Id']))
{
$Id=$_GET['Id'];

echo "<table border=1>";
echo "<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Country</td><td></td><td></td><td></td></td>";
//Get data
$select="SELECT * FROM fulladdress WHERE Id=$Id";

$stmt=$db->prepare($select);
//$stmt->bind_param(':Id',$Id, PDO::PARAM_INIT);
$stmt->execute();
//$stmt->close();

//$stmt->bindColumn(':Id', $Id, PDO:: PARAM_INIT);
//$stmt->fetch();

//if($stmt)

//header('http://komorido.nims.go.jp/~fenny/tempt/addressbook.php');

//create the table
//$sqlcreate=("CREATE TABLE IF NOT EXISTS addressbook2 (Id INTEGER PRIMARY KEY, FirstName TEXT, FamilyName TEXT, Country TEXT)");

//$createTable=$db->exec($sqlcreate);

//insert some data
//$sqlfill=("INSERT INTO addressbook2 (FirstName, FamilyName, Country) VALUES ('Fenny','Sanyoto','Indonesia');");

//$fillTable=$db->exec($sqlfill);

//ouput the data to a simple html table

//while($query2=$sqlite_fetch_array($query1))
//{
foreach($stmt as $row)
echo "<tr><td>".$row['Id']."</td>";
echo "<td>".$row['FirstName']."</td>";
echo "<td>".$row['FamilyName']."</td>";
echo "<td>".$row['Country']."</td></tr>";
echo "</table>";
//echo "<td><a href='fulladdress.php?id=".$query2['id']."'>View Detail</a></td>";
//echo "<td><a href='records.php?id=".$query2['id']."'>Edit</a></td>";
//echo "<td><a href='delete.php?id=".$query2['id']."'>Delete</a></td>";


//close the database connection
}
$db=NULL;

}

catch(PDOException $e)
{
print 'Exception : '.$e->getMessage();
}
?>

<p></p>
<p></p>



</body>
</html>


