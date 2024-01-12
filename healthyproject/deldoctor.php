<html>
<head>
    <title>Delete Doctor</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color:red">DELETE DOCTOR</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="doctor_id">Doctor ID:</label>
                <input type="text" id="doctor_id" name="doctor_id" >
            </div>
            <input type="submit" name="delete_doctor" value="Delete">
        </form>

        <?php
        // Check if the form is submitted for deletion
        if (isset($_POST['delete_doctor'])) {
            // Retrieve the doctor ID to be deleted
            $doctor_id = $_POST['doctor_id'];

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

            // SQL query to delete the doctor based on the ID
            $sql = "DELETE FROM doctors WHERE id = $doctor_id";

            if ($conn->query($sql) === TRUE) {
                echo "Doctor with ID $doctor_id has been deleted successfully.";
            } else {
                echo "Error deleting doctor: " . $conn->error;
            }

            // Close connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
