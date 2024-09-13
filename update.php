<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];
    $sql = "SELECT * FROM databasetable WHERE id='$id'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
} else {

    $id = $_POST["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];

    $sql = "UPDATE databasetable SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id='$id'";
    if ($conn->query($sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    header("Location: list.php"); // Redirect back to the main page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Data</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>