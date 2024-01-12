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
    if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['degree']) && isset($_POST['id'])) {
        $names = $_POST['name'];
        $locations = $_POST['location'];
        $phones = $_POST['phone'];
        $emails = $_POST['email'];
        $ages = $_POST['age'];
        $degrees = $_POST['degree'];
        $ids = $_POST['id'];

        for ($i = 0; $i < count($ids); $i++) {
            $id = $conn->real_escape_string($ids[$i]);
            $name = $conn->real_escape_string($names[$i]);
            $location = $conn->real_escape_string($locations[$i]);
            $phone = $conn->real_escape_string($phones[$i]);
            $email = $conn->real_escape_string($emails[$i]);
            $age = $conn->real_escape_string($ages[$i]);
            $degree = $conn->real_escape_string($degrees[$i]);

            $sql = "UPDATE doctors SET name='$name', location='$location', phone='$phone', email='$email', age='$age', degree='$degree' WHERE id=$id";

            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record: " . $conn->error;
            }
        }
        echo "Changes saved successfully!";
    } else {
        echo "Incomplete data received for update.";
    }
}

if (isset($_POST['edit'])) {
    $ids = $_POST['edit'];
    $selectedIDs = implode(",", $ids);
    $sql = "SELECT * FROM doctors WHERE id IN ($selectedIDs)";
    $result = $conn->query($sql);
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Selected Doctors</title>
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
<a href="editdoctors.php">
<button class="custom-button">BACK </button>
        </a>
    <h2>Edit Selected Doctors</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
                <th>Doctor Name</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Age</th>
                <th>Degree</th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='text' name='name[]' value='" . $row['name'] . "'></td>
                            <td><input type='text' name='location[]' value='" . $row['location'] . "'></td>
                            <td><input type='text' name='phone[]' value='" . $row['phone'] . "'></td>
                            <td><input type='text' name='email[]' value='" . $row['email'] . "'></td>
                            <td><input type='text' name='age[]' value='" . $row['age'] . "'></td>
                            <td><input type='text' name='degree[]' value='" . $row['degree'] . "'></td>
                            <input type='hidden' name='id[]' value='" . $row['id'] . "'>
                        </tr>";
                }
                echo '<input type="submit" value="Save Changes">';
            } else {
                echo "<tr><td colspan='6'>No doctors found</td></tr>";
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
