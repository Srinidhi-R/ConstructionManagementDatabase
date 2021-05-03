<?php
	//include the connection file
	include('connect.php');
	//initialize all fields
	$ROCNo = $GSTNo = $PANNo = $Address = $Name = $Phone = '';
	//Initialize associative array for storing errors
	$errors = array('ROCNo' => '', 'GSTNo' => '', 'PANNo' => '', 'Address' => '', 'Name' => '', 'Phone' => '');
	//check validation of every entry
	if(isset($_POST['submit'])){
		//check ROCNo
		if(empty($_POST['ROCNo'])){
			$errors['ROCNo'] = 'A ROC Number is required';
		}
		else{
			$ROCNo= $_POST['ROCNo'];
			if(!preg_match('/^[a-zA-Z0-9]+/',$ROCNo)){
				$errors['ROCNo']='Invalid';
			}
		}
	

	//check GSTNo
	if(empty($_POST['GSTNo'])){
			$errors['GSTNo'] = 'A GST Number is required';
		}
	//check PAN 
	if(empty($_POST['PANNo'])){
			$errors['PANNo'] = 'A PAN Number is required';
		}
	//check company name
	if(empty($_POST['Name'])){
			$errors['Name'] = 'Company name is required';
		}
	else{
		$Name = $_POST['Name'];
		if(!preg_match('/^[a-zA-Z\s]+$/',$Name)){
			$errors['Name'] = 'Name must be letters and spaces only';
		}
	}
	// check phone number
	if(empty($_POST['Phone'])){
			$errors['Phone'] = 'A Phone Number is required';
		}
	// check address
	if(empty($_POST['Address'])){
			$errors['Address'] = 'Address is required';
		}
	}
	//check errors
	if(array_filter($errors))
	{

	}
	//save to database if no errors are found
	else
	{
	//escape user inputs for security
	$ROCNo = mysqli_real_escape_string($link,$_POST['ROCNo']);
	$Name = mysqli_real_escape_string($link,$_POST['Name']);
	$Phone = mysqli_real_escape_string($link,$_POST['Phone']);
	$GSTNo = mysqli_real_escape_string($link,$_POST['GSTNo']);
	$PANNo = mysqli_real_escape_string($link,$_POST['PANNo']);
	$Address = mysqli_real_escape_string($link,$_POST['Address']);
	//Attempt insert query execution
	$sql = "INSERT INTO details (ROC_Number, Company_Name, GST_Number, PAN_Number, Phone_Number, Address) values ('$ROCNo','$Name','$GSTNo','$PANNo','$Phone','$Address')";
	if(mysqli_query($link,$sql)){
		echo "Records added successfully.";
	}
	else{
		echo "ERROR: Could not be able to execute $sql.".mysqli_error($link);
	}
	}
//close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
	<!--include header file-->
	<?php include('header.php');?>
	<!--create form-->
	<section class="container black-text">
		<h4 class="center">Enter company details</h4>
		<form class="white" action="form.php" method="POST">
			<label>ROC Number</label>
			<input type="text" name="ROCNo" value="<?php echo htmlspecialchars($ROCNo)?>">
			<div class="red-text"><?php echo $errors['ROCNo']; ?></div>

			<label>Company Name</label>
			<input type="text" name="Name" value="<?php echo htmlspecialchars($Name)?>">
			<div class="red-text"><?php echo $errors['Name']; ?></div>

			<label>GST Number</label>
			<input type="text" name="GSTNo" value="<?php echo htmlspecialchars($GSTNo)?>">
			<div class="red-text"><?php echo $errors['GSTNo']; ?></div>

			<label>PAN Number</label>
			<input type="text" name="PANNo" value="<?php echo htmlspecialchars($PANNo)?>">
			<div class="red-text"><?php echo $errors['PANNo']; ?></div>

			<label>Address</label>
			<input type="text" name="Address" value="<?php echo htmlspecialchars($Address)?>">
			<div class="red-text"><?php echo $errors['Address']; ?></div>

			<label>Phone Number</label>
			<input type="text" name="Phone" value="<?php echo htmlspecialchars($Phone)?>">
			<div class="red-text"><?php echo $errors['Phone']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<!--include footer file-->
	<?php include('footer.php')?>
</html>
