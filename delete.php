<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Delete</h2>

    <?php
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

    // Check if delete_id is set and valid
    if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        // Prepare and bind the delete statement
        $stmt = $conn->prepare("DELETE FROM databasetable WHERE id = ?");
        $stmt->bind_param("i", $delete_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
    header("Location: list.php"); // Redirect back to the main page
    exit();
    ?>


</div>
<!--<a class="btn btn-success" href="list.php">Back To List Page</a>-->


</body>
</html>
