<!DOCTYPE html>
<html>
<head>
    <title>All Hospitals Information</title>
    <style>
        table {
            width: 100%;
    border-collapse: collapse;
    border: 2px solid #000; /* Border around the table */
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
}

th, td {
    border: 1px solid #000; /* Borders for table cells */
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    font-size: 16px;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

/* Style for the delete button */
input[type="submit"] {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #FF5733;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #FF8C66;
}
.custom-button {
  border-radius: 8px;
  background-color: pink;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;
        /* Your existing CSS styles */
    </style>
</head>
<body>
<a href="dashboard.php">
<button class="custom-button">BACK </button>
        </a>
    <div class="container">
        <h2 style="color:orange">All Hospitals Information</h2>

        <?php
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "health";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the delete form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
            $ids = $_POST['delete'];
            $selectedIDs = implode(",", $ids);
            
            // Delete selected hospitals from the database
            $deleteQuery = "DELETE FROM hospital WHERE id IN ($selectedIDs)";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "<p>Selected hospitals deleted successfully.</p>";
            } else {
                echo "<p>Error deleting hospitals: " . $conn->error . "</p>";
            }
        }

        // Fetch hospitals' information from the database
        $sql = "SELECT * FROM hospital";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display hospitals' information in a table with a delete option
            echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST"><table>
                <tr>
                    <th>Hospital Name</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Sector</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Patient Accommodation</th>
                    <th>Delete</th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['province'] . "</td>
                        <td>" . $row['district'] . "</td>
                        <td>" . $row['sector'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['class'] . "</td>
                        <td>" . $row['patientacc'] . "</td>
                        <td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>
                    </tr>";
            }

            echo '</table><input type="submit" value="Delete Selected"></form>';
        } else {
            echo "<p>No hospitals found</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
