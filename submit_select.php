<?php
require 'connection.php';
header('Content-Type: text/html; charset=utf-8');
$id ="";
$county = "";
$class = "";
$sex = "";
$qly ="";
$check = array(false,false,false,false);
$ch = array("","","","");
$error = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //select data
    if (!empty($_POST["id"])){
        $id = test_input($_POST["id"]);
        $ch[0] = $id; 
        $check[0] = true;
    }
    if (!empty($_POST["county"])){
         $county = test_input($_POST["county"]);
         $ch[1] = $county;
         $check[1] = true;
    }
    if (!empty($_POST["class"])){
          
         if(test_input($_POST["class"])=="ชั้นปีที่ 1"){
             $class = 1;
         }else if(test_input($_POST["class"])=="ชั้นปีที่ 2"){
             $class = 2;
         }else if(test_input($_POST["class"])=="ชั้นปีที่ 3"){
             $class = 3;
         }else if(test_input($_POST["class"])=="ชั้นปีที่ 4"){
             $class = 4;
         }
         $ch[2] = test_input($_POST["class"]);
         $check[2] = true;
    }
    if (!empty($_POST["sex"])){
         $sex = test_input($_POST["sex"]);
         if($sex == "ชาย"){
             $sex = 0;
         }else
            $sex = 1;
         $ch[3] = test_input($_POST["sex"]);
         $check[3] = true;
    }
    //ตรวจถ้ากดไม่แล้วไม่กรอก
    if(!($check[0] == true|| $check[1] == true || $check[2] == true || $check[3] == true))
        $error = 1;
   
        
    
   
}
//สร้างคำสั่ง SQL ตามข้อมูลที่มี
if($check[0] == true|| $check[1] == true || $check[2] == true || $check[3] == true){
    $qly = "SELECT * FROM student WHERE 1 ";
   
    if($check[0] == true){
            $qly .= "and Studentid = '$id'";
    }
    if($check[1] == true){
            $qly .= "and County = '$county'";
    }
    if($check[2] == true){
            $qly .= "and Class = '$class'";
    }
    if($check[3] == true){
            $qly .= "and sex = '$sex'";
    }

}


//แปลงคำที่กรอกเป็น strings
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>