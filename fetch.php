<?php 
include('db.php');


$query = "SELECT * FROM ajax_example";
$run_table = mysqli_query($con, $query);
$display_string = '';
while($rows_table = mysqli_fetch_array($run_table)){
 $table_id = $rows_table['id'];
 $table_name = $rows_table['name'];
 $table_age = $rows_table['age'];
 $table_sex = $rows_table['sex'];
 $table_salaryPD = $rows_table['salaryPD'];

 $display_string .= "<tr>";
 $display_string .= "<td>$table_id </td>";
 $display_string .= "<td>$table_name</td>";
 $display_string .= "<td>$table_sex</td>";
 $display_string .= "<td>$table_age</td>";
 $display_string .= "<td>$table_salaryPD</td>";
 $display_string .= "</tr>";


}
echo $display_string;

 ?>