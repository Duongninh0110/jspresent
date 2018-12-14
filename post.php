<?php 
include('db.php');
// echo "<pre>"; print_r($_POST); die;
$name = $_POST["name"];
echo $name;
$age = $_POST['age'];
echo $age;
$sex = $_POST['sex'];
echo $sex;
$salaryPD = $_POST['salaryPD'];
echo $wpm;  

$query = "INSERT INTO ajax_example (name, age, sex, salaryPD) VALUES ('$name', $age, '$sex', $salaryPD)";
$run_table = mysqli_query($con, $query);


 ?>