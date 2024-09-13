<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>

<div class="container">
    <h2>List</h2>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "mydb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, firstname, lastname,email FROM databasetable";
        $result = $conn->query($sql);
        ?>

        <table class="table table-boarded">
            <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Eidt Data</th>
            <th scope="col">Delete Data</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
            <tr>
            <th scope="row"><?php echo $row["id"] ?></th>
            <td><?php echo $row["firstname"] ?></td>
            <td><?php echo $row["lastname"] ?></td>
            <td><?php echo $row["email"] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to Update this record?')">Eidt</a>
                </td>
                <td>
                    <a href="delete.php?delete_id=<?php echo $row['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
            </tr>
            <?php
            }
            }
            ?>
            </tbody>
            </table>
    <a class="btn btn-success" href="add.php" >Add Page</a>
            </div>


            </body>
            </html>