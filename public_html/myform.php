<html>
<head>
<title> test Greeting Form - update </title>
</head>

<body>

<?php
if ($_POST['formSubmit']=="Submit"){
$varName = $_POST['formName'];
}
?>


<form action="myform.php" method="post">
 Enter your name:
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


</body>

</html>


