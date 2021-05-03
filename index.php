<?php
//include connect file
include('connect.php');
//render data to browser
$sql = "SELECT * FROM details";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<table>";
			echo "<tr>";
				echo "<th>Company Name</th>";
				echo "<th>ROC Number</th>";
				echo "<th>GST Number</th>";
				echo "<th>PAN Number</th>";
				echo "<th>Phone Number</th>";
				echo "<th>Address</th>";
			echo "</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
				echo "<td>". $row['Company_Name']."</td>";
				echo "<td>". $row['ROC_Number']."</td>";
				echo "<td>". $row['GST_Number']."</td>";
				echo "<td>". $row['PAN_Number']."</td>";
				echo "<td>". $row['Phone_Number']."</td>";
				echo "<td>". $row['Address']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		//Free result set
		mysqli_free_result($result);
	}else{
		echo "No records matching your query were found.";
	}
}else{
		echo "ERROR: Could not able to execute $sql.".mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>

	
	<?php include('header.php'); ?>
	<?php include('footer.php'); ?>


