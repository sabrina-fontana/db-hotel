<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_hotel";

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn && $conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
} else {
  echo "Connessione riuscita. <br/>";
}

$sql = "SELECT name, lastname, date_of_birth FROM ospiti";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 'Nome: ' . $row['name'] . '<br>' . 'Cognome ' . $row['lastname'] . '<br>' . 'data di nascita '. $row['date_of_birth'] . '<br><br>';
  }
} elseif ($result) {
    echo "0 results";
} else {
    echo "query error";
}

$maxPrice = 400;

$sql = "SELECT status, price, prenotazione_id FROM pagamenti WHERE price <= $maxPrice";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 'Prenotazione_id ' . $row['prenotazione_id'] . ' Price ' . $row['price'] . ' Status: ' . $row['status'] . '<br><br>';
  }
} elseif ($result) {
    echo "0 results";
} else {
    echo "query error";
}

$conn->close();
