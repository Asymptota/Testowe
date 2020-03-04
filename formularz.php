<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
</head>
<h1>Form</h1>
<body>

<form action="insert.php" method="post">
    First Name: <input type="text" name="firstname" placeholder="Imię">
    Last Name: <input type="text" name="lastname" placeholder="Nazwisko">
    Age: <input type="text" name="age" placeholder="Wiek">
    Zatwierdź: <input type="submit">
</form>
</body>
<br>

<?php

$connection=mysqli_connect("localhost","konrad@localhost","130232-Konrad","test");
if (mysqli_connect_errno()){
    echo "Błąd połączenia do MySQL:".mysqli_connect_error();
}


$sql_select_db= "SELECT * FROM Users";
if (!mysqli_query($connection,$sql_select_db)){
    die('Error: '.mysqli_error($connection));
}

$result=mysqli_query($connection,$sql_select_db);

$licznik_wierszy=mysqli_num_rows($result);

echo "Całkowita liczba wierszy w tabeli $licznik_wierszy .";
?>

<html>
<br>
</html>

<?php

$row =mysqli_fetch_array($result);

echo $row['ID'];
echo $row['FirstName'];
echo $row['LastName'];
echo $row['AGE'];

?>
<br>


</html>