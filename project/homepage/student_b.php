<html>
	<head>
		<title>CS332 Project</title>
		<style>
		table, td {
  		border: 1px solid black;}
		</style>
	</head>
	<body>
		<?php
		
		 $username = 'cs332a5'; 
		 $password = 'Ao5Ienei';
		 $servername = "localhost";
		 $dbname = 'cs332a5';
		 // Create connection
		 $conn = new mysqli($servername, $username, $password, $dbname);
 
		 // Check connection
		 if ($conn->connect_error) {
		   die("Connection failed: " . $conn->connect_error);
		   exit();
		 }
		 $query = "Select Fname, Lname, Title, Grade
         from Students INNER JOIN (Enrollments INNER JOIN 
         (Sections INNER JOIN Courses ON C_no = Course_num) 
         ON (Snum = Sno)) ON Enrollments.ECWID = Students.CWID 
         where Students.CWID = " . $_POST["CWID"]; 
		 //echo "Debug:" . $query . "<br>";
		$result = $conn -> query($query);
		echo "<table>";
					echo "<tr>";
					echo "<td> First Name <td> Last Name <td> Title 
						  <td> Grade";
					echo "</tr>";
		 	if ($result->num_rows > 0) {
			// output data of each row
				 while($row = $result->fetch_assoc()) {

				  echo "<tr>";
			  	  echo "<td>" .$row["Fname"] ."</td><td>" .$row["Lname"] ."</td><td>".$row["Title"] ."</td><td>". $row["Grade"];
				  echo "</tr>";
				
			
				}
		  	} else {
				echo "\n0 result";
		  	}
		echo '</table>';
		$result -> free_result();
		$conn->close($conn);
		?>
	</body>
        <br>
		<button type="button" onclick="history.back();">Go Back</button> 
</html>