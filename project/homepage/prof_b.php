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
		 $query = "select Course_num, Title, Grade, COUNT(Grade) As num_students
                  from (Enrollments INNER JOIN 
                  (Courses INNER JOIN Sections ON Sections.C_no = Course_num) 
                  ON Enrollments.Sno = Sections.Snum)
                  where C_no =" .$_POST["C_no"] . " and Sno = " .$_POST["S_no"] 
                  . " GROUP BY (Grade)";
		 //echo "Debug:" . $query . "<br>";
		$result = $conn -> query($query);
		echo "<table>";
					echo "<tr>";
					echo "<td> Course number <td> Course Name <td> Grade <td> # Students";
					echo "</tr>";
		 	if ($result->num_rows > 0) {
			// output data of each row
				 while($row = $result->fetch_assoc()) {

				  echo "<tr>";
			  	  echo "<td>" .$row["Course_num"] ."</td><td>" .$row["Title"] ."</td><td>".$row["Grade"] 
                      ."</td><td>". $row["num_students"];
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