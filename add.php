<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <h2>Add Form</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($firstname && !empty($lastname) && !empty($email)){
        $sql = "INSERT INTO databasetable (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "<p class='text-success'>New record created successfully</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

    }else{
        echo "<p class='text-danger'>Please Fill the full form</p>";
    }

    ?>

        <form action="add.php" method="post">
            <div class="form-group">
            <label for="email">First Name:</label>
        <input type="text" class="form-control" id="firstname" placeholder="Enter Your firstname" name="firstname">
            </div>
            <div class="form-group">
            <label for="email">Last name:</label>
        <input type="text" class="form-control" id="lastname" placeholder="Enter Your Lastname" name="lastname">
            </div>
            <div class="form-group">
            <label for="pwd">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-success" href="list.php">Visit List Page</a>

        </form>
            </div>
            </body>
            </html>
