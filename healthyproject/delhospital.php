<html>
<head>
    <title>Delete Hospital</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Hospital</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="hospital_id">Hospital ID:</label>
                <input type="text" id="hospital_id" name="hospital_id">
            </div>
            <input type="submit" value="Delete">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hospital_id = $_POST['hospital_id'];

            // Database connection
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

            // Delete hospital
            $delete_sql = "DELETE FROM hospital WHERE id = ?";
            $stmt = $conn->prepare($delete_sql);
            $stmt->bind_param("i", $hospital_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Hospital with ID $hospital_id has been deleted successfully.";
            } else {
                echo "Error deleting hospital: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
