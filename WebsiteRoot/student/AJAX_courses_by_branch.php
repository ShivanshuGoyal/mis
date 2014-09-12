<?php
	require_once("../Includes/Auth.php");
	auth('deo');
	require_once("connectDB.php");
	
	$branch=$_GET['branch'];
	$year=$_GET['year'];
	$year = substr($year,0,4);
	$stuquery=mysql_query("SELECT id,name FROM courses,course_branch WHERE id=course_id AND branch_id='".$branch."' AND YEAR= '".$year."'");
	if(mysql_num_rows($stuquery)==0)
	{
		echo '<td>No Courses in the Department</td>';
	}
	else
	{
		echo '<td><select id="course_id" name="course_id" required>';
		if($row=mysql_fetch_row($stuquery))
				echo '<option value="'.$row[0].'" selected="selected">'.$row[1].'</option>';
		while($row=mysql_fetch_row($stuquery))
		{
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		echo '</select></td>';
	}
	mysql_close();
?>