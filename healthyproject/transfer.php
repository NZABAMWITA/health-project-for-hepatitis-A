<!DOCTYPE html>
<html>
<head>
    <title>Patient Transfer Form</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color:gray;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: blue;
            font-size: 28px;
        }

        /* Form styling */
        label,
        input[type="text"],
        select,
        textarea,
        input[type="date"],
        input[type="time"],
        input[type="submit"] {
            display: block;
            margin-bottom: 15px;
            width: 100%;
            font-size: 18px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        select {
            appearance: menulist;
            /* For Firefox */
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: darkblue;
        }
        .custom-button {
            border-radius: 8px;
            background-color: violet;
            color: blue;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            position: fixed;
        /* Your CSS styles here */
        /* ... */
    </style>
</head>
<body>
    <a href="searchpatientdetailsafter.php">
        <button class="custom-button">BACK</button>
    </a>

    <div class="container">
        <h1 style="color: green;">Patient Transfer Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Fetch patient ID from previous page or database -->
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" placeholder="Enter patient ID"><br><br>

            <!-- Patient's Name -->
            <label for="patient_name">Patient's Name:</label>
            <input type="text" id="patient_name" name="patient_name" placeholder="Enter patient's name"><br><br>

            <!-- Patient's Gender -->
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>

            <!-- Hospital selection dropdown -->
            <label for="hospital">Select Hospital for Transfer:</label>
            <select id="hospital" name="hospital">
                <?php
                // Establish database connection and fetch hospitals' information
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "health";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM hospital";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hospitals found</option>';
                }

                $conn->close();
                ?>
            </select><br><br>

            <!-- Reason for transfer textarea -->
            <label for="reason">Reason for Transfer:</label>
            <textarea id="reason" name="reason" placeholder="Enter reason for transfer" rows="4"></textarea><br><br>

            <!-- Date and Time of Transfer -->
            <label for="transfer_date">Date of Transfer:</label>
            <input type="date" id="transfer_date" name="transfer_date"><br><br>
            <label for="transfer_time">Time of Transfer:</label>
            <input type="time" id="transfer_time" name="transfer_time"><br><br>

            <!-- Transfer urgency -->
            <label for="urgency">Urgency:</label>
            <select id="urgency" name="urgency">
                <option value="urgent">Urgent</option>
                <option value="non-urgent">Non-Urgent</option>
            </select><br><br>

            <!-- Medical details related to transfer -->
            <label for="medical_details">Medical Details:</label>
            <textarea id="medical_details" name="medical_details" placeholder="Enter medical details for transfer" rows="4"></textarea><br><br>

            <!-- Patient Condition -->
            <label for="patient_condition">Patient Condition:</label>
            <input type="text" id="patient_condition" name="patient_condition" placeholder="Enter patient condition"><br><br>

            <!-- Transfer Contact Person -->
            <label for="contact_person">Contact Person at Destination:</label>
            <input type="text" id="contact_person" name="contact_person" placeholder="Enter contact person name"><br><br>

            <!-- Contact Person's Phone -->
            <label for="contact_person_phone">Contact Person's Phone:</label>
            <input type="text" id="contact_person_phone" name="contact_person_phone" placeholder="Enter contact person phone number"><br><br>

            <!-- Additional Notes -->
            <label for="notes">Additional Notes:</label>
            <textarea id="notes" name="notes" placeholder="Enter any additional notes" rows="4"></textarea><br><br>

            <!-- Submit button to trigger PHP code -->
            <input type="submit" name="submit" value="Transfer">
        </form>
    </div>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Establish database connection
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

        // Assign form data to variables
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $gender = $_POST['gender'];
        $hospital = $_POST['hospital'];
        $reason = $_POST['reason'];
        $transfer_date = $_POST['transfer_date'];
        $transfer_time = $_POST['transfer_time'];
        $urgency = $_POST['urgency'];
        $medical_details = $_POST['medical_details'];
        $patient_condition = $_POST['patient_condition'];
        $contact_person = $_POST['contact_person'];
        $contact_person_phone = $_POST['contact_person_phone'];
        $notes = $_POST['notes'];

        // Prepare SQL statement to insert data
        $sql = "INSERT INTO PatientTransfers (patient_id, patient_name, gender, hospital, reason, transfer_date, transfer_time, urgency, medical_details, patient_condition, contact_person, contact_person_phone, notes) 
                VALUES ('$patient_id', '$patient_name', '$gender', '$hospital', '$reason', '$transfer_date', '$transfer_time', '$urgency', '$medical_details', '$patient_condition', '$contact_person', '$contact_person_phone', '$notes')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "PATIENT IS TRANSFERED SUCCESSFULY";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>
</html>
