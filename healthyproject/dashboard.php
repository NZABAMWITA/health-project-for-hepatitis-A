<!DOCTYPE html>
<html lang="en">
    <head><head>
    <!-- Existing code... -->
   
    <!-- Rest of your head section -->
</head>
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
</style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!--Boxicons-->
       <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- My css-->
        <link rel="stylesheet" href="dashbord.css">
        <title>Admin Hub</title>
    </head>
    <body>
        <!--SIDEBAR-->
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-smile'></i>
                <span class="text">AdminHub</span>
            </a>
            <ul class="side-menu top">
                <li class="active">
                <li>
                    <a href="#">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Admin pannel</span>
                    </a>
                </li>
               
               
                </li>
                               
                <li>
                    <a href="settings.html">
                        <i class='bx bxs-cog' ></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="logout">
                        <i class='bx bxs-log-out-circle' ></i>
                        <span class="text">Log out</span>
                    </a>
                    </li>
            </ul>
        </section>
        <!--SIDEBAR-->



        <!--CONTENT-->
        <section id="content">
            <!--NAVBAR-->
            <nav>
                <i class='bx bx-menu'></i>
                <a href="#" class="nav-link">Categories</a>
                <form action="#">
                    <div class="form-input">
                        <input type="search" placeholder="search....">
                        <button type="submit" class="search-btn"><i class='bx bx-search-alt-2' ></i></button>
                    </div>
                </form>
                 
                    
                
                 
                
                    
                
            </nav>
            <!--NAVBAR-->

            <!--MAIN---->
            <main>
                <!-- Add this inside the main section -->
<
<div class="button">
<div div class="button-container">
<a href="home.php">
<button class="custom-button">BACK TO HOME </button>
</a>
</div>
                <div class="head-title">
                    <div class="left">
                        <h1>Admin pannel</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">dashbord</a>
                            </li>
                            <li><i class='bx bxs-chevron-right' ></i></li>
                            <li>
                                <a class="active"href="#">Home</a>
                            </li>
                        </ul>
                    </div>
                     
                </div> 
				
                <ul class="box-info">
                    <li>
                        <i class='bx bxs-group' ></i>
                        <span class="text">
                        <div class="card">
  <h3 style="color:green">PATIENTS</h3>
  <ul>
    <li><a href="viewpatients.php">View All Patients</a></li>
    <li><a href="editpatients.php">Edit Patients</a></li>
    <li><a href="delpatients.php">Delete Patients</a></li>
  </ul>
</div>
                        </span>
						
						
                    </li>
					<a href="adding.html"></a>
                    <li>
                        <i class='bx bxs-group' ></i>
                        <span class="text">
                            <div class="card">
  <h3 style="color:blue">DOCTORS</h3>
  <ul>
    <li><a href="viewalldoctors.php">View All Doctors</a></li>
	
    <li><a href="adding.php">Add Doctor</a></li>
	</a>
    <li><a href="editdoctors.php">Edit Doctors</a></li>

    <li><a href="deletedoctor.php">Delete Doctors</a></li>
  </ul>
</div>
                    
                        </span>
                    </li>
					</a>
					<a href ="hosadd.php"></a>
                    <li>
                        <i class='bx bxs-group' ></i>
                        <span class="text">
                      <div class="card">
  <h3 style="color:red">HOSPITALS</h3>
  <ul>
    <li><a href="viewallhospitals.php">View All Hospitals</a></li>

    <li><a href="hosadd.php">Add Hospital</a></li>
    <li><a href="selecthospitalstobedited.php">Edit Hospitals</a></li>
    <li><a href="deletehospital.php">Delete Hospitals</a></li>
  </ul>
</div>
                        </span>
                    </li>
                    </a>
                    </ul>
                    <ul class="box-info">
                   
                   
                    
                    
                </ul>
                </div>
				
            </main>
        </section>
        <script src="dashbord.js"></script>
        <!--CONTENT-->
		
        
    </body>
</html>