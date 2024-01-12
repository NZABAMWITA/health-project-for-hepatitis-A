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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $names = $_POST['name'];
    $provinces = $_POST['province'];
    $districts = $_POST['district'];
    $sectors = $_POST['sector'];
    $phones = $_POST['phone'];
    $emails = $_POST['email'];
    $hospitals = $_POST['hospital'];
    $ids = $_POST['id'];

    // Prepare and execute the update statements
    for ($i = 0; $i < count($ids); $i++) {
        $sql = "UPDATE patient SET 
                name='" . $names[$i] . "', 
                province='" . $provinces[$i] . "', 
                district='" . $districts[$i] . "', 
                sector='" . $sectors[$i] . "', 
                phone='" . $phones[$i] . "', 
                email='" . $emails[$i] . "', 
                hospital='" . $hospitals[$i] . "' 
                WHERE id=" . $ids[$i];

        if ($conn->query($sql) !== TRUE) {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>
