<html>
<meta charset='shift-JIS'>
<body>
<h1>Add New Records</h1>

<?php


$hostname='localhost';
$username='root';
$password='kagaku';


try
{
//$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');

$db = new PDO("mysql:host=$hostname; dbname=addressbooksql",$username,$password);


//if(isset($_POST['submit']))

echo "<fieldset style='width:300px;'>";
echo "<form method='POST' action=''>";
echo "First Name &nbsp &nbsp: <input type='text' name='FirstName' value=".$_POST['FirstName']."><br>";
echo "Family Name : <input type='text' name='FamilyName' value=".$_POST['FamilyName']."><br>";
echo "Country&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Country' value=".$_POST['Country']." ><br>";
echo "City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='City' value=".$_POST['City']." ><br>";
echo "Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Street' value=".$_POST['Street']." ><br>";
echo "Number&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Number' value=".$_POST['Number']." ><br>";
//echo "Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='varchar' name='Email' value=".$_POST['Email']." ><br>";
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
//$Email=$_POST['Email'];
}

if(isset($_POST['submit']))
$query1=$db->prepare("INSERT INTO fulladdresssql (FirstName, FamilyName, Country, City, Street, Number) VALUES(:FirstName,:FamilyName,:Country,:City,:Street,:Number)");
//$query2=$db->prepare("INSERT INTO additionalinfosql (FirstName, FamilyName, Email) VALUES (:FirstName, :FamilyName, :Email)");
$query1->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query1->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 20);
$query1->bindParam(':Country', $Country, PDO::PARAM_STR, 20);
$query1->bindParam(':City', $City, PDO::PARAM_STR, 20);
$query1->bindParam(':Street', $Street, PDO::PARAM_STR, 20);
$query1->bindParam(':Number', $Number, PDO::PARAM_INT);
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 20);
$query2->bindParam(':Email', $Email, PDO:: PARAM_STR,20);

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
//$query2->execute();
echo '<p><p>';

echo "Data is added";

echo '<p><p>';

header("Location:addressbooksql.php");
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




