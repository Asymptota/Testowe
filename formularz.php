<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
</head>
<h1>Formularz</h1>
<body>

<!-- formularz dodania pracownika -->
<form action="insert.php" method="post">
    First Name: <input type="text" name="firstname" placeholder="Imię">
    Last Name: <input type="text" name="lastname" placeholder="Nazwisko">
    Age: <input type="text" name="age" placeholder="Wiek">
    Zatwierdź: <input type="submit">
</form>
<br>

<!-- tabela -->

<style> td { border: 1px solid black; } </style>
<br>

<table>
    <tr>
        <td>&nbsp;Pracownik:</td>

        <?php

        #Polaczenie z baza danych MySQL
        $connection = mysqli_connect("localhost", "konrad@localhost", "130232-Konrad", "test");    // Polaczenie z baza danych MySQL

        if (mysqli_connect_errno()) {
            echo "Blad polaczenia z baza danych ".mysqli_connect_error();    // Raport o ewentualnym bledzie polaczenia z baza danych
        }

        $sql = "SELECT * FROM Users";               // Zapytanie do bazy danych
        if (!mysqli_query($connection,$sql)) {
            die('Blad '.mysqli_error($connection));
        }

        $wynik = mysqli_query($connection,$sql);        // Rezultat zapytania

        $licznik_wierszy = mysqli_num_rows($wynik);                 // Licznik wierszy do wyswietlenia
        echo "Całkowita liczba pracownikow: <b>$licznik_wierszy</b>.<br><br>";

        # Wyswietlanie listy pracownikow
        $a = 0;

        while ($a < $licznik_wierszy) {
            $row=mysqli_fetch_array($wynik);
            $a++;

            ?>
            <td><b>&nbsp;&nbsp;&nbsp;<?php echo "<a href='formularz.php?id={$row['ID']}'>{$row['FirstName']}</a>"; ?>&nbsp;&nbsp;&nbsp;</b></td>

            <?php
        }
        ?>
    </tr>
</table>
<?php

// Przechwycenie id

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql1 = "SELECT * FROM Users WHERE ID= $id";
    if (!mysqli_query($connection, $sql1)) {
        die('Blad ' . mysqli_error($connection));
    }

    $zapytanie1 = mysqli_query($connection, $sql1);
    $zapytanie2 = mysqli_query($connection, $sql1);

    // Licznik wierszy do wyswietlenia

    $licznik_wierszy2 = mysqli_num_rows($zapytanie1);

    $row2 = mysqli_fetch_array($zapytanie2);

    $c = $row2['ID'];

    echo "<br><br>Dane pracownika o numerze ID: $c<br><br>";

    $b = 0;
    while ($b < $licznik_wierszy2) {
        $row1 = mysqli_fetch_array($zapytanie1);
        $b++
        ?>
        <br>
        <table>
        <colgroup>
            <tr>
                <td>&nbsp;Imie:</td>
                <td><b>&nbsp;&nbsp;<?php echo $row1['FirstName'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
            </tr>
            <tr>
                <td>&nbsp;Nazwisko:</td>
                <td><b>&nbsp;&nbsp;<?php echo $row1['LastName'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
            </tr>
            <tr>
                <td>&nbsp;Wiek:</td>
                <td><b>&nbsp;&nbsp;<?php echo $row1['AGE'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
            </tr>
        </colgroup>
        <?php
    }

    // Zamykanie polaczenia z serwerem MySQL
    mysqli_close($connection);
    ?>
    </table>
    <br><br>
    <form action="formularz.php">
        Wróć: <input type="submit" value="OK">
    </form>
    <?php
}
?>

</body>
</html>