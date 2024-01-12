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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['id'])) {
        $names = $_POST['name'];
        $provinces = $_POST['province'];
        $districts = $_POST['district'];
        $sectors = $_POST['sector'];
        $phones = $_POST['phone'];
        $emails = $_POST['email'];
        $hospitals = $_POST['hospital'];
        $ids = $_POST['id'];

        // Update the edited data in the database
        for ($i = 0; $i < count($ids); $i++) {
            $id = $conn->real_escape_string($ids[$i]);
            $name = $conn->real_escape_string($names[$i]);
            $province = $conn->real_escape_string($provinces[$i]);
            $district = $conn->real_escape_string($districts[$i]);
            $sector = $conn->real_escape_string($sectors[$i]);
            $phone = $conn->real_escape_string($phones[$i]);
            $email = $conn->real_escape_string($emails[$i]);
            $hospital = $conn->real_escape_string($hospitals[$i]);

            $sql = "UPDATE patient SET name='$name', province='$province', district='$district', sector='$sector',
                    phone='$phone', email='$email', hospital='$hospital' WHERE id=$id";

            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record: " . $conn->error;
            }
        }
        echo "Changes saved successfully!";
    }
}

// Fetch updated data after saving changes
if (isset($_POST['edit'])) {
    $ids = $_POST['edit'];
    $selectedIDs = implode(",", $ids);
    $sql = "SELECT * FROM patient WHERE id IN ($selectedIDs)";
    $result = $conn->query($sql);
} else {
    $result = null;
}
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
            margin-bottom: 20px;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"], input[type="submit"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
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
<a href="editpatients.php">
<button class="custom-button">BACK </button>
        </a>
    <h2>Edit Selected Patients</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='text' name='name[]' value='" . $row['name'] . "'></td>
                            <td><input type='text' name='province[]' value='" . $row['province'] . "'></td>
                            <td><input type='text' name='district[]' value='" . $row['district'] . "'></td>
                            <td><input type='text' name='sector[]' value='" . $row['sector'] . "'></td>
                            <td><input type='text' name='phone[]' value='" . $row['phone'] . "'></td>
                            <td><input type='text' name='email[]' value='" . $row['email'] . "'></td>
                            <td><input type='text' name='hospital[]' value='" . $row['hospital'] . "'></td>
                            <input type='hidden' name='id[]' value='" . $row['id'] . "'>
                        </tr>";
                }
                echo '<input type="submit" value="Save Changes">';
            } else {
                echo "<tr><td colspan='8'>No patients found</td></tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
