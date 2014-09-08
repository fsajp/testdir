<html>
<body>

<?php

try
{
$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');
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


$select="SELECT * FROM fulladdress where Id=$Id";
$result=$db->prepare($select);
$result->execute();
foreach($result as $row)

echo "<fieldset style ='width:300px;'>";
echo "<form method='POST' action=''>";
echo "First Name&nbsp&nbsp&nbsp&nbsp: <input type='text' name='FirstName' value= ".$row['FirstName']."><br>";
echo "Family Name : <input type='text' name='FamilyName' value= ".$row['FamilyName']."><br>";
echo "Country&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Country' value= ".$row['Country']."><br>";
echo "City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='City' value= ".$row['City']."><br>";
echo "Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Street' value= ".$row['Street']."><br>";
echo "Number&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Number' value= ".$row['Number']."><br>";
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

{
$query2=$db->prepare("UPDATE fulladdress SET FirstName=:FirstName, FamilyName=:FamilyName, Country=:Country,City=:City,Street=:Street, Number=:Number WHERE Id='$Id'");
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 25);
$query2->bindParam(':Country', $Country, PDO::PARAM_STR);
$query2->bindParam(':City', $City, PDO::PARAM_STR);
$query2->bindParam(':Street', $Street, PDO::PARAM_STR);
$query2->bindParam(':Number', $Number, PDO::PARAM_STR);
$query2->execute();
}


include('fulladdress.php');


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




