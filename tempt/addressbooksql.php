<html>
<meta charset='Shift-JIS'>
<head>

<title> Address Book </title>
</head>

<body>
<h1>Address Book</h1>
<?php

$hostname='localhost';
$username='root';
$password='kagaku';
//connect to e
try
{
//open the 

$db = new PDO("mysql:host=$hostname; dbname=addressbooksql",$username,$password);


//$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e) {echo 'Connection failed: ' . $e->getMessage();}

//Get data
$statement="SELECT * FROM fulladdresssql";

$result=$db->prepare($statement);
$result->execute();

//create the table
//$sqlcreate=("CREATE TABLE IF NOT EXISTS addressbook2 (Id INTEGER PRIMARY KEY, FirstName TEXT, FamilyName TEXT, Country TEXT)");

//$createTable=$db->exec($sqlcreate);

//insert some data
//$sqlfill=("INSERT INTO addressbook2 (FirstName, FamilyName, Country) VALUES ('Fenny','Sanyoto','Indonesia');");

//$fillTable=$db->exec($sqlfill);

//ouput the data to a simple html table
echo "<table class='table table-hover' border=1>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Country</th><th></th><th></th><th></th></tr>";

foreach($result as $row)
{
echo "<tr><td>".$row['Id']."</td>";
//echo"<tr><td>".$row->FirstName."</td>;
echo "<td>".$row['FirstName']."</td>";
echo "<td>".$row['FamilyName']."</td>";
echo "<td>".$row['Country']."</td>";
echo "<td><a href='http://komorido.nims.go.jp/~fenny/tempt/fulladdresseditsql.php?Id=".$row['Id']."'>View Detail</a></td>";
echo "<td><a href='http://komorido.nims.go.jp/~fenny/tempt/deletesql.php?Id=".$row['Id']."'>Delete</a></td>";
echo "<td><a href='http://komorido.nims.go.jp/~fenny/tempt/editsql.php?Id=".$row['Id']."'>Edit</a></td>";
//echo "<td><a href='http://komorido.nims.go.jp/~fenny/tempt/edit2.php?Id=".$row['Id'].",FirstName=".$row['FirstName']."'>Edit</a></td>";
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


<a href="http://komorido.nims.go.jp/~fenny/tempt/addsql.php">Add New Record</a>

</body>
</html>

