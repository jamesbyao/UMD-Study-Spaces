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
	</div>
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
$password="";
$dbname="StudySpacesDB2";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

#if($con)
#{
#	echo "Connection Successful!";
#}

$FirstName = $_POST['first-name'];
$LastName = $_POST['last-name'];
$Handle = $_POST['handle'];
$BuildingName = $_POST['Buildings'];
$Rating = $_POST['Ratings'];

if($BuildingName == "Stem Library")
{
	$BuildingID = 1;
}
if($BuildingName == "Smith Performing Arts Center")
{
	$BuildingID = 2;
}
if($BuildingName == "Engineering Building")
{
	$BuildingID = 3;
}
if($BuildingName == "Stamp Student Union")
{
	$BuildingID = 4;
}
if($BuildingName == "Hornbake Library")
{
	$BuildingID = 5;
}
if($BuildingName == "Chemistry Building")
{
	$BuildingID = 6;
}
if($BuildingName == "Moxley Gardens at Alumni Center")
{
	$BuildingID = 7;
}
if($BuildingName == "Edward St. John (ESJ)")
{
	$BuildingID = 8;
}
if($BuildingName == "McKeldin Library")
{
	$BuildingID = 9;
}
if($BuildingName == "Art Building")
{
	$BuildingID = 10;
}
if($BuildingName == "Benjamin Building")
{
	$BuildingID = 11;
}
if($BuildingName == "Tawes Hall")
{
	$BuildingID = 12;
}
if($BuildingName == "Peace and Friendship Garden")
{
	$BuildingID = 13;
}
if($BuildingName == "Buildings with Classroom Space")
{
	$BuildingID = 14;
}
if($BuildingName == "Architecture Library")
{
	$BuildingID = 15;
}
if($BuildingName == "Memorial Chapel Garden")
{
	$BuildingID = 16;
}
if($BuildingName == "LeFrak Hall")
{
	$BuildingID = 17;
}
if($BuildingName == "Niels Bohr Library")
{
	$BuildingID = 18;
}
if($BuildingName == "Hyattsville Public Library")
{
	$BuildingID = 19;
}
if($BuildingName == "Starbucks")
{
	$BuildingID = 20;
}
if($BuildingName == "Vigilante Coffee")
{
	$BuildingID = 21;
}

if($FirstName != "" && $LastName != "" && $Handle != "")
{
		$query = "SELECT UserHandle FROM Users WHERE UserHandle = '$Handle'";
		if ($result= mysqli_query($con,$query))
		{
			$num_rows = mysqli_num_rows($result);

					if($num_rows == 0)
					{
						$sql = "INSERT INTO Users (UserFirstName, UserLastName, UserHandle) VALUES ('$FirstName', '$LastName', '$Handle')";
						if(mysqli_query($con, $sql)){
						    echo "Records inserted successfully.";
							}

						if($BuildingName != "" && $Rating != "")
						{
							$newUserID = $con->insert_id;
							$sql = "INSERT INTO Ratings (Rating, BuildingName, Users_UserID, BuildingID) VALUES ('$Rating', '$BuildingName','$newUserID','$BuildingID')";
							if(mysqli_query($con, $sql))
							{
								echo "Records inserted successfully.";
							}
							else{
									    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
									}

						}
					}

					if($num_rows != 0)
					{
						if($BuildingName != "" && $Rating != "")
						{
								$sql = "SELECT UserID FROM Users WHERE UserHandle = '$Handle'";
								$result1 = $con->query($sql);
								$row1 = $result1->fetch_object();
								$UserID = $row1->UserID;


									$sql1 = "INSERT INTO Ratings (Rating, BuildingName, Users_UserID, BuildingID) VALUES ('$Rating', '$BuildingName','$UserID','$BuildingID')";
									if(mysqli_query($con, $sql1))
									{
										echo "Records inserted successfully.";
									}
									else{
											    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($con);
											}

							}
						}
					}
		}

?>
</body>
</html>
