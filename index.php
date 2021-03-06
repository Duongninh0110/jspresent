<?php 
include ('db.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>javascript presentation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

        <h2>Post and get Request Example of Ajax </h2>
        <div class="form-group">
            Name: <input type="text" name="name" id="name" class="form-control">
            <br>
            Age: <input type="text" name="age" id="age" class="form-control">
            <br>
            Gender:
            <select id="sex">
                <option value="">Select</option>
                <option value="man">Man</option>
                <option value="female">Female</option>
            </select>
            <br><br>
             Salary per day: <input type="text" name="salaryPD" id="salaryPD" class="form-control">
             <br>

             <input type="button" name="myBut" onclick="postData()" value="Submit" class="btn btn-success btn-block">
        </div>
        
       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>sex</th>
                    <th>age</th>
                    <th>salary per day($)</th>
                </tr>
            </thead>
            <tbody id="table">
                
            </tbody>
        </table>
        
    </div>
    <script type="text/javascript">
        function getAll()
        {
            var ajaxRequest = new XMLHttpRequest();
            var url = "fetch.php";
            ajaxRequest.onreadystatechange = ()=>{
                if(ajaxRequest.readyState === XMLHttpRequest.DONE){
                    var table = document.querySelector('#table');
                    console.log(ajaxRequest.responseText);
                    table.innerHTML = ajaxRequest.responseText;
                    console.log(ajaxRequest);
                }
            }

            ajaxRequest.open("GET", url);
            ajaxRequest.send();

        }

        function postData(){
            var ajaxRequest = new XMLHttpRequest();
            var url = "post.php";
            var name = document.querySelector('#name').value;
            
            var age = document.querySelector('#age').value;
            
            var sex = document.querySelector('#sex').value;
            
            var salaryPD = document.querySelector('#salaryPD').value;
            var data = "name="+name+"&age="+age+"&sex="+sex+"&salaryPD="+salaryPD;

            console.log(data);
            ajaxRequest.responseType = 'json';
            ajaxRequest.onreadystatechange = ()=>{
                if(ajaxRequest.readyState === XMLHttpRequest.DONE){
                    getAll();
                    document.querySelector('#name').value = '';
                    document.querySelector('#age').value = '';
                    document.querySelector('#sex').value = '';
                    document.querySelector('#salaryPD').value = '';
                }
            }

            ajaxRequest.open("POST", url);
            ajaxRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            ajaxRequest.send(data);
        }

        window.onload = getAll();
        $(document).ready(
            
            


        );
        

    </script>]


</body>
</html>

<?php 



 ?>