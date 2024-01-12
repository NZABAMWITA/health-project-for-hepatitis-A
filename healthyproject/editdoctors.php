<!DOCTYPE html>
<html>
<head>
    <title>Select Doctors to Edit</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
}
/* Basic styles for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

/* Style for table header */
th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: left;
    padding: 8px;
}

/* Alternate row colors for better readability */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Style for table cells */
td {
    padding: 8px;
}

/* Style for checkboxes */
input[type=checkbox] {
    transform: scale(1.5); /* Increase checkbox size */
    margin-left: 5px;
}

/* Style for Submit button */
input[type=submit] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
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

        /* Your CSS styles */
    </style>
</head>
<body>
<a href="dashboard.php">
<button class="custom-button">BACK </button>
        </a>
    <h2>Select Doctors to Edit</h2>
    <form action="savedoctor.php" method="post">
        <table>
            <tr>
                <th>Select</th>
                <th>Doctor Name</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Age</th>
                <th>Degree</th>
            </tr>
            <?php
            // PHP code to retrieve doctor records will go here
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "health";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM doctors";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='checkbox' name='edit[]' value='" . $row['id'] . "'></td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['location'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['age'] . "</td>
                            <td>" . $row['degree'] . "</td>
                        </tr>";
                }
                echo '<input type="submit" value="Edit Selected">';
            } else {
                echo "<tr><td colspan='7'>No doctors available</td></tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>
