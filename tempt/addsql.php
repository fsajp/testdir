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

echo "<table width='300px'>";
echo "<form method='POST' action=''>";
echo "<tr><td valign='top'>";
echo "<label for 'First Name'>First Name:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='FirstName' maxlength='50' size='30' value= ".$_POST['FirstName']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Family Name'>Family Name:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='FamilyName' maxlength='50' size='30' value= ".$_POST['FamilyName']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Country'>Country:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='Country' maxlength='50' size='30' value= ".$_POST['Country']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'City'>City:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='City' maxlength='50' size='30' value= ".$_POST['City']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Street'>Street:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='Street' maxlength='50' size='30' value= ".$_POST['Street']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Number'>Number:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<input type='text' name='Number' maxlength='50' size='30' value= ".$_POST['Number']."></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email' maxlength='50' size='30' value= ".$_POST['Email1']."></textarea></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email' maxlength='50' size='30' value= ".$_POST['Email2']."></textarea></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email' maxlength='50' size='30' value= ".$_POST['Email3']."></textarea></td></tr>";
echo '<tr><td>';
echo '<br>';
echo '<input type="submit" name="submit" value="Add New Record">';
echo '</td></tr>';
echo '</form>';
echo '</table>';


/*
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
*/

{
$FirstName=$_POST['FirstName'];
$FamilyName=$_POST['FamilyName'];
$Country=$_POST['Country'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$Number=$_POST['Number'];
$Email=$_POST['Email'];
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
//$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
//$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 20);
//$query2->bindParam(':Email', $Email, PDO:: PARAM_STR,20);

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

//echo "Data is added";

echo '<p><p>';

$lastId=$db->lastInsertId();
If $_POST['Email1'=='']
{}
else
{
$query2=$db->prepare("INSERT INTO additionalinfosql (FirstName, FamilyName, Email, Id) VALUES (:FirstName, :FamilyName, :Email, :Id)");
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 25);
$query2->bindParam(':Email', $Email1, PDO::PARAM_STR);
$query2->bindParam(':Id',$lastId, PDO::PARAM_INT);
$query2->execute();
$i=$i+1;
}





//echo $lastId;

//include("addemail.php");
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




