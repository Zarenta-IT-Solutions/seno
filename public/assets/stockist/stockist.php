<?php 

include '../dbconnection.php';
	$conn = OpenCon();
	
	$id = 0;
	$update = false;
	$sfullname = '';
	$email = '';
	$shopname = '';
	$address = '';
	$location = '';
	$role = '';
	$phone = '';
	$city = '';
	$state = '';
	$s_password = '';
	

if (isset($_POST['submit'])){

	$sfullname = $_POST['sfullname'];
	$email = $_POST['email'];
	$shopname = $_POST['shopname'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$role = $_POST['role'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$s_password = $_POST['s_password'];
	
	$conn->query("INSERT INTO tbl_add_stockist (sfullname, email, shopname, address, location, role, phone, city, state, s_password) VALUES('$sfullname', '$email', '$shopname', '$address', '$location', '$role', '$phone', '$city', '$state', '$s_password')") or die($conn->error);

	$_SESSION['message'] = "Record has been Saved!";
	$_SESSION['msg_type'] = "Success";
	header("location: update_delete_stockist.php");
	
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$conn->query("DELETE FROM tbl_add_stockist WHERE id=$id") or die($conn->error());

	$_SESSION['message'] = "Record has been Deleted!";
	$_SESSION['msg_type'] = "Danger";

	header("location: update_delete_stockist.php");
}

if (isset($_GET['edit'])){

		$id = $_GET['edit'];
		$update = true;
		$result = $conn->query("SELECT * FROM tbl_add_stockist WHERE id=$id") or die($conn->error());

		if (count($result)==1){
			$row = $result->fetch_array();

			$sfullname = $row['sfullname'];
			$email = $row['email'];
			$shopname = $row['shopname'];
			$address = $row['address'];
			$location = $row['location'];
			$role = $row['role'];
			$phone = $row['phone'];
			$city = $row['city'];
			$state = $row['state'];
			$s_password = $row['s_password'];
			
		}
		}
if (isset($_POST['update'])){
	$id	= $_POST['id'];
	$sfullname = $_POST['sfullname'];
	$email = $_POST['email'];
	$shopname = $_POST['shopname'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$role = $_POST['role'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$s_password = $_POST['s_password'];


	$conn->query("UPDATE tbl_add_stockist SET sfullname='$sfullname', email='$email', shopname='$shopname', address='$address', location='$location', role='$role', phone='$phone', city='$city', state='$state', s_password='$s_password' WHERE id=$id") or die($conn->error());

		$_SESSION['message'] = "Record has been Updated!";
		$_SESSION['msg_type'] = "Warning";
		header("location: update_delete_stockist.php");


}


CloseCon($conn);
?>
