<?php
//error_reporting(0);
include_once 'connection.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $student_no = $_POST['student_no'];
 $Reg_No = $_POST['Reg_No'];
 $student_fname = $_POST['student_fname'];
 $student_lname = $_POST['student_lname'];
 $Data_Structures_and_Algorithms = $_POST['Data_Structures_and_Algorithms'];
 $Artificial_Intelligence = $_POST['Artificial_Intelligence'];
 $Computer_Networks = $_POST['Computer_Networks'];
 $Discrete_Mathematics = $_POST['Discrete_Mathematics'];
 $Formal_Methods_Software_Engineering = $_POST['Formal_Methods_Software_Engineering'];


  /***************************************calculating the GPA of semester one*************/
  $GPA=0;
  $sum=0;
 /***Defining the constants for the grade marks*********/
      define('A', '5');
      define('B+', '4.5');
      define('B', '4');
      define('C+', '3.5');
      define('C', '3');
      define('D+', '2.5');
      define('D', '2');
      define('E+', '1.5');
      define('E', '1');
    $gradeMarks=array(  $Data_Structures_and_Algorithms,$Artificial_Intelligence, $Computer_Networks, $Discrete_Mathematics , $Formal_Methods_Software_Engineering);
  for ($i=0; $i<5; $i++){

  if($i==3){
    if($gradeMarks[$i]>79 && $gradeMarks[$i]<=100 ){
    $numbergrade=5;
  $totalcredits=$numbergrade*3;
  }
    elseif($gradeMarks[$i]>74 && $gradeMarks[$i]<=79 ){
    $numbergrade=4.5;
  $totalcredits=$numbergrade*3;}
    elseif($gradeMarks[$i]>69 && $gradeMarks[$i]<=74 ){
    $numbergrade=4;
  $totalcredits=$numbergrade*3;}
    elseif($gradeMarks[$i]>64 && $gradeMarks[$i]<=69 ){
    $numbergrade=3.5;
  $totalcredits=$numbergrade*3;}
    elseif($gradeMarks[$i]>59 && $gradeMarks[$i]<=64 ){
    $numbergrade=3;
  $totalcredits=$numbergrade*3;}
    elseif($gradeMarks[$i]>54 && $gradeMarks[$i]<=59 ){
       $numbergrade=2.5;
      $totalcredits=$numbergrade*3;}
    elseif($gradeMarks[$i]>49 && $gradeMarks[$i]<=54 ){
       $numbergrade=2;
       $totalcredits=$numbergrade*3;}
    else{
    $numbergrade=1;
  $totalcredits=$numbergrade*3;}


  }
  else {
    if($gradeMarks[$i]>79 && $gradeMarks[$i]<=100 ){
    $numbergrade=5;
    $totalcredits=$numbergrade*4;
    }
    elseif($gradeMarks[$i]>74 && $gradeMarks[$i]<=79 ){
    $numbergrade=4.5;
    //echo $numbergrade;
    $totalcredits=$numbergrade*4;}
    elseif($gradeMarks[$i]>69 && $gradeMarks[$i]<=74 ){
    $numbergrade=4;
    $totalcredits=$numbergrade*4;}
    elseif($gradeMarks[$i]>64 && $gradeMarks[$i]<=69 ){
    $numbergrade=3.5;
    $totalcredits=$numbergrade*4;}
    elseif($gradeMarks[$i]>59 && $gradeMarks[$i]<=64 ){
    $numbergrade=3;
    $totalcredits=$numbergrade*4;}
    elseif($gradeMarks[$i]>54 && $gradeMarks[$i]<=59 ){
    $numbergrade=2.5;
    $totalcredits=$numbergrade*4;}
    elseif($gradeMarks[$i]>49 && $gradeMarks[$i]<=54 ){
    $numbergrade=2;
    $totalcredits=$numbergrade*4;}
    else{
    $numbergrade=1;
    $totalcredits=$numbergrade*4;}
  }
  $sum+=$totalcredits;
  }
  $GPA=$sum/19;
  /***************************************end of the calculation of the GPA of semester one*************/



 // sql query for inserting data into database
 $sql_query = "INSERT INTO y2semester1
 VALUES('$student_no','$Reg_No',' $student_fname','$student_lname','$Data_Structures_and_Algorithms','$Artificial_Intelligence',' $Computer_Networks',' $Discrete_Mathematics','$Formal_Methods_Software_Engineering','$GPA')";
 // sql query for inserting data into database

 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('<?php echo $student_fname;"'s"?> your data has been successfully saved! That is All. Thank you!');
  window.location.href='semester-three.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('We are sorry! There was a problem while saving your data!');
  </script>
  <?php
 }
 // sql query execution function
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Semester-one YR2</title>
	<link rel="icon" type="image/png" href="images/logo.jpg" sizes="32x32">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
<div id="header">Semester oneYR2
<?php

	 //USERNAME
	 if(loggedIn())
	 {
	   $name = getUserField('StaffName');
	   echo '<p id="username">('.$name.' )<a href="logout.php"> Logout</a><p>';

	 }else{
		 header('location: index.php');
	 }

?>
</div>
<div class="container">

	<form method="post">
	<fieldset>
		<legend allign="center">Please fill this form</legend>
		<table>
			<tbody>
				<tr>
					<td>Student Name</td>
					<td><input type="text" name="student_fname" placeholder="First Name" required/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="" name="student_lname" placeholder="Second Name" required/></td>
				</tr>
				<tr>
					<td>Student No</td>
					<td><input type="text" name="student_no" placeholder="Student Number" required/></td>
				</tr>
				<tr>
					<td>Registration No</td>
					<td><input type="text" name="Reg_No" placeholder="Reg No" required/></td>
				</tr>
				<tr>
					<td>Data Structures and Algorithms</td>
					<td><input type="number" name="Data_Structures_and_Algorithms" placeholder="Data Structures and Algorithms" required/></td>
				</tr>
				<tr>
					<td>Artificial Intelligence</td>
					<td><input type="number" name="Artificial_Intelligence" placeholder="Artificial Intelligence" required/></td>
				</tr>
				<tr>
					<td>Computer Networks</td>
					<td><input type="number" name="Computer_Networks" placeholder="Computer_Networks" required/></td>
				</tr>
				<tr>
					<td>Discrete Mathematics</td>
					<td><input type="number" name="Discrete_Mathematics" placeholder="Discrete_Mathematics" required/></td>
				</tr>
				<tr>
					<td>Formal Methods/Software Engineering</td>
					<td><input type="number" name="Formal_Methods_Software_Engineering" placeholder="FM OR SE" required/></td>
				</tr>
				<tr>
					<td colspan="2"><center><button type="Save" name="btn-save">Submit</button><a href="#"><lable id="view" name="">View Data</label></a></center></td>
				</tr>
			</tbody>
		</table>
		</fieldset>
	</form>
</div>
 <div class="menu">
      <p align="center">Main Menu</p>
      	<ul>
      		<li class="active"><a href="register-student.php">Register Student</a></li>
	      	<li><a href="view-students-data.php">View Students Data</a></li>
      		<li><a href="view-reports.php">View Reports</a></li>
		    <li><a href="course-outline.php">Course Outline</a></li>
      	</ul>
      </div>
</body>
</html>
