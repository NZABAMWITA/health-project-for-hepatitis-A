<html>
<head>
    <title>Add New Hospital</title>
    <style>
    body {background-image: url("fl.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        label {
  font-size: 30px;
  color: yellow;
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
        .custom-button {
  border-radius: 8px;
  background-color: pink;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;}
    </style>
</head>
<body>
<a href="dashboard.php">
<button class="custom-button">BACK </button>
        </a>
    <div class="container">
        <h2>ADD A NEW HOSPITAL</h2>
      
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label for="name">Hospital Name:</label>
            <input type="text" id="name" name="name" >
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
            <input type="email" id="email" name="email" >
        </div>
        <div class="form-group">
            <label for="class">Class:</label>
            <select id="class" name="class" >
                <option value="General">General</option>
                <option value="Specialty">Specialty</option>
                <option value="Teaching">Teaching</option>
                <option value="Research">Research</option>
            </select>
        </div>
        <div class="form-group">
            <label for="patientacc">Patient Accommodation:</label>
            <input type="text" id="patientacc" name="patientacc" >
        </div>
        <input type="submit" value="Add">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "health";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
        $name = $_POST['name'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $sector = $_POST['sector'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $class = $_POST['class'];
        $patientacc = $_POST['patientacc'];

        // Insert data into the "hospital" table
        $stmt = $conn->prepare("INSERT INTO hospital (name, province, district, sector, phone, email, class, patientacc	) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $province, $district, $sector, $phone, $email, $class, $patientacc);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<h1 style='color: white; font-size: 15px;'>HOSPITAL IS ADDED SUCCESSFUL</h1>";
        } else {
            echo "Error adding hospital record: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    </div>
</body>
</html>