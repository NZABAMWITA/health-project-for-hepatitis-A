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

// Count the number of patients
$numPatients = $result->num_rows;

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patients</title>
    <style>body {
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

p {
    font-size: 18px;
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
  position:fixed;
}
    </style>
</head>
<body>
    <div class="button">
<div div class="button-container">
<a href="dashboard.php">
<button class="custom-button">BACK </button>
</a>
    <h2>View Patients</h2>
    <p>Total Patients: <?php echo $numPatients; ?></p>
    <table>
        <tr>
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
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
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
            echo "<tr><td colspan='7'>No patients found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
