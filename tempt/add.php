<html>
<meta charset='shift-JIS'>
<body>
<h1>Add New Records</h1>

<?php
try
{
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');

//if(isset($_POST['submit']))

echo "<fieldset style='width:300px;'>";
echo "<form method='POST' action=''>";
echo "First Name &nbsp &nbsp: <input type='text' name='FirstName' value=".$_POST['FirstName']."><br>";
echo "Family Name : <input type='text' name='FamilyName' value=".$_POST['FamilyName']."><br>";
echo "Country&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Country' value=".$_POST['Country']." ><br>";
echo "City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='City' value=".$_POST['City']." ><br>";
echo "Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Street' value=".$_POST['Street']." ><br>";
echo "Number&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Number' value=".$_POST['Number']." ><br>";
echo "<br>";
echo "<input type='submit' name='submit' value='Add New Record'>";
echo "</form>";
echo "</fieldset>";


{
$FirstName=$_POST['FirstName'];
$FamilyName=$_POST['FamilyName'];
$Country=$_POST['Country'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$Number=$_POST['Number'];
}

if(isset($_POST['submit']))
$query1=$db->prepare("INSERT INTO fulladdress (FirstName, FamilyName, Country, City, Street, Number) VALUES(:FirstName,:FamilyName,:Country,:City,:Street,:Number)");
$query1->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query1->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 20);
$query1->bindParam(':Country', $Country, PDO::PARAM_STR, 20);
$query1->bindParam(':City', $City, PDO::PARAM_STR, 20);
$query1->bindParam(':Street', $Street, PDO::PARAM_STR, 20);
$query1->bindParam(':Number', $Number, PDO::PARAM_INT);
{
//check if FirstName or Family Name are empty
if($FirstName == '' || $FamilyName == '')
{
$error = 'PLEASE FILL IN ALL REQUIRED FIELDS';
echo '<p><p>';
echo "$error!";
}
else
{
$query1->execute();

echo '<p><p>';

echo "Data is added";

echo '<p><p>';

header("Location:addressbook.php");
}
}
$db=NULL;
}

catch(PODException $e)
{
print 'Exception : '.$e->getMessage();
}



?>

</body>
</html>




