<!DOCTYPE html>
<html>
<head>
<title>textarea</title>
</head>
<body>

<h1>Email</h1>

<?php
if(isset($_POST['email'])){
  echo "<p>You have the following email address(es);</p>";
  echo "<ul>";
  # To create an array from textarea form, use preg_split function
  # http://php.net/manual/en/function.preg-split.php

  # "\n" means "Newline" (end-of-line)
  $addresses = preg_split("/\n/", $_POST['email']);
  foreach($addresses as $address){
    # You may want to run some SQL queries
    echo "<li>" . $address. "</li>";
  }
  echo "</ul>";
}
?>

<form action="textarea.php" method="POST">
<textarea rows="10" cols="40" name="email">
<?php
if(isset($addresses)){
  foreach($addresses as $address){
    echo $address;
  }
}
?>
</textarea>
<br/>
<input type="submit" value="Submit">
</form>

<p>$_POST['email']: </p>

<?php
print_r($_POST['email']);
?>

</body>
</html>
