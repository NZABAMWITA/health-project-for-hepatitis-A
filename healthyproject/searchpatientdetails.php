<!DOCTYPE html>
<html>
<head>
    <title>Search Patient Details</title>
    <style>
        /* Basic CSS for styling the form */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        /* Center-align form */
        form {
            width: 50%;
            margin: 0 auto;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Search Patient Details</h2>
    <form action="" method="post">
        <label for="search_name">Search by Name:</label>
        <input type="text" id="search_name" name="search_name" placeholder="Enter patient's name">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "health";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $search_name = mysqli_real_escape_string($conn, $_POST['search_name']);

        $sql = "SELECT * FROM patientdetails WHERE name LIKE '%$search_name%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <!-- Add other fields you want to display -->
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['date_of_birth']}</td>
                    <!-- Add other fields you want to display -->
                </tr>";
            }
            echo "</table>";
        } else {
            echo "No matching records found.";
        }

        $conn->close();
    } else {
        echo "No search performed.";
    }
    ?>
</body>
</html>
