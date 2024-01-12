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
    if (isset($_POST['name']) && isset($_POST['id'])) {
        $names = $_POST['name'];
        $provinces = $_POST['province'];
        $districts = $_POST['district'];
        $sectors = $_POST['sector'];
        $phones = $_POST['phone'];
        $emails = $_POST['email'];
        $classes = $_POST['class'];
        $patientaccs = $_POST['patientacc'];
        $ids = $_POST['id'];

        for ($i = 0; $i < count($ids); $i++) {
            $id = $conn->real_escape_string($ids[$i]);
            $name = $conn->real_escape_string($names[$i]);
            $province = $conn->real_escape_string($provinces[$i]);
            $district = $conn->real_escape_string($districts[$i]);
            $sector = $conn->real_escape_string($sectors[$i]);
            $phone = $conn->real_escape_string($phones[$i]);
            $email = $conn->real_escape_string($emails[$i]);
            $class = $conn->real_escape_string($classes[$i]);
            $patientacc = $conn->real_escape_string($patientaccs[$i]);

            $sql = "UPDATE hospital SET name='$name', province='$province', district='$district', sector='$sector', phone='$phone', email='$email', class='$class', patientacc='$patientacc' WHERE id=$id";

            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record: " . $conn->error;
            }
        }
        echo "Changes saved successfully!";
    }
}

if (isset($_POST['edit'])) {
    $ids = $_POST['edit'];
    $selectedIDs = implode(",", $ids);
    $sql = "SELECT * FROM hospital WHERE id IN ($selectedIDs)";
    $result = $conn->query($sql);
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Selected Hospitals</title>
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

/* Input field styles */
input[type="text"],
input[type="submit"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: calc(100% - 16px); /* Adjusted to compensate for padding */
    margin-bottom: 5px;
}

input[type="submit"] {
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

        /* Your CSS styles */
    </style>
</head>
<body>
<a href="selecthospitalstobedited.php">
<button class="custom-button">BACK </button>
        </a>
    <h2>Edit Selected Hospitals</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
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
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='text' name='name[]' value='" . $row['name'] . "'></td>
                            <td><input type='text' name='province[]' value='" . $row['province'] . "'></td>
                            <td><input type='text' name='district[]' value='" . $row['district'] . "'></td>
                            <td><input type='text' name='sector[]' value='" . $row['sector'] . "'></td>
                            <td><input type='text' name='phone[]' value='" . $row['phone'] . "'></td>
                            <td><input type='text' name='email[]' value='" . $row['email'] . "'></td>
                            <td><input type='text' name='class[]' value='" . $row['class'] . "'></td>
                            <td><input type='text' name='patientacc[]' value='" . $row['patientacc'] . "'></td>
                            <input type='hidden' name='id[]' value='" . $row['id'] . "'>
                        </tr>";
                }
                echo '<input type="submit" value="Save Changes">';
            } else {
                echo "<tr><td colspan='8'>No hospitals found</td></tr>";
            }
            ?>
        </table>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>

<?php
$conn->close();
?>
