 <?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $hospital = $_POST['hospital'];

    // Insert the data into the "patient" table
    $sql = "INSERT INTO patient (name, province, district, sector, phone, email, hospital)
            VALUES ('$name', '$province', '$district', '$sector', '$phone', '$email', '$hospital')";

    if (mysqli_query($conn, $sql)) {
        echo "Recorded";
    } else {
        die("Not inserted: " . mysqli_error($conn));
    }
}

$conn->close();
?>

<html>
<head>
    <title>Patient Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .notification {
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Patient Registration Form</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" id="province" name="province" >
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" id="district" name="district" >
            </div>
            <div class="form-group">
                <label for="sector">Sector:</label>
                <input type="text" id="sector" name="sector" >
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="hospital">Select Hospital:</label>
                <select id="hospital" name="hospital">
                    <option value="CHUK">CHUK</option>
                    <option value="CHUB">CHUB</option>
                    <option value="MUZANSE HOP">MUZANSE HOP</option>
                    <option value="NYAGATARE HOP">NYAGATARE HOP</option>
                    <option value="RUSIZI HOP">RUSIZI HOP</option>
                </select>
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>