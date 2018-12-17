<!DOCTYPE html>
<html>

<head>
    <title> University of Maryland Study Spaces </title>
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


$BuildingNames = $_POST['Buildings'];

if($BuildingNames == "")
{
  $query = "SELECT BuildingName, Rating, Users_UserID FROM Ratings";
    if ($stmt = $con->prepare($query))
    {
      $stmt->execute();
      $stmt->bind_result($BuildingName, $Rating, $Users_UserID);

      echo "<table>";
      while ($stmt->fetch())
      {
      echo "<th> Building Name </th><th> Rating </th><th> UserID </th>";
      echo "<tr><td>".$BuildingName."</td><td>".$Rating."</td><td>".$Users_UserID."</td></tr>";
        //printf("%s, %s, %s\n", $BuildingName, $Rating, $Users_UserID);
      }
      echo "</table>";

      if($stmt -> num_rows() == 0)
      {
			     echo "Sorry! No results were displayed! Try different parameters!";
      }
    $stmt->close();
    }
}

if($BuildingNames != "")
{
  $query = "SELECT BuildingName, Rating, Users_UserID FROM Ratings WHERE BuildingName = '$BuildingNames'";
    if ($stmt = $con->prepare($query))
    {
      $stmt->execute();
      $stmt->bind_result($BuildingName, $Rating, $Users_UserID);

      echo "<table>";
      while ($stmt->fetch())
      {
      echo "<th> Building Name </th><th> Rating </th><th> UserID </th>";
      echo "<tr><td>".$BuildingName."</td><td>".$Rating."</td><td>".$Users_UserID."</td></tr>";
        //printf("%s, %s, %s\n", $BuildingName, $Rating, $Users_UserID);
      }
      echo "</table>";

      if($stmt -> num_rows() == 0)
      {
			     echo "Sorry! No results were displayed! Try different parameters!";
      }
    $stmt->close();
    }
}

?>

  </body>
  </html>
