<html>
<meta charset='Shift-JIS'>
<body>
<h1>Update Existing Record</h1>

<?php
$hostname='localhost';
$username='root';
$password='kagaku';





try
{
//$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');

$db = new PDO("mysql:host=$hostname; dbname=addressbooksql",$username,$password);


{
if(isset($_GET['Id']))
$Id=$_GET['Id'];

//if(isset($_POST['submit']))
{
$FirstName=$_POST['FirstName'];
$FamilyName=$_POST['FamilyName'];
$Country=$_POST['Country'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$Number=$_POST['Number'];
}


$select="SELECT * FROM fulladdresssql where Id=$Id";
$result=$db->prepare($select);
$result->execute();
foreach($result as $query2)

echo "<fieldset style ='width:300px;'>";
echo "<p><p>";
echo "<h3>To be Updated Record</h3>";
echo "<form method='POST' action=''>";
echo "First Name&nbsp&nbsp&nbsp&nbsp: <input type='text' name='FirstName' value= ".$query2['FirstName']."><br>";
echo "Family Name : <input type='text' name='FamilyName' value= ".$query2['FamilyName']."><br>";
echo "Country&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Country' value= ".$query2['Country']."><br>";
echo "City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='City' value= ".$query2['City']."><br>";
echo "Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Street' value= ".$query2['Street']."><br>";
echo "Number&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Number' value= ".$query2['Number']."><br>";
echo '<br>';
echo '<input type="submit" name="submit" value="Update Data">';
echo '</form>';
echo '</fieldset>';


/*
{
$FirstName=$_POST['FirstName'];
$FamilyName=$_POST['FamilyName'];
$Country=$_POST['Country'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$Number=$_POST['Number'];
}
*/

if(isset($_POST['submit']))

$query2=$db->prepare("UPDATE fulladdresssql SET FirstName=:FirstName, FamilyName=:FamilyName, Country=:Country,City=:City,Street=:Street, Number=:Number WHERE Id='$Id'");
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 25);
$query2->bindParam(':Country', $Country, PDO::PARAM_STR);
$query2->bindParam(':City', $City, PDO::PARAM_STR);
$query2->bindParam(':Street', $Street, PDO::PARAM_STR);
$query2->bindParam(':Number', $Number, PDO::PARAM_STR);
//check if FirstName and FamilyName are both not empty
if ($FirstName == '' || $FamilyName == '')
{
$error = "PLEASE FILL IN ALL REQUIRED FIELDS";
echo '<p><p>';
echo "$error!";

}
else
{
$query2->execute();
}


include('fulladdresssql.php');


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




