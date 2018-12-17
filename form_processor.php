<!DOCTYPE html>
<html>
<head>
	<title>Team Peer Evaluation - Processor</title>

	<style>
		div {
			margin-top: 20px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>

<?php
// The code to process recieved data from the form goes to here.

	$Name = $_POST['TeamName'];
	$StartTime = $_POST['Start'];
	$StopTime = $_POST['Stop'];
	$Member1 = $_POST['TeamMember1'];
	$Member2 = $_POST['TeamMember2'];
	$Member3 = $_POST['TeamMember3'];
	$Member4 = $_POST['TeamMember4'];
	$Member5 = $_POST['TeamMember5'];
	$Participation1 = $_POST['ParticipationLevel1'];
	$Participation2 = $_POST['ParticipationLevel2'];
	$Participation3 = $_POST['ParticipationLevel3'];
	$Participation4 = $_POST['ParticipationLevel4'];
	$Participation5 = $_POST['ParticipationLevel5'];
	$OverallGrade = $_POST['TeamGrade'];
	$Notes = $_POST['NoteSection'];

	if ($Participation1 == "Above and Beyond")
	{
		$Participation1Value = 3;
	}
	if ($Participation2 == "Above and Beyond")
	{
		$Participation2Value = 3;
	}
	if ($Participation3 == "Above and Beyond")
	{
		$Participation3Value = 3;
	}
	if ($Participation4 == "Above and Beyond")
	{
		$Participation4Value = 3;
	}
	if ($Participation5 == "Above and Beyond")
	{
		$Participation5Value = 3;
	}
	if ($Participation1 == "Satisfactory")
	{
		$Participation1Value = 2;
	}
	if ($Participation2 == "Satisfactory")
	{
		$Participation2Value = 2;
	}
	if ($Participation3 == "Satisfactory")
	{
		$Participation3Value = 2;
	}
	if ($Participation4 == "Satisfactory")
	{
		$Participation4Value = 2;
	}
	if ($Participation5 == "Satisfactory")
	{
		$Participation5Value = 2;
	}
	if ($Participation1 == "Unsatisfactory")
	{
		$Participation1Value = 1;
	}
	if ($Participation2 == "Unsatisfactory")
	{
		$Participation2Value = 1;
	}
	if ($Participation3 == "Unsatisfactory")
	{
		$Participation3Value = 1;
	}
	if ($Participation4 == "Unsatisfactory")
	{
		$Participation4Value = 1;
	}
	if ($Participation5 == "Unsatisfactory")
	{
		$Participation5Value = 1;
	}
	if ($Participation1 == "Absent")
	{
		$Participation1Value = 0;
	}
	if ($Participation2 == "Absent")
	{
		$Participation2Value = 0;
	}
	if ($Participation3 == "Absent")
	{
		$Participation3Value = 0;
	}
	if ($Participation4 == "Absent")
	{
		$Participation4Value = 0;
	}
	if ($Participation5 == "Absent")
	{
		$Participation5Value = 0;
	}

	if($OverallGrade == "A")
	{
		$OverallGradeValue = 5;
	}
	if($OverallGrade == "B")
	{
		$OverallGradeValue = 4;
	}
	if($OverallGrade == "C")
	{
		$OverallGradeValue = 3;
	}
	if($OverallGrade == "D")
	{
		$OverallGradeValue = 2;
	}
	if($OverallGrade == "E")
	{
		$OverallGradeValue = 1;
	}
	if($OverallGrade == "F")
	{
		$OverallGradeValue = 0;
	}

	if($Notes == "Enter Notes Here")
	{
		$Notes = "There were no notes added.";
	}

	$IndividualGrade1 = ((($Participation1Value*$OverallGradeValue)/15)*100);
	$IndividualGrade2 = ((($Participation2Value*$OverallGradeValue)/15)*100);
	$IndividualGrade3 = ((($Participation3Value*$OverallGradeValue)/15)*100);
	$IndividualGrade4 = ((($Participation4Value*$OverallGradeValue)/15)*100);
	$IndividualGrade5 = ((($Participation5Value*$OverallGradeValue)/15)*100);


	$date1 = date_create($StartTime);
	$date2 = date_create($StopTime);

	$PresentationTime = date_diff($date1, $date2);




	echo "The team name is $Name. ";
	echo "<br>";
	echo "The team started at $StartTime and ended at $StopTime. ";
	echo "<br>";
	echo "The total presentation time was ";
	echo $PresentationTime->format('%h hours and ');
	echo $PresentationTime->format('%i minutes.');
	echo "<br>";
	echo "Member 1 was $Member1 and had a particpation level of $Participation1. ";
	echo "<br>";

	if($Member2 == "")
	{
		echo "There was not a second team member.";
		echo "<br>";
	}
	if($Member2 != "")
	{
		echo "Member 2 was $Member2 and had a particpation level of $Participation2. ";
		echo "<br>";
	}
	if($Member3 == "")
	{
		echo "There was not a third team member.";
		echo "<br>";
	}
	if($Member3 != "")
	{
		echo "Member 3 was $Member3 and had a particpation level of $Participation3. ";
		echo "<br>";
	}
	if($Member4 == "")
	{
		echo "There was not a fourth team member.";
		echo "<br>";
	}
	if($Member4 != "")
	{
		echo "Member 4 was $Member4 and had a particpation level of $Participation4. ";
		echo "<br>";
	}
	if($Member5 == "")
	{
		echo "There was not a fifth team member.";
		echo "<br>";
	}
	if($Member5 != "")
	{
		echo "Member 3 was $Member5 and had a particpation level of $Participation5. ";
		echo "<br>";
	}

	echo "The notes for the team presentation were the following: ";
	echo "$Notes";
	echo "<br>";

	echo "Member 1 had an individual grade of $IndividualGrade1%";
	echo "<br>";
	echo "Member 2 had an individual grade of $IndividualGrade2%";
	echo "<br>";
	echo "Member 3 had an individual grade of $IndividualGrade3%";
	echo "<br>";
	echo "Member 4 had an individual grade of $IndividualGrade4%";
	echo "<br>";
	echo "Member 5 had an individual grade of $IndividualGrade5%";
	echo "<br>";

	echo "The final grade for this team is $OverallGrade. ";

?>
</body>
</html>
