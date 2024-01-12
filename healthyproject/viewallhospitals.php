<!DOCTYPE html>
<html>
<head>
    <title>All Hospitals Information</title>
    <style>
        body{
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            font-size: 18px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Add additional styles for even and odd rows for better readability */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;}
            .custom-button {
  border-radius: 8px;
  background-color: pink;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;}

        
        /* Your existing CSS styles */
        /* ... (styles remain the same) ... */
    </style>
</head>
<body>
<a href="home.php">
<button class="custom-button">BACK </button>
</a>

    <div class="container">
    <h1 style="color:blue"> RECORDED HOSPITALS </h1>
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

        // Fetch hospitals' information from the database
        $sql = "SELECT * FROM hospital";
        $result = $conn->query($sql);

        // Count the number of hospitals
        $numHospitals = ($result->num_rows > 0) ? $result->num_rows : 0;

        // Display the number of hospitals
        echo "<h3>Total Hospitals: $numHospitals</h3>";

        if ($numHospitals > 0) {
            // Display hospitals' information in a table
            echo '<table>
                <tr>
                    <th>Hospital Name</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Sector</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Patient Accommodation</th>
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
                    </tr>";
            }

            echo '</table>';
        } else {
            echo "<p>No hospitals found</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
