<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete patient if delete button is clicked
if (isset($_POST['delete'])) {
    $deleteIds = $_POST['delete'];
    foreach ($deleteIds as $deleteId) {
        $deleteQuery = "DELETE FROM patient WHERE id = $deleteId";

        if ($conn->query($deleteQuery) !== TRUE) {
            echo "Error deleting record: " . $conn->error;
        }
    }
    echo "<script>alert('Patients deleted successfully');</script>";
}

// Fetch all patient records from the database
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Patients</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #FF5733;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        input[type="submit"] {
            display: block;
            width: 200px;
            height: 40px;
            margin: 20px auto;
            background-color: #FF5733;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #FF8C66;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .custom-button {
  border-radius: 8px;
  background-color: pink;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;}
    </style>
</head>
<body>
<a href="dashboard.php">
<button class="custom-button">BACK </button>
        </a>
    <h2>Delete Patients</h2>
    <form action="" method="post">
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Province</th>
                <th>District</th>
                <th>Sector</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Hospital</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['province'] . "</td>
                            <td>" . $row['district'] . "</td>
                            <td>" . $row['sector'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['hospital'] . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No patients found</td></tr>";
            }
            ?>
        </table>
        <input type="submit" value="Delete Selected Patients">
    </form>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
