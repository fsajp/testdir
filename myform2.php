<?php
try
{
//open database
$db = new PDO('sqlite:/home/fenny/public_html/test2.db');
//$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);}
//catch(PDOException $e)
//{echo 'ERROR:'.$e->getMessage();}

/*
//create database
$db=exec("CREATE TABLE Duck (Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");

//insert some data
$db=exec("INSERT INTO Duck (Breed, Name, Age) VALUES ('Donald Duck', 'Disney', 2);"

*/

//output the data of test2.db

print "<table border=1>";
print "<tr><td>Id</td><td>Breed</td><td>Name</td><td>Age</td></tr>";
$result=$db->query('SELECT * FROM Cat');
foreach($result as $row)
{
print "<tr><td>".$row['Id']."</td>";
print "<td>".$row['Breed']."</td>";
print "<td>".$row['Name']."</td>";
print "<td>".$row['Age']."</td></tr>";
}
print "</table>";

//close database connection
$db=NULL;
}


catch(PDOException $e)
{print 'Exception:' .$e->getMessage();}

?>
