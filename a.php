<?php

$connection=mysqli_connect("localhost","konrad@localhost","130232-Konrad","test");
if (mysqli_connect_errno()){
    echo "Błąd połączenia do MySQL:".mysqli_connect_error();
}

$sql_create_db= "CREATE DATABASE test";
if (mysqli_query($connection,$sql_create_db)){
    echo "Baza danych test utworzona pomyslnie";
}
else {
    echo "Blad tworzenia bazy danych: ".mysqli_error($connection);
}

/*
$sql_drop_db= "DROP DATABASE test";
if (mysqli_query($connection,$sql_drop_db)){
    echo "Baza danych test pomyslnie usunieta";
}
else {
    echo "Baza danych test nie zostala usunieta ".mysqli_error($connection);
}
*/

$sql_table_create= "CREATE TABLE Users
(
    ID INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(ID),
    FirstName CHAR(30),
    LastName CHAR(30),
    AGE INT
)";

if (mysqli_query($connection,$sql_table_create)){
    echo "Tabel Users utworzona pomyslnie";
}
else {
    echo "Blad tworzenia tabeli users: ".mysqli_error($connection);
}
?>