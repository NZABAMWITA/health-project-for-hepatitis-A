<!DOCTYPE html>
<html>
<head>
    <title>Edit Hospital Record</title>
    <style>
        /* Your CSS styles */
        /* ... */
    </style>
</head>
<body>
    <div class="container">
        <h2>EDIT HOSPITAL RECORD</h2>
        <form action="save_edits.php" method="POST">
            <table>
                <tr>
                    <th>Hospital ID</th>
                    <th>Hospital Name</th>
                    <th>Province</th>
                    <th>District</th>
                    <th>Sector</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Patient Accommodation</th>
                </tr>
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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    foreach ($_POST['id'] as $key => $hospital_id) {
                        $name = $_POST['name'][$key];
                        $province = $_POST['province'][$key];
                        $district = $_POST['district'][$key];
                        $sector = $_POST['sector'][$key];
                        $phone = $_POST['phone'][$key];
                        $email = $_POST['email'][$key];
                        $class = $_POST['class'][$key];
                        $patientacc = $_POST['patientacc'][$key];

                        // Update hospital record in the database
                        $sql = "UPDATE hospital SET 
                                name = '$name',
                                province = '$province',
                                district = '$district',
                                sector = '$sector',
                                phone = '$phone',
                                email = '$email',
                                class = '$class',
                                patientacc = '$patientacc'
                                WHERE id = '$hospital_id'";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                }

                // Fetch updated data after changes
                $sql = "SELECT * FROM hospital";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><input type='text' name='id[]' value='" . $row['id'] . "' readonly></td>
                                <td><input type='text' name='name[]' value='" . $row['name'] . "'></td>
                                <td><input type='text' name='province[]' value='" . $row['province'] . "'></td>
                                <td><input type='text' name='district[]' value='" . $row['district'] . "'></td>
                                <td><input type='text' name='sector[]' value='" . $row['sector'] . "'></td>
                                <td><input type='text' name='phone[]' value='" . $row['phone'] . "'></td>
                                <td><input type='text' name='email[]' value='" . $row['email'] . "'></td>
                                <td><input type='text' name='class[]' value='" . $row['class'] . "'></td>
                                <td><input type='text' name='patientacc[]' value='" . $row['patientacc'] . "'></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No hospitals found</td></tr>";
                }

                $conn->close();
                ?>
            </table>
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
