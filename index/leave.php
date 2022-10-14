<?php
include ('conn.php');

$sel = $_POST['sel'];

$sel1 = $_POST['sel1'];

$datee = $_POST['datee'];

$radio1 = $_POST['radio-1'];

$datee1 = $_POST['datee1'];

$radio2 = $_POST['radio-2'];

$td1 = $_POST['td1'];

$query = "INSERT INTO `employeeleavedetails`(`Empid`, `Leavetype`, `FromDate`, `FromHalfDaySts`, `ToDate`, `ToHalfDaySts`, `TotalLeaveDays`) VALUES ('$sel;','$sel1','$datee','$radio1','$datee1','$radio2','$td1')";

$data = mysqli_query($conn,$query);

if($data == true){
    echo "Leave request added successfully";
}
    else{
        echo "There is some problem";
    }

?>