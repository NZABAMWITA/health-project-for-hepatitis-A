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

// Fetch all patient records from the database
$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Selected Patients</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    <h2>Edit Selected Patients</h2>
    <form action="editselectedpatients.php" method="post">
        <table>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Province</th>
                <th>District</th>
                <th>Sector</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Hospital</th>
                <!-- Add other column headers here -->
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>
                                <input type='checkbox' name='edit[]' value='" . $row['id'] . "'>
                            </td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['province'] . "</td>
                            <td>" . $row['district'] . "</td>
                            <td>" . $row['sector'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['hospital'] . "</td>
                            <!-- Add other cells for selection here -->
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No patients found</td></tr>";
            }
            ?>
        </table>
        <input type="submit" value="Edit Selected Patients">
    </form>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
