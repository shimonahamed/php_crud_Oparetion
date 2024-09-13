

<?php

//database connection


//$servername = "localhost";
//$username = "root";
//$password = "root";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";


//Data insert


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO databasetable (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";

$sql .= "INSERT INTO databasetable (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";

$sql .= "INSERT INTO databasetable (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



//Data Delete

//$servername = "localhost";
//$username = "root";
//$password = "root";
//$dbname = "mydb";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

//// sql to delete a record
////$sql = "DELETE FROM databasetable WHERE id=2";
//
//if ($conn->query($sql) === TRUE) {
//    echo "Record deleted successfully";
//} else {
//    echo "Error deleting record: " . $conn->error;
//}
//
//$conn->close();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//sql to delete a record
$sql = "UPDATE databasetable SET firstname='jahid', lastname='since' WHERE id=1";


if ($conn->query($sql) === TRUE) {
    echo "Record Updata successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
//?>


