<!DOCTYPE html>
<html>
<head>
	<title>Study Space - Processor</title>

	<!-- BootStrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Custom Fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">

	<!-- Custom CSS Stylesheet-->
	<link href="stylesheet.css" rel="stylesheet">

</head>

<body>
	<div class="mainHeader">
		<img src="MainPage.jpg">
		<div class="centerText"> UMD Study Spaces </div>
	</div> $
	<header>
			<a href="Home.html">Home</a>
			<a href="Location.html">Locations</a>
			<a href="Contact.html">Contact</a>
			<a href="Ratings.html">Ratings</a>
	</header>


<?php

$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="12341234";
$dbname="StudySpacesDB2";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

if($con)
{
	echo "<div id= 'ConnectionStatus'> Connection Successful! </div>";
}

$Quad = $_POST['Locations'];
$Noise = $_POST['Level'];
$Table = $_POST['Tables'];
$Time = $_POST['Times'];


if($Quad == "North Campus")
{
	$QuadValue = 1;
}

if($Quad == "South Campus")
{
	$QuadValue = 3;
}

if($Quad == "Central Campus")
{
	$QuadValue = 2;
}

if($Quad == "Off Campus")
{
	$QuadValue = 4;
}

if($Time == "")
{
	$query = "SELECT SpaceName, BuildingName, Restrooms, VendingMachines FROM StudySpaces JOIN Buildings ON StudySpaces.BuildingID = Buildings.BuildingID WHERE StudySpaces.LocationID = $QuadValue AND StudySpaces.NoiseLevel = '$Noise' AND StudySpaces.NumOfTables = '$Table'";
	if ($stmt = $con->prepare($query))
	{
    $stmt->execute();
    $stmt->bind_result($SpaceName, $BuildingName, $Restrooms, $VendingMachines);
		echo "A '1' indicates that the space possesses this feature";
		echo "</br>";
		echo "A '0' indicates that the space does not possess this feature";


		echo "<table>";
    while ($stmt->fetch())
		{
			echo "<th> Space Name </th><th> Building Name </th><th> Restrooms </th><th> Vending Machines </th>";
			echo "<tr><td>".$SpaceName."</td><td>".$BuildingName."</td><td>".$Restrooms."</td><td>".$VendingMachines."</td></tr>";
        //printf("%s, %s\n", $SpaceName, $BuildingName);
    }
		echo "</table>";

		if($stmt -> num_rows() == 0){
			echo "Sorry! No results were displayed! Try different parameters!";
		}


    $stmt->close();
	}
}

if($Time != "")
{
	$query = "SELECT SpaceName, BuildingName, Restrooms, VendingMachines FROM StudySpaces JOIN Buildings ON StudySpaces.BuildingID = Buildings.BuildingID WHERE StudySpaces.LocationID = $QuadValue AND StudySpaces.NoiseLevel = '$Noise' AND StudySpaces.NumOfTables = '$Table' AND StudySpaces.OperatingTime = '$Time'";
	if ($stmt = $con->prepare($query))
	{
    $stmt->execute();
    $stmt->bind_result($SpaceName, $BuildingName,$Restrooms, $VendingMachines);
		echo "A '1' indicates that the space possesses this feature";
		echo "</br>";
		echo "A '0' indicates that the space does not possess this feature";


		echo "<table>";
    while ($stmt->fetch())
		{
			echo "<th> Space Name </th><th> Building Name </th><th> Restrooms </th><th> Vending Machines </th>";
			echo "<tr><td>".$SpaceName."</td><td>".$BuildingName."</td><td>".$Restrooms."</td><td>".$VendingMachines."</td></tr>";
        //printf("%s, %s\n", $SpaceName, $BuildingName);
    }
		echo "</table>";

		if($stmt -> num_rows() == 0){
			echo "Sorry! No results were displayed! Try different parameters!";
		}
    $stmt->close();
	}
}

$con->close();


?>
</body>
</html>
