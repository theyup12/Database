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
		 $query = "Select Classroom, Meet_Day, Begin_Time, End_Time, C_no, Title 
         from Sections INNER JOIN Courses ON Sections.C_no = Courses.Course_num where Prof_SSN =" . $_POST["SSN"]; 
		 echo "Debug:" . $query . "<br>";
		$result = $conn -> query($query);
		echo "<table>";
					echo "<tr>";
					echo "<td> Classroom <td> Meet Day <td> Begin Time 
                          <td> End Time<td> Course Number <td> Title";
					echo "</tr>";
		 	if ($result->num_rows > 0) {
			// output data of each row
				 while($row = $result->fetch_assoc()) {

				  echo "<tr>";
			  	  echo "<td>" .$row["Classroom"] ."</td><td>" .$row["Meet_Day"] ."</td><td>".$row["Begin_Time"] 
                      ."</td><td>". $row["End_Time"] ."</td><td>" . $row["C_no"] ."</td><td>". $row["Title"];
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