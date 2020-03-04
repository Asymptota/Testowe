<?php

$connection=mysqli_connect("localhost","konrad@localhost","130232-Konrad","test");
if (mysqli_connect_errno()){
    echo "Błąd połączenia do MySQL:".mysqli_connect_error();
}

$sql_insert_table="INSERT INTO Users (FirstName, LastName, AGE)
values 
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";
if (!mysqli_query($connection,$sql_insert_table)){
    die('Error: '.mysqli_error($connection));
}
echo "1 wiersz dodany";

mysqli_close($connection);

?>
<html>
<form action="formularz.php">
    Wróć: <input type="submit" value="OK">
</form>
</html>