<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost"; // Replace with your server name if different
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "health"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $hospital = $_POST['hospital'];
    $phone = $_POST['phone'];
    $idCard = $_POST['id_card'];
    $insuranceDetails = $_POST['insurance_details'];
    $medicalHistory = $_POST['medical_history'];
    $vitalSignsRecords = $_POST['vital_signs_records'];
    $physicalExamination = $_POST['physical_examination'];
    $diagnosticTests = $_POST['diagnostic_tests'];
    $medicationRecords = $_POST['medication_records'];
    $allergyInformation = $_POST['allergy_information'];
    $socialLifestyleFactors = $_POST['social_lifestyle_factors'];
    $mentalHealthAssessment = $_POST['mental_health_assessment'];
    $consentForms = $_POST['consent_forms'];
    $insuranceAdministrativeInfo = $_POST['insurance_administrative_info'];

    // SQL query to insert data into the patientdetails table
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

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted";
}
?>
