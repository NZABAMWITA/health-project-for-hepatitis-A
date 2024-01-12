<html>
<head>
    <title>Add New Doctor</title>
    <style>
        body {background-image: url("rd2.png");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        label {
  font-size: 30px;
  color: blue;
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

        input[type="radio"] {
            margin-right: 5px;
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
        <h1 style="color:orange">ADD A NEW DOCTOR</h2>
       

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >
        </div>
       
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" >
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
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" >
        </div>
        <div class="form-group">
            <label for="degree">Degree:</label>
            <input type="text" id="degree" name="degree" >
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
      
        $location = $_POST['location'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $degree = $_POST['degree'];

        // Insert data into the "doctor" table
        $stmt = $conn->prepare("INSERT INTO doctors (name, location, phone, email, age, degree) VALUES (?,?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $name,  $location, $phone, $email, $age, $degree);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Doctor record added successfully.";
        } else {
            echo "Error adding doctor record: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
    </div>
</body>
</html>