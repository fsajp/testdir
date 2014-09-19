<html>
<meta charset='Shift-JIS'>
<body>
<h1>Update Existing Record</h1>

<?php
$hostname='localhost';
$username='root';
$password='kagaku';

//print_r($_POST['Email']);



try
{
//$db = new PDO('sqlite:/home/fenny/public_html/tempt/addressbook.db');

$db = new PDO("mysql:host=$hostname; dbname=addressbooksql",$username,$password);


{
//if(isset($_GET['Id']))
$Id=$_GET['Id'];
//$Id='28';

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


$select="SELECT * FROM fulladdresssql where Id=$Id";

$result=$db->prepare($select);
$result->execute();
$eresult=$result->fetchall();
foreach($eresult as $query2)
{
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
echo "<label for 'Family Name'>Family Name:</label>";
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
}

$selectinfo="SELECT * FROM additionalinfosql where Id=$Id";
//echo $selectinfo;
$resultaddinfo=$db->prepare($selectinfo);
$resultaddinfo->execute();
$inforesult=$resultaddinfo->fetchall();
$numrows=Count($inforesult);
//echo $numrows;


if ($numrows ==  '0')
{
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30' value= ".$_POST['Email']."></textarea></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30' value= ".$_POST['Email']."></textarea></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30' value= ".$_POST['Email']."></textarea></td></tr>";
}

elseif ($numrows == '1')
{
foreach($inforesult as $rowemail)
{
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30']>".$rowemail['Email']."</textarea></td></tr>";
}
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30' value= ".$_POST['Email']."></textarea></td></tr>";
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30' value= ".$_POST['Email']."></textarea></td></tr>";
}


elseif ($numrows== '2')
{
foreach($inforesult as $rowemail)
{
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30']>".$rowemail['Email']."</textarea></td></tr>";
}
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30' value= ".$_POST['Email']."></textarea></td></tr>";
}


else
{
foreach($inforesult as $rowemail)
{
echo "<tr><td valign='top'>";
echo "<label for 'Email'>Email:</label>";
echo "</td>";
echo "<td valign='top'>";
echo "<textarea rows=1 cols=40 type='varchar' name='Email[]' maxlength='50' size='30']>".$rowemail['Email']."</textarea></td></tr>";
}
}



echo '<tr><td>';
echo '<input type="submit" name="submit" value="Update Data">';
echo '</td></tr>';
echo '</form>';
echo '</table>';



if(isset($_POST['submit']))
{

if ($FirstName == '' || $FamilyName == '')
{
$error = "PLEASE FILL IN ALL REQUIRED FIELDS";
echo '<p><p>';
echo "$error!";
}
else
{
//echo "DELETE FROM additionalinfosql WHERE  Id='$Id')";
$query3=$db->prepare("DELETE FROM additionalinfosql WHERE  Id='$Id'");
$query3->execute();

$i=0;
foreach ($Email as $_POST['Email'])
{
//print_r($Email);
//print "email0: " .($Email[0]). "<br>";
//print "email1: " .($Email[1]). "<br>";
//print "email2: " .($Email[2]). "<br>";

$query4=$db->prepare("INSERT INTO additionalinfosql (FirstName, FamilyName, Email, Id) VALUES (:FirstName, :FamilyName, :Email, :Id)");
$query4->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query4->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 25);
$query4->bindParam(':Email', $Email[$i], PDO::PARAM_STR);
$query4->bindParam(':Id',$Id, PDO::PARAM_INT);
$query4->execute();
$i=$i+1;
}

$query5=$db->prepare("DELETE FROM additionalinfosql WHERE  Id='$Id' AND Email = ''");
$query5->execute();

$query2=$db->prepare("UPDATE fulladdresssql SET FirstName=:FirstName, FamilyName=:FamilyName, Country=:Country,City=:City,Street=:Street, Number=:Number WHERE Id='$Id'");
//$query3=$db->prepare("UPDATE additionalinfosql SET Email=:Email WHERE Id='$Id']");
$query2->bindParam(':FirstName', $FirstName, PDO::PARAM_STR, 20);
$query2->bindParam(':FamilyName', $FamilyName, PDO::PARAM_STR, 25);
$query2->bindParam(':Country', $Country, PDO::PARAM_STR);
$query2->bindParam(':City', $City, PDO::PARAM_STR);
$query2->bindParam(':Street', $Street, PDO::PARAM_STR);
$query2->bindParam(':Number', $Number, PDO::PARAM_STR);

$query2->execute();
}

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



