<!DOCTYPE html>
<html>
<head>
<script>
        function checkCode() {
    var code = prompt("Please enter the code:");

    if (code !== "12345") {
        alert("Incorrect code. Please enter the correct code.");
        checkCode(); // Prompt again if the code is incorrect
    }
}

window.onload = function() {
    checkCode();
};

        </script>
    <style>
          body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: gray;
    }

    .container {
        text-align: center;
    }

    h2 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    form {
        width: 80%;
        margin: 0 auto;
    }

    select,
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 18px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ccc;
        padding: 8px;
        font-size: 18px;
    }

    .add-details-button {
        display: inline-block;
        padding: 12px 24px;
        font-size: 16px;
        background-color: #336699;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .add-details-button:hover {
        background-color: #25415d;
    }
        /* Your CSS styles */
        /* ... (existing styles) ... */
        
        /* Additional styles for the button */
        .add-details-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #336699;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-details-button:hover {
            background-color: #25415d;
        }
        .custom-button {
  border-radius: 8px;
  background-color: violet;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;}
  .before {
  border-radius: 8px;
  background-color: yellow;
  color: blue;
  padding: 10px 20px;
  border: none;
  cursor: pointer
  position:fixed;
}
  .right{
            position: fixed;
            top: 330px; /* Adjust the top position as needed */
            right: 20px; /* Adjust the right position as needed */
            border-radius: 8px;
            background-color: tomato;
            color: blue;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
}
    </style>
</head>
<body>

    
            <a href="searchpatientdetailsbefore.php">
<button class="before">BEFORE TREAT</button>
</a>
<a href="searchpatientdetailsafter.php">
<button class="right">AFTER TREAT</button>
</a>
        
    
    <div class="button">
        <div div class="button-container">
            <a href="home.php">
                <button class="custom-button">BACK TO HOME</button>
            </a>
        </div>
        <div class="container">
            <h2>DOCTORS' MANAGEMENT PANEL</h2>
            <form action="" method="POST">
                <!-- Your existing hospital selection form -->
                <div class="form-group">
                    <label for="hospital">Select Your Hospital:</label>
                    <select id="hospital" name="hospital">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "health";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT name FROM hospital";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hospitals available</option>";
                        }

                        $conn->close();
                        ?>
                    </select>
                </div>
                <input type="submit" name="submit_hospital" value="View Patients">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_hospital'])) {
                $selectedHospital = $_POST['hospital'];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "health";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM patient WHERE hospital = '$selectedHospital'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table border='1'>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>Sector</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>";

                    $counter = 1; // Counter for numbering patients

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$counter}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['province']}</td>
                            <td>{$row['district']}</td>
                            <td>{$row['sector']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                            
                            <td><a href='patientdetails.php?patient_id={$row['id']}' class='add-details-button'>Add Details</a></td>
                        </tr>";
                        $counter++;
                    
                    }

                    echo "</table>";
                } else {
                    echo "No patients found for this hospital.";
                }

                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
