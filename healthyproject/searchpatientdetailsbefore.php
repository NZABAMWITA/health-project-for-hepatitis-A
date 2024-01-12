<!DOCTYPE html>
<html>
<head>
    <title>Search Patient Details</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: silver;
        }

        /* Center-align form */
        form {
            width: 50%;
            margin: 0 auto;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 40px;
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
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
  background-color: violet;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;}
    </style>
</head>
<body>  <a href="doctor.php">
                <button class="custom-button">BACK </button>
            </a>
    <h2>Search Patient Details</h2>
    <form action="" method="post">
        <label for="search_name">Search by Name:</label>
        <input type="text" id="search_name" name="search_name" placeholder="Enter patient's name before treatment">
        <input type="submit" value="Search">
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "health";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_name = mysqli_real_escape_string($conn, $_POST['search_name']);

        $sql = "SELECT * FROM patient WHERE name LIKE '%$search_name%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Sector</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Hospital</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['province']}</td>
                    <td>{$row['district']}</td>
                    <td>{$row['sector']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['hospital']}</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "This patient did not visted the  page before.";
        }
    }

    $conn->close();
    ?>
</body>
</html>
