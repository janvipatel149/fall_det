
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST["email"];
$details = $_POST["details"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$age = $_POST["age"];
$bday =$_POST["bday"];
$gender = $_POST["gender"];
$subject = $_POST["subject"];

if(!empty($name) || !empty($email) || !empty($details) || !empty($password) || !empty($cpassword) || !empty($age) ! ||empty($bday) || !empty($gender) || !empty($subject))
{
	$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "db1";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_error()) {
    die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else {
	$SELECT = "Select email from register where email = ? limit 1";
	$INSERT = "INSERT INTO register (name ,email,details , password,cpassword, age,bday,gender,subject)VALUES (?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($SELECT);
	$stmt->bind_param("ss",$email);
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->store_result();
	$rnum=$stmt->num_rows;

	if($rnum == 0) {
		$stmt->close();

		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("sssssiiss",$name,$email,$details,$password,$cpassword,$age,$bday,$gender,$subject);
		$stmt->execute();
		echo "New record created successfully";
	} else {
		echo  " someone already register using this email";
	}
	$stmt->close();
	$conn->close();
}


} else
{
	echo "all field are required";
	die();
}


 ?>