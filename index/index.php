<?php 
include ('drop_down.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- script for validation -->
 <script>
    function getResult() {
      var str1 = document.getElementById("datee").value;
      var str2 = document.getElementById("datee1").value;
      var diff = Math.floor((Date.parse(str2) - Date.parse(str1)) / 86400000);
      var firstMark = document.getElementsByName('radio-1');
      var secondMark = document.getElementsByName('radio-2');
      var total = 0;
       firstMark.forEach((evnt) => {
         if (evnt.checked) {
            total = total + parseFloat(evnt.value);
            return;
         }
      });
      secondMark.forEach((evnt) => {
         if (evnt.checked) {
            total = total + parseFloat(evnt.value);
            return;
         }
      });
      document.getElementById("td1").value = total + diff - 1;
      
   }
 </script>
 <script>
    function daterang(){
        var x = document.getElementById("datee").value;
        var y = document.getElementById("datee1").value;
       
        if(y<x){
            alert("please select correct date");    
            document.getElementById("datee1").value = "";
        }
        if(y == x){
         alert("please select correct date");
         document.getElementById("datee1").value = "";
        }
     
        
    }
 </script>
 <style>
   body{
      background-color: papayawhip;
   }
   input{
      background: transparent;
   }
   select{
      background: transparent;
   }
 </style>
    <title>Document</title>
   
</head>
<body>
    <center>
<br>

    <form action="leave.php" method="POST" name="form">
   <h4>Employee *:  <select class="classic" name="sel" required></h4>
   <option>Select Employee</option>
   <?php for($i=1;$i<=mysqli_num_rows($result1);$i++){
    $arr = mysqli_fetch_assoc($result1);
    
    
    echo "<option value = $arr[Id]>$arr[FirstName] $arr[LastName]</options>";
   }?>
</select>
<h4>Leave Type *:  <select class="classic" name="sel1" required></h4>
<option>Select Leave Type</option>
  <option value="1">Sick Leave</option>
  <option value="2">Casual Leave</option>
  <option value="3">Leave in Probation </option>
</select>
    <h4>Leave From : <input type="date" name="datee" id="datee" required><br>
    <fieldset>
  
    <label for="radio-1">Full Day</label>
    <input type="radio" name="radio-1" id="radio-1" value="1">
    <label for="radio-2">Half Day</label>
    <input type="radio" name="radio-1" id="radio-2" value="0.5">
  
  </fieldset>
</h4>
<h4>Leave To : <input type="date" name="datee1" id="datee1" onchange="daterang()" required><br>
<fieldset>
  
  <label for="radio-1">Full Day</label>
  <input type="radio" name="radio-2" id="radio-3" value="1" required>
  <label for="radio-2">Half Day</label>
  <input type="radio" name="radio-2" id="radio-4" value="0.5" onclick="checkd()" required>

</fieldset>
</h4>
<h4>Total Days: <input type="text" readonly placeholder="click to get total leave days" name="td1" id="td1" onclick="getResult()" required ></h4>

<input type="submit" value="Add Leave">
</form>
</center>
<!-- <script>
   function checkd(){
   
   var r2 = DocumentFragment.getElementById("radio-2").value;
   var r3 = DocumentFragment.getElementById("radio-3").value;

   var d1 = DocumentFragment.getElementById("datee").value;
   var d2 = DocumentFragment.getElementById("datee1").value;
   if((d1 == d2)){
      alert("lol");
   }
}

</script> -->
</body>
</html>