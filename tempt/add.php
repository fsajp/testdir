<html>
<body>
<h1>Add New Records</h1>

<fieldset style="width:300px;">
<form method="POST" action="">
First Name &nbsp &nbsp: <input type="text" name="FirstName"><br>
Family Name : <input type="text" name="FamilyName"><br>
Country&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="Country" ><br>
City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="City" ><br>
Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="Street" ><br>
Number&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="Number" ><br>
<br>
<input type="submit" name="submit" value="Add New Record">
</form>
</fieldset>

<?php

if(isset($_POST['submit']))

try
{
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');



{
$FirstName=$_POST['FirstName'];
$FamilyName=$_POST['FamilyName'];
$Country=$_POST['Country'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$Number=$_POST['Number'];
}

$query1=$db->prepare("INSERT INTO fulladdress (FirstName, FamilyName, Country, City, Street, Number) VALUES(:FirstName,:FamilyName,:Country,:City,:Street,:Number)");
$query1->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query1->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 20);
$query1->bindParam(':Country', $Street, PDO::PARAM_STR, 20);
$query1->bindParam(':City', $City, PDO::PARAM_STR, 20);
$query1->bindParam(':Street', $Street, PDO::PARAM_STR, 20);
$query1->bindParam(':Number', $Number, PDO::PARAM_INT);
$query1->execute();

echo '<p><p>';

echo "Data is added";

echo '<p><p>';

header("Location:addressbook.php");


$db=NULL;
}

catch(PODException $e)
{
print 'Exception : '.$e->getMessage();
}


?>

</body>
</html>




