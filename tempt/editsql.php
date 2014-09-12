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
$Email=$_POST['Email'];
}


//$select="SELECT * FROM fulladdresssql where Id=$Id";
$select="SELECT fulladdresssql.FirstName, fulladdresssql.FamilyName, fulladdresssql.Country, fulladdresssql.City, fulladdresssql.Street, fulladdresssql.Number, additionalinfosql.Email FROM additionalinfosql RIGHT JOIN fulladdresssql ON additionalinfosql.Id=fulladdresssql.Id where fulladdresssql.Id=$Id";

$result=$db->prepare($select);
$result->execute();
$eresult=$result->fetchall();
foreach($eresult as $query2)

echo "<table width='300px'>";
echo "<p><p>";
echo "<h3>To be Updated Record</h3>";
echo "<form method='POST' action=''>";
echo "<tr><td valign='top'>";
echo "<label for 'First Name'>First Name:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='FirstName' maxlength='50' size='30' value= ".$query2['FirstName']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Last Name'>Last Name:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='FamilyName' maxlength='50' size='30' value= ".$query2['FamilyName']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Country'>Country:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='Country' maxlength='50' size='30' value= ".$query2['Country']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'City'>City:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='City' maxlength='50' size='30' value= ".$query2['City']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Street'>Street:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='Street' maxlength='50' size='30' value= ".$query2['Street']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Number'>Number:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='Number' maxlength='50' size='30' value= ".$query2['Number']."></td></tr>";
foreach($eresult as $rowemail)
{
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=10 cols=40 type='varchar' name='Email' maxlength='50' size='30' value= ".$rowemail['Email']."></textarea></td></tr>";
}

/*
echo "First Name&nbsp&nbsp&nbsp&nbsp: <input type='text' name='FirstName' value= ".$query2['FirstName']."><br>";
echo "Family Name : <input type='text' name='FamilyName' value= ".$query2['FamilyName']."><br>";
echo "Country&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Country' value= ".$query2['Country']."><br>";
echo "City&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='City' value= ".$query2['City']."><br>";
echo "Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Street' value= ".$query2['Street']."><br>";
echo "Number&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='text' name='Number' value= ".$query2['Number']."><br>";
foreach($eresult as $rowemail)
{
echo "Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type='varchar' name='Email' value= ".$rowemail['Email']."><br>";
}
*/
echo '<tr><td>';
echo '<input type="submit" name="submit" value="Update Data">';
echo '</td></tr>';
echo '</form>';
echo '</table>';



if(isset($_POST['submit']))

$query2=$db->prepare("UPDATE fulladdresssql SET FirstName=:FirstName, FamilyName=:FamilyName, Country=:Country,City=:City,Street=:Street, Number=:Number WHERE Id='$Id'");
$query3=$db->prepare("UPDATE additionalinfosql SET Email=:Email WHERE Id='$Id']");
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 25);
$query2->bindParam(':Country', $Country, PDO::PARAM_STR);
$query2->bindParam(':City', $City, PDO::PARAM_STR);
$query2->bindParam(':Street', $Street, PDO::PARAM_STR);
$query2->bindParam(':Number', $Number, PDO::PARAM_STR);
$query3->bindParam(':Email', $Email, PDO::PARAM_STR);
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
$query3->execute();


include('fulladdresssql.php');
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




