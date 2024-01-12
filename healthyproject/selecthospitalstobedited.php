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

// Fetch all hospital records from the database
$sql = "SELECT * FROM hospital";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Selected Hospitals</title>
    <!-- Add your CSS styling here -->
    <style>
    /* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    color: #333;
}

/* Heading styles */
h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

/* Checkbox styles */
input[type="checkbox"] {
    width: 16px;
    height: 16px;
}

/* Input field styles */
input[type="submit"] {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    background-color: #4caf50;
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
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
<a href="editdoctors.php">
<button class="custom-button">BACK </button>
        </a>
    <h2>Edit Selected Hospitals</h2>
    <form action="editandsavehospitals.php" method="post">
        <table>
            <tr>
                <th>Select</th>
                <th>Hospital Name</th>
                <th>Province</th>
                <th>District</th>
                <th>Sector</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Class</th>
                <th>Patient Accommodation</th>
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
                            <td>" . $row['class'] . "</td>
                            <td>" . $row['patientacc'] . "</td>
                            <!-- Add other cells for selection here -->
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hospitals found</td></tr>";
            }
            ?>
        </table>
        <input type="submit" value="Edit Selected Hospitals">
    </form>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
