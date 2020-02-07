<?php
/*$username = $_POST["username"];
$password = $_POST["password"];
if (!empty($username) || (!empty($password)){


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";






$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO sample(username,password)
VALUES (?,?)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

else
{
	echo "all field are required";
	die();
}*/ 
$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$dbusername = "root";
$dbpassword = " root";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

$stmt = $conn->prepare("INSERT INTO sample (username,password)
VALUES (?,?)");
$stmt->bind_param("ss",$username , $password);
$stmt->execute();
echo "registration successfully...";
$stmt->close();


$conn->close();
}

?>
