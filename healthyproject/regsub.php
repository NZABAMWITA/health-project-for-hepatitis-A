<!DOCTYPE html>
<html>
<head>
<style>




input[type="submit"] {
  background-color:blue;
  border-radius:40px;
  padding: 40px 40px;
  padding-left:100px;
  font-size: 25px; 
  justify-content: center;
  align-items: center;}
  .center-container {
        text-align: center;}
		 body {
        background-color:pink;}
		
     body {
        margin: 0;
        padding: 0;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background-color:;
    }
		
    
	
</style>


    <title>Submit Button Message</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
</head>
<body>
    <form id="myForm">
	<h1>  RE-PRESS SUBMIT TO REQUEST DATE </h1>
        <!-- Your form fields here -->
<div class="center-container">
        <div class="button-container">
            <input type="submit" value="SUBMIT">
        </div>
		</div>
	
    </form>

    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            // Display custom pop-up message
            Swal.fire({
                title: "PATIENT MESSAGE",
                text: "DEAR PATIENT WAIT FOR 30min TO CHECK YOUR SMS SENT ON YOUR  E-mail ICLUDING ALL",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>
</body>
</html>