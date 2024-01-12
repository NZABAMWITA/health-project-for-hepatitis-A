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

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $hospital = mysqli_real_escape_string($conn, $_POST['hospital']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $idCard = mysqli_real_escape_string($conn, $_POST['id_card']);
    $insuranceDetails = mysqli_real_escape_string($conn, $_POST['insurance_details']);
    $medicalHistory = mysqli_real_escape_string($conn, $_POST['medical_history']);
    $vitalSignsRecords = mysqli_real_escape_string($conn, $_POST['vital_signs_records']);
    $physicalExamination = mysqli_real_escape_string($conn, $_POST['physical_examination']);
    $diagnosticTests = mysqli_real_escape_string($conn, $_POST['diagnostic_tests']);
    $medicationRecords = mysqli_real_escape_string($conn, $_POST['medication_records']);
    $allergyInformation = mysqli_real_escape_string($conn, $_POST['allergy_information']);
    $socialLifestyleFactors = mysqli_real_escape_string($conn, $_POST['social_lifestyle_factors']);
    $mentalHealthAssessment = mysqli_real_escape_string($conn, $_POST['mental_health_assessment']);
    $consentForms = mysqli_real_escape_string($conn, $_POST['consent_forms']);
    $insuranceAdministrativeInfo = mysqli_real_escape_string($conn, $_POST['insurance_administrative_info']);

    $sql = "INSERT INTO patientdetails (
        name, gender, date_of_birth, hospital, phone, id_card, insurance_details,
        medical_history, vital_signs_records, physical_examination, diagnostic_tests,
        medication_records, allergy_information, social_lifestyle_factors,
        mental_health_assessment, consent_forms, insurance_administrative_info
    ) VALUES (
        '$name', '$gender', '$dob', '$hospital', '$phone', '$idCard', '$insuranceDetails',
        '$medicalHistory', '$vitalSignsRecords', '$physicalExamination', '$diagnosticTests',
        '$medicationRecords', '$allergyInformation', '$socialLifestyleFactors',
        '$mentalHealthAssessment', '$consentForms', '$insuranceAdministrativeInfo'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "patient  is now registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Form not submitted";
}
?>

 
 <!DOCTYPE html>
<html>
<head>
    <title>Patient Details Form</title>
    <style>

.custom-button {
  border-radius: 8px;
  background-color: violet;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;}
        /* Basic CSS for styling the form */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: silver;
        }
        /* Center-align form */
        form {
            width: 50%; /* Adjust the width as needed */
            margin: 0 auto; /* Center horizontally */
            text-align: left; /* Align text to the left */
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        textarea,
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
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            /* Center-align submit button */
            display: block;
            margin: 0 auto;
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
  cursor: pointer
  position:fixed;
}
    </style>
</head>
<body>


            <a href="doctor.php">
                <button class="custom-button">BACK </button>
</a>

    <h2>Enter Patient Details</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob">

        <label for="hospital">Hospital:</label>
        <input type="text" id="hospital" name="hospital">

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">

        <label for="id_card">ID Card:</label>
        <input type="text" id="id_card" name="id_card">

        <label for="insurance_details">Insurance Details:</label>
        <textarea id="insurance_details" name="insurance_details"></textarea>

        <label for="medical_history">Medical History:</label>
        <textarea id="medical_history" name="medical_history"></textarea>

        <label for="vital_signs_records">Vital Signs Records:</label>
        <textarea id="vital_signs_records" name="vital_signs_records"></textarea>

        <label for="physical_examination">Physical Examination:</label>
        <textarea id="physical_examination" name="physical_examination"></textarea>

        <label for="diagnostic_tests">Diagnostic Tests:</label>
        <textarea id="diagnostic_tests" name="diagnostic_tests"></textarea>

        <label for="medication_records">Medication Records:</label>
        <textarea id="medication_records" name="medication_records"></textarea>

        <label for="allergy_information">Allergy Information:</label>
        <textarea id="allergy_information" name="allergy_information"></textarea>

        <label for="social_lifestyle_factors">Social Lifestyle Factors:</label>
        <textarea id="social_lifestyle_factors" name="social_lifestyle_factors"></textarea>

        <label for="mental_health_assessment">Mental Health Assessment:</label>
        <textarea id="mental_health_assessment" name="mental_health_assessment"></textarea>

        <label for="consent_forms">Consent Forms:</label>
        <textarea id="consent_forms" name="consent_forms"></textarea>

        <label for="insurance_administrative_info">Insurance Administrative Info:</label>
        <textarea id="insurance_administrative_info" name="insurance_administrative_info"></textarea>

        <input type="submit" value="Submit">
        
</a>
    </form>
</body>
</html>
