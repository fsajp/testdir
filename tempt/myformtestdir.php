<html>
<head>

<title> test Greeting Form - updated by Fenny</title>
</head>

<body>

<?php

if ($_POST['formSubmit']=="Submit"){
$varName = $_POST['formName'];
}
?>


<form action="myform.php" method="post">
 Enter your name (Japanese or English):
 <input type="text" name="formName" maxlength="15" value="<?php print($varName);?>">
<input type="submit" name="formSubmit" value="Submit">
</form>

<?php
 if($_POST['formSubmit']=="Submit")
 {
 $errorMessage = "";


if(empty($_POST['formName']))
 {$errorMessage .= "<li>You forgot to enter your name!</li>";}

$varName = $_POST['formName'];

 if(!empty($errorMessage))
 {echo("<p>There was an error with your form:</p>\n");
 echo("<ul>" . $errorMessage . "</ul>\n");}
 }

?>



<?php

try
{
//open the database
$db = new PDO('sqlite:/home/fenny/public_html/tempt/test2.db');



//create the database

$sql=("CREATE TABLE Dog (Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");

$createTable=$db->exec($sql);
echo $createTable;
if($createTable){echo"Created!<br/><br/>";}
else{echo"NOT Created!<br/><br/>";}


//insert some data
$sql2=("INSERT INTO Dog (Breed, Name, Age) VALUES ('Labrador', 'Tank', 2);".
"INSERT INTO Dog (Breed, Name, Age) VALUES ('Husky', 'Glacier', 7);".
"INSERT INTO Dog (Breed, Name, Age) VALUES ('Golden-Doole', 'Ellie', 4);");


$fillTable=$db->exec($sql2);

if($fillTable){echo"Filled!<br/><br/>";}
else{echo"NOT Filled!<br/><br/>";}


//now ouput the data to a simple html table
print "<table border=1>";
print "<tr><td>Id</td><td>Breed</td><td>Name</td><td>Age</td></tr>";
$result=$db->query('SELECT * FROM Dog');
foreach($result as $row)
{
print "<tr><td>".$row['Id']."</td>";
print "<td>".$row['Breed']."</td>";
print "<td>".$row['Name']."</td>";
print "<td>".$row['Age']."</td></tr>";
}
print"</table>";


//close the database connection
$db=NULL;
}

catch(PDOException $e)
{
print 'Exception : '.$e->getMessage();
}

?>


</body>

</html>


