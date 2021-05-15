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
		 $query0 = "Select Title, Snum, Classroom, Meet_day, Begin_Time, End_Time, COUNT(ECWID) as Students_Enrolled
					from Enrollments INNER JOIN (Sections INNER JOIN Courses ON C_no = Course_num) 
					ON (Snum = Sno)
					where C_no = " .$_POST['Cno'] ." Group by Snum"; 
					//echo "Debug:" . $query0 . "<br>";
		$result = $conn -> query($query0);
		echo "<table>";
					echo "<tr>";
					echo "<td> Title <td> Section Number <td> Classroom 
						  <td> Meeting Day <td> Start Time <td> End Time 
						  <td> Student Enrolled</td>";
					echo "</tr>";
		 	if ($result->num_rows > 0) {
			// output data of each row
				 while($row = $result->fetch_assoc()) {

				  echo "<tr>";
			  	  echo "<td>" .$row["Title"] ."</td><td>" .$row["Snum"] ."</td><td>".$row["Classroom"] ."</td><td>". $row["Meet_day"] 
					."</td><td>".$row["Begin_Time"] ."</td><td>".$row["End_Time"] ."</td><td>".$row["Students_Enrolled"];
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