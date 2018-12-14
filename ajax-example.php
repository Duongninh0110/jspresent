<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Javascript Presentation</title>
</head>
<body>
    <form name='myForm'>
         Max Age: <input type='text' id='age' name="age" /> <br />
         Max WPM: <input type='text' id='wpm' name="wpm" />
         <br />
         
         Sex: <select id='sex'>
            <option value="m">m</option>
            <option value="f">f</option>
         </select>
            
         <input type='button' onclick='ajaxFunction()' value='Query MySQL'/>
            
      </form>
      
      <div id='ajaxDiv'>Kết quả của bạn sẽ hiển thị ở đây!!!</div>

    <script language="javascript" type="text/javascript">
             <!--
                //trình duyệt hỗ trợ code
                function ajaxFunction(){
                   var ajaxRequest;  // khai báo một biến để làm việc với Ajax
                   try{
                      // các trình duyệt Opera 8.0+, Firefox, Safari
                      ajaxRequest = new XMLHttpRequest();
                   }
                   
                   catch (e){
                      // trình duyệt IE
                      try{
                         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                      }
                      
                      catch (e) {
                         try{
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                         }
                      
                         catch (e){
                            // xử lý ngoại lệ
                            alert("Không hỗ trợ!");
                            return false;
                         }
                      }
                   }
                   
                   // Tạo một hàm mà sẽ nhận dữ liệu được gửi 
                   // từ server và sẽ cập nhật khu vực div
                   // trong cùng page nỳ.
                        
                   ajaxRequest.onreadystatechange = function(){
                      if(ajaxRequest.readyState == 4){
                         var ajaxDisplay = document.getElementById('ajaxDiv');
                         ajaxDisplay.innerHTML = ajaxRequest.responseText;
                      }
                   }
                   
                   // Bây giờ lấy các giá trị từ người dùng và 
                   // truyền nó tới server script.
                        
                   var age = document.getElementById('age').value;
                   var wpm = document.getElementById('wpm').value;
                   var sex = document.getElementById('sex').value;
                   var queryString = "?age=" + age ;
                
                   queryString +=  "&wpm=" + wpm + "&sex=" + sex;
                   ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
                   ajaxRequest.send(null); 
                }
             //-->
          </script>

</body>
</html>

<?php
   
   $con=mysqli_connect('localhost', 'root', 'mau0954010058', 'jspresent');
   
   
   // lấy dữ liệu
   $age = $_GET['age'];
   $sex = $_GET['sex'];
   $wpm = $_GET['wpm'];
   
   //truy vấn
   $query = "SELECT * FROM ajax_example WHERE sex = '$sex'";
   
   if(is_numeric($age))
   $query .= " AND age <= $age";
   
   if(is_numeric($wpm))
    $query .= " AND wpm <= $wpm";
   
   //thực thi truy vấn
   $qry_result = mysqli_query($con, $query);
   
   //định dạng chuỗi kết quả
   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>Name</th>";
   $display_string .= "<th>Age</th>";
   $display_string .= "<th>Sex</th>";
   $display_string .= "<th>WPM</th>";
   $display_string .= "</tr>";
   
   // chèn một hàng mới vào trong bảng
   while($row = mysqli_fetch_array($qry_result)){
      $display_string .= "<tr>";
      $display_string .= "<td>$row[name]</td>";
      $display_string .= "<td>$row[age]</td>";
      $display_string .= "<td>$row[sex]</td>";
      $display_string .= "<td>$row[wpm]</td>";
      $display_string .= "</tr>";
   }
   echo "Truy vấn: " . $query . "<br />";
   
   $display_string .= "</table>";
   echo $display_string;
?>