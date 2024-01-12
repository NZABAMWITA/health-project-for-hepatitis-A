
<!DOCTYPE html>
<html>
<head>
    <title>CHOICE OF PATIENTS </title>
    <style>
        /* CSS styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
		 .button-container button {
    margin-right: 100px}
	.custom-button {
  .section {
            margin-bottom: 400px;
            padding: 200px;
            background-color: #f2f2f2;}
    </style>
</head>
<body>
<div class="section">
<h1 style='color:blue'>   YOU  CAN CHECK THE LIST OF PATIENTS THAT CHOOSEN YOUR HOSPITAL </h1>
</div>
<div class="button-container">
    <button  class onclick="showTable('CHUK');custom-button">CHUK</button>
    <button onclick="showTable('CHUB')">CHUB</button>
    <button onclick="showTable('MUSANZE HOP')">MUSANZE HOP</button>
    <button onclick="showTable('NYAGATARE HOP')">NYAGATARE HOP</button>
    <button onclick="showTable('RUSIZI HOP')">RUSIZI HOP</button>
	<img src="CHUK.PNG"width="900px"height="200px">

</div>

    <div id="tableContainer"></div>

    <script>
        // Function to display the table based on the clicked button
        function showTable(buttonName) {
            // Define the data for each button
            var buttonData = {
                'CHUK': [
                    ],
                'CHUB': [
                    ],
                'MUSANZE HOP': [
                   ],
                'NYAGATARE HOP': [
                 ],
                'RUSIZI HOP': [
                    
                ]
            };

            // Retrieve the data for the clicked button
            const data = buttonData[buttonName];

            // Generate the HTML table
            let tableHTML = '<table>';
            tableHTML += '<tr><th>Name</th><th>Location</th><th>Age</th><th>Gender</th><th>Times</th><th>Numbers</th></tr>';
            for (let i = 0; i < data.length; i++) {
                tableHTML += '<tr>';
                tableHTML += '<td>' + data[i].name + '</td>';
                tableHTML += '<td>' + data[i].location + '</td>';
                tableHTML += '<td>' + data[i].age + '</td>';
                tableHTML += '<td>' + data[i].gender + '</td>';
                tableHTML += '<td>' + data[i].times + '</td>';
                tableHTML += '<td>' + data[i].numbers.join(', ') + '</td>';
                tableHTML += '</tr>';
            }
            tableHTML += '</table>';

            // Display the table in the container div
            document.getElementById('tableContainer').innerHTML = tableHTML;
           }
    </script>
</body>
</html>