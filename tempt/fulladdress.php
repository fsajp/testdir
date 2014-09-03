<html>
<head>

<title> Full Address </title>
</head>

<body>

<?php

try
{
//open the database
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}


//create the table
//$sqlcreate=("CREATE TABLE IF NOT EXISTS addressbook2 (Id INTEGER PRIMARY KEY, FirstName TEXT, FamilyName TEXT, Country TEXT)");

//$createTable=$db->exec($sqlcreate);

//insert some data
//$sqlfill=("INSERT INTO addressbook2 (FirstName, FamilyName, Country) VALUES ('Fenny','Sanyoto','Indonesia');");

//$fillTable=$db->exec($sqlfill);

//ouput the data to a simple html table
print "<table border=1>";
print "<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Country</td><td>City</td><td>Street</td><td>Number</td></tr>";
$result=$db->query('SELECT * FROM fulladdress');
foreach($result as $row)
{
print "<tr><td>".$row['Id']."</td>";
print "<td>".$row['FirstName']."</td>";
print "<td>".$row['FamilyName']."</td>";
print "<td>".$row['Country']."</td>";
print "<td>".$row['City']."</td>";
print "<td>".$row['Street']."</td>";
print "<td>".$row['Number']."</td></tr>";
}
print "</table>";

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

<button type="button">Update Address</button>

</body>
</html>


