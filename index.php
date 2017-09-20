<!DOCTYPE html>
<html lang="en">
<head>
	<title>mfec</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script src="js/script.js"></script>
	<script src="js/testf.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
<?php
$db_server = "localhost"; // hostname ของ database server
$db_user = "root"; // username
$db_pass = ""; // password
$db_src = "sparkbot"; // ชื่อฐานข้อมูล
 
$db = new mysqli( $db_server , $db_user , $db_pass, $db_src );

if ( $db->connect_errno ) {
 echo "Failed to connect to MySQL: " . $db->connect_error;
}
$sql = "SELECT * FROM `tank` ";

$result = mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$atank=$row['capacity'];
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$btank= $row['capacity'];
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$ctank= $row['capacity'];

?>
	
	<BODY onLoad="starta();startb();startc();">

	<div class="container" style="margin-top:20px">
		<div class="row">
			<div class="page-header">
				<h1>Water level control<small> by mfec</small></h1>
			</div>
		</div>
	</div>
 
	<div class="container"style="margin-top:20px">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Show water level</div>
					<div class="panel-body">
					
						<div class="col-md-4">
							<div class="panel panel-default">
							<div class="panel-heading">Tank A </div>
							<div class="panel-body">
							
							<img src ="img/full_n.png" id="tanka" width="170px" hight="200px">
							
							</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="panel panel-default">
							<div class="panel-heading">Tank B </div>
							<div class="panel-body">
							
								<img src ="img/min_n.png" id="tankb" width="170px" hight="200px">
									
							</div>
							</div>
						</div>
						
						
						<div class="col-md-4">
							<div class="panel panel-default">
							<div class="panel-heading">Tank C </div>
							<div class="panel-body">
							
							<img src ="img/low_n.png" id="tankc" width="170px" hight="200px">	
								
							</div>
							</div>
						</div>
					
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Control panel</div>
						<div class="panel-body">
							<div class="col-md-12">
							<div class="panel panel-primary">
							<div class="panel-heading">Tank A </div>
							<div class="panel-body">
							
								<!--<button> </button> -->
								<p align="center">
								<button style="margin-top:5px" class="btn btn-success" onclick="uafull();tankAfull();" type="butt"> full </button>
								<button style="margin-top:5px" class="btn btn-warning" onclick="uamin();tankAmi();"  type="butt"> Medium </button>	
								<button style="margin-top:5px" class="btn btn-danger" onclick="ualow();tankAlow();" type="butt"> Low </button>
								
							</div>
							</div>
							</div>
							
							<div class="col-md-12">
							<div class="panel panel-primary">
							<div class="panel-heading">Tank B </div>
							<div class="panel-body">
							
							<!--<button> </button> -->
								<p align="center">
								<button style="margin-top:5px" class="btn btn-success" onclick="ubfull();tankBfull();;" type="butt"> full  </button>
								<button style="margin-top:5px" class="btn btn-warning"  onclick="ubmin();tankBmi();" type="butt"> Medium  </button>
								<button style="margin-top:5px"  class="btn btn-danger" onclick="ublow();tankBlow();" type="butt"> Low  </button>
							</div>
							</div>
							</div>
							
							<div class="col-md-12">
							<div class="panel panel-primary">
							<div class="panel-heading">Tank C </div>
							<div class="panel-body">
							
							<!--<button> </button> -->
								<p align="center">
								<button style="margin-top:5px" class="btn btn-success" onclick="ucfull();tankCfull();" type="butt"> full  </button>
								<button style="margin-top:5px"  class="btn btn-warning" onclick="ucmin();tankCmi();"  type="butt"> Medium  </button>
								<button style="margin-top:5px"  class="btn btn-danger" onclick="uclow();tankClow();" type="butt"> Low  </button>
								
							</div>
							</div>
							</div>
							
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
<script>

function starta(){
var sa="<?php echo $atank; ?>";
var sb="<?php echo $btank; ?>";
var sc="<?php echo $ctank; ?>";
if (sa=='1'){
	return document.getElementById("tanka").src = "img/low_n.png";
}
if (sa=='2'){
	return document.getElementById("tanka").src = "img/min_n.png";
}
if (sa=='3'){
	return document.getElementById("tanka").src = "img/full_n.png"; 
}

}

function startb(){
var sa="<?php echo $btank; ?>";
if (sa=='1'){
	return document.getElementById("tankb").src = "img/low_n.png";
}
if (sa=='2'){
	return document.getElementById("tankb").src = "img/min_n.png";
}
if (sa=='3'){
	return document.getElementById("tankb").src = "img/full_n.png"; 
}
}

function startc(){
var sa="<?php echo $ctank; ?>";
if (sa=='1'){
	return document.getElementById("tankc").src = "img/low_n.png";
}
if (sa=='2'){
	return document.getElementById("tankc").src = "img/min_n.png";
}
if (sa=='3'){
	return document.getElementById("tankc").src = "img/full_n.png"; 
}
}





function ualow(){
	$.get("alow.php");
	return false;
}
function uafull(){
	$.get("afull.php");
	return false;
}
function uamin(){
$.get("amin.php");
	return false;
}

function ublow(){
$.get("blow.php");
	return false;
}
function ubfull(){
$.get("bfull.php");
	return false;
}
function ubmin(){
$.get("bmin.php");
	return false;
}

function uclow(){
$.get("clow.php");
	return false;
}
function ucfull(){
$.get("cfull.php");
	return false;
}
function ucmin(){
$.get("cmin.php");
	return false;
}

</script>
</html>
