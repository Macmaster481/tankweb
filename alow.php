<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connect</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script src="js/script.js"></script>
	<script src="js/testf.js"></script>
</head>
<body>
	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sparkbot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE `tank` SET `capacity`=1 WHERE Tankname='a'";



if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<script type="text/javascript">

window.close();
</script>

</body>
</html>
