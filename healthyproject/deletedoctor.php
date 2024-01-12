<!DOCTYPE html>
<html>
<head>
    <title>Doctors Information</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #FF5733;
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            font-size: 20px;
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
            font-size: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #FF8C66;
        }

        /* Styling for checkbox */
        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin: 0 auto;
        }
        
        
        .custom-button {
  border-radius: 8px;
  background-color: violet;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;
}
        /* Your existing CSS styles */
    </style>
</head>
<body>
<a href="dashboard.php">
<button class="custom-button">BACK  </button>
</a>
    <div class="container">
        
        <!-- Your existing form for adding a new doctor -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <!-- Form fields for adding a new doctor -->
        </form>

        <h2 style="color:orange">Doctor Information</h2>

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
            
            // Delete selected doctors from the database
            $deleteQuery = "DELETE FROM doctors WHERE id IN ($selectedIDs)";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "<p>Selected doctors deleted successfully.</p>";
            } else {
                echo "<p>Error deleting doctors: " . $conn->error . "</p>";
            }
        }

        // Fetch doctors' information from the database
        $sql = "SELECT * FROM doctors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display doctors' information in a table with a delete option
            echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST"><table>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Degree</th>
                    <th>Delete</th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['location'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td>" . $row['degree'] . "</td>
                        <td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>
                    </tr>";
            }

            echo '</table><input type="submit" value="Delete Selected"></form>';
        } else {
            echo "<p>No doctors found</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
