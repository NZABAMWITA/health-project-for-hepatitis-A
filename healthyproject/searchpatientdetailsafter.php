<!DOCTYPE html>
<html>
<head>
    <title>Search Patient Details</title>
    <style>
        /* Basic CSS for styling the form */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: ;
        }
        /* Center-align form */
        form {
            width: 50%;
            margin: 0 auto;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
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
        .custom-button {
            border-radius: 8px;
            background-color: violet;
            color: blue;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            position: fixed;
        }
        table {
            width: 100%;
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
        table {
        width: 100%;
        border-collapse: collapse;
        overflow-x: auto; /* Enable horizontal scroll if needed */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        white-space: nowrap; /* Prevent line break within cells */
    }

    th {
        background-color: #f2f2f2;
    }

    /* Responsive table styles */
    @media (max-width: 768px) {
        table {
            overflow-x: scroll; /* Enable horizontal scroll on smaller screens */
        }
    }
    </style>
</head>
<body>
<a href="doctor.php">
    <button class="custom-button">BACK </button>
</a>
<h2>Search Patient Details</h2>
<form action="" method="post">
    <label for="search_name">Search by Name:</label>
    <input type="text" id="search_name" name="search_name" placeholder="Enter patient's name after treatment">
    <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "health";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $search_name = mysqli_real_escape_string($conn, $_POST['search_name']);

    $sql = "SELECT * FROM patientdetails WHERE name LIKE '%$search_name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Hospital</th>
                <th>Phone</th>
                <th>ID Card</th>
                <th>Insurance Details</th>
                <th>Medical History</th>
                <th>Vital Signs Records</th>
                <th>Physical Examination</th>
                <th>Diagnostic Tests</th>
                <th>Medication Records</th>
                <th>Allergy Information</th>
                <th>Social Lifestyle Factors</th>
                <th>Mental Health Assessment</th>
                <th>Consent Forms</th>
                <th>Insurance Administrative Info</th>
                <th>Transfer</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['hospital']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['id_card']}</td>
                <td>{$row['insurance_details']}</td>
                <td>{$row['medical_history']}</td>
                <td>{$row['vital_signs_records']}</td>
                <td>{$row['physical_examination']}</td>
                <td>{$row['diagnostic_tests']}</td>
                <td>{$row['medication_records']}</td>
                <td>{$row['allergy_information']}</td>
                <td>{$row['social_lifestyle_factors']}</td>
                <td>{$row['mental_health_assessment']}</td>
                <td>{$row['consent_forms']}</td>
                <td>{$row['insurance_administrative_info']}</td>
                <td>
                    <form action='transfer.php' method='post'>
                        <input type='hidden' name='patient_id' value='" . (isset($row['id']) ? $row['id'] : '') . "'>
                        <input type='submit' name='transfer' value='Transfer'>
                    </form>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "This patient's record was not found after treatment.";
    }

    $conn->close();
} else {
    echo "No search performed.";
}
?>
</body>
</html>
