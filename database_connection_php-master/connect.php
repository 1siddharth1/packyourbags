<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$quantity = $_POST['quantity'];
	$password = $_POST['password'];
	$interest = $_POST['interest'];
	$feedback = $_POST['feedback'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, quantity, password,interest,feedback) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $email, $quantity, $password, $interest,$feedback);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>