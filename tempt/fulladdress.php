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

//get Id
if(isset($_GET['Id']))
{
$Id=$_GET['Id'];


$select="SELECT * FROM fulladdress WHERE Id=$Id";
$result=$db->prepare($select);
$result->execute();
//ouput the data to a simple html table
print "<table border=1>";
print "<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Country</td><td>City</td><td>Street</td><td>Number</td></tr>";

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
}
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

</body>
</html>


