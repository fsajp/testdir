<html>
<head>

<title> Address Book </title>
</head>

<body>

<?php

try
{
//open the database
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}

//Get data
$result=$db->query('SELECT * FROM fulladdress');

//create the table
//$sqlcreate=("CREATE TABLE IF NOT EXISTS addressbook2 (Id INTEGER PRIMARY KEY, FirstName TEXT, FamilyName TEXT, Country TEXT)");

//$createTable=$db->exec($sqlcreate);

//insert some data
//$sqlfill=("INSERT INTO addressbook2 (FirstName, FamilyName, Country) VALUES ('Fenny','Sanyoto','Indonesia');");

//$fillTable=$db->exec($sqlfill);

//ouput the data to a simple html table
echo "<table border=1>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Country</th><th></th><th></th><th></th></tr>";

while($query2=mysql_fetch_array($result))
{
echo "<tr><td>".$query2['Id']."</td>";
echo "<td>".$query2['FirstName']."</td>";
echo "<td>".$query2['FamilyName']."</td>";
echo "<td>".$query2['Country']."</td>";
echo "<td><a href='fulladdress.php?id=".$query2['id']."'>View Detail</a></td>";
echo "<td><a href='records.php?id=".$query2['id']."'>Edit</a></td>";
echo "<td><a href='delete.php?id=".$query2['id']."'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";


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


<a href="records.php">Add New Record</a>

</body>
</html>


