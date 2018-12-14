<?php 
include('db.php');
// echo "<pre>"; print_r($_POST); die;
$name = $_POST["name"];
echo $name;
$age = $_POST['age'];
echo $age;
$sex = $_POST['sex'];
echo $sex;
$wpm = $_POST['wpm'];
echo $wpm;  

$query = "INSERT INTO ajax_example (name, age, sex, wpm) VALUES ('$name', $age, '$sex', $wpm)";
$run_table = mysqli_query($con, $query);


 ?>