<?php 


include '../dbconnection.php';
	$conn = OpenCon();

	$id = 0;
	$update = false;
	$fullname = '';
	$email = '';
	$address = '';
	$location = '';
	$role = '';
	$phone = '';
	$city = '';
	$state = '';
	$mr_password = '';

if (isset($_POST['submit'])){

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$role = $_POST['role'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$mr_password = $_POST['mr_password'];

	
	$conn->query("INSERT INTO tbl_add_mr (fullname, email, address, location, role, phone, city, state, mr_password) VALUES('$fullname', '$email', '$address', '$location', '$role', '$phone', '$city', '$state', '$mr_password')") or die($conn->error);

	$_SESSION['message'] = "Record has been Saved!";
	$_SESSION['msg_type'] = "Success";
	header("location: view_gift_item.php");
	
}


if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$conn->query("DELETE FROM tbl_add_mr WHERE id=$id") or die($conn->error());

	$_SESSION['message'] = "Record has been Deleted!";
	$_SESSION['msg_type'] = "Danger";

	header("location: view_assign_mr.php");
}

if (isset($_GET['edit'])){

		$id = $_GET['edit'];
		$update = true;
		$result = $conn->query("SELECT * FROM tbl_add_mr WHERE id=$id") or die($conn->error());

		if (count($result)==1){
			$row = $result->fetch_array();

			$fullname = $row['fullname'];
			$email = $row['email'];
			$address = $row['address'];
			$location = $row['location'];
			$role = $row['role'];
			$phone = $row['phone'];
			$city = $row['city'];
			$state = $row['state'];
			
		}
		}



if (isset($_POST['update'])){
	$id	= $_POST['id'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$role = $_POST['role'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$mr_password = $_POST['mr_password'];


	$conn->query("UPDATE tbl_add_mr SET fullname='$fullname', email='$email', address='$address', location='$location', role='$role', phone='$phone', city='$city', state='$state', mr_password='$mr_password' WHERE id=$id") or die($conn->error());

		$_SESSION['message'] = "Record has been Updated!";
		$_SESSION['msg_type'] = "Warning";
		header("location: view_assign_mr.php");


}


CloseCon($conn);
?>
<?php 



include '../dbconnection.php';
	$conn = OpenCon();
	
	$id = 0;
	$update = false;
	$productname = '';
	$received = '';
	$stockin = '';
	$cost = '';
	$availability = '';
	

if (isset($_POST['submit'])){

	$productname = $_POST['productname'];
	$received	 = $_POST['received'];
	$stockin 	 = $_POST['stockin'];
	$cost        = $_POST['cost'];
	$availability = $_POST['availability'];

	
	$conn->query("INSERT INTO tbl_add_gift (productname, received, stockin, cost, availability) VALUES('$productname', '$received', '$stockin', '$cost', '$availability')") or die($conn->error);

	$_SESSION['message'] = "Record has been Saved!";
	$_SESSION['msg_type'] = "Success";
	header("location: view_assign_mr.php");
	
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$conn->query("DELETE FROM tbl_add_gift WHERE id=$id") or die($conn->error());

	$_SESSION['message'] = "Record has been Deleted!";
	$_SESSION['msg_type'] = "Danger";

	header("location: view_assign_mr.php");
}

if (isset($_GET['edit'])){

		$id = $_GET['edit'];
		$update = true;
		$result = $conn->query("SELECT * FROM tbl_add_gift WHERE id=$id") or die($conn->error());

		if (count($result)==1){
			$row = $result->fetch_array();

			$productname = $row['productname'];
			$received = $row['received'];
			$stockin = $row['stockin'];
			$cost = $row['cost'];
			$availability = $row['availability'];
			
		}
		}
if (isset($_POST['update'])){
	$id	= $_POST['id'];
	$productname = $_POST['productname'];
	$received	 = $_POST['received'];
	$stockin 	 = $_POST['stockin'];
	$cost        = $_POST['cost'];
	$availability = $_POST['availability'];



	$conn->query("UPDATE tbl_add_gift SET productname='$productname', received='$received', stockin='$stockin', cost='$cost', availability='$availability' WHERE id=$id") or die($conn->error());

		$_SESSION['message'] = "Record has been Updated!";
		$_SESSION['msg_type'] = "Warning";
		header("location: view_assign_mr.php");


}


CloseCon($conn);
?>
