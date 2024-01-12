<!DOCTYPE html>
<html>
<head>
    <title>Patient Registration Form</title>
    <style>
        .button-container {
    margin-bottom: 20px;
  }

  .button-container button {
    margin-right: 100px
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
        /* Your CSS styles */
        body {
            background-image: url("sk.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        label {
            font-size: 30px;
            color: orange;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
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

    // Retrieve hospitals from the database
    $sql = "SELECT name FROM hospital";
    $result = $conn->query($sql);
    $hospitals = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hospitals[] = $row['name'];
        }
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $sector = $_POST['sector'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $hospital = $_POST['hospital'];

        // Insert data into the "patient" table
        $insertQuery = "INSERT INTO patient (name, province, district, sector, phone, email, hospital)
                        VALUES ('$name', '$province', '$district', '$sector', '$phone', '$email', '$hospital')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<h1 style='color: gold; font-size: 40px;'> DEAR $name</h1>";
            echo "<h1 style='color: white; font-size: 15px;'>YOU'RE NOW FREE REGISTERED FOR HEPATITIS  A CONTROL</h1>";
            echo "<h1 style='color: white; font-size: 15px;'> AFTER THREE DAYS FORM DATE OF TO DAY DURING DAILY TIME</h1>";
            echo "<h1 style='color: white; font-size: 15px;'>YOU'RE  REQURED TO GO TO THE HOSPITAL YOU SELECTED.</h1>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
    ?>
    
    <div class="container">
    <div class="button">
<div div class="button-container">
<a href="home.php">
<button class="custom-button">BACK TO HOME </button>
</a>
</div>
        <h2 style="color:pink">WELCOME TO REGISTRATION FORM</h2>
        <h2 style="color: YELLOW"> PLEASE AFTER SUMBITING YOUR FORM CHECK TO THE  TOP-LEFT NOTIFICATION INCLUDING YOUR NAME TO MAKE SURE YOU'RE REGISTERED</h2> 
        <h2>FILL THE FORM BELOW</h2>
        
       
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" id="province" name="province" required>
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" id="district" name="district" required>
            </div>
            <div class="form-group">
                <label for="sector">Sector:</label>
                <input type="text" id="sector" name="sector" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="hospital">Select Hospital:</label>
                <select id="hospital" name="hospital" required>
                    <?php
                    foreach ($hospitals as $hospital) {
                        echo "<option value='" . $hospital . "'>" . $hospital . "</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="submit" name="submit" value="Submit">
            <!-- Within the form -->

        </form>
        <!-- Remaining HTML content -->
    </div>
    
</body>
</html>
