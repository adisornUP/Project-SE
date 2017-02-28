<?php
require 'connection.php';
header('Content-Type: text/html; charset=utf-8');

//define arr to void
$arr = array(  );
for($i=0;$i<5;$i++){
    for($z=0;$z<13;$z++){
        $arr[$i][$z][0] ="";  //เก็บ ค่า ที่ inputค้าง
        $arr[$i][$z][1] ="0"; //เก็บ error input
    }
}
//SQL

$final = 0;
$se= "";
//fill 
$top = "form-group has-feedback";
$button = "";
//insert
$num_insert = "";
//insert data
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!empty($_POST["num_insert"]))
        $num_insert = test_input($_POST["num_insert"]);

    
    for($c=0 ; $c<$num_insert ; $c++){
        if (!empty($_POST["input0-$c"])){
            
            $arr[$c][0][0] = test_input($_POST["input0-$c"]);  
            $num = $arr[$c][0][0]; 
            //check รหัสนิสิต ที่มีอยู๋
            
            //check ข้อมูลห้ามว่าง
            for($run=1;$run<=12;$run++){
                if (!empty($_POST["input$run-$c"])){
                    $arr[$c][$run][0] = test_input($_POST["input$run-$c"]);
                    $arr[$c][$run][1] = 2;
                }else{          
                    $arr[$c][$run][1] = 1;
                }
            }



            //check รหัสนิสิต ที่มีอยู๋
            $result = $conn->query("SELECT Studentid FROM student WHERE Studentid = '$num' ");
            if ($result->num_rows == 0){
                if(strlen($arr[$c][0][0])==8){
                    $arr[$c][0][1] = 2;
                }else
                    $arr[$c][0][1] = 1;
            }else{
                $arr[$c][0][1] = 1;
            }
            $num= false;
            for($checksql=0;$checksql <=12;$checksql++){
                if($arr[$c][$checksql][1]==2){
                       $num = true;
                     //  echo $arr[$c][$checksql][1];
                }else{
                    $num = false;
                    break;
                }
            }
            if($num == true){
                 if($arr[$c][11][0]=="ชั้นปีที่ 1"){
                     $class = 1;
                }else if($arr[$c][11][0]=="ชั้นปีที่ 2"){
                    $class = 2;
                }else if($arr[$c][11][0]=="ชั้นปีที่ 3"){
                    $class = 3;
                }else if($arr[$c][11][0]=="ชั้นปีที่ 4"){
                    $class = 4;
                }

                if($arr[$c][12][0] == "ชาย"){
                    $sex = 0;
                }else
                    $sex = 1;


                 $sql = "INSERT INTO student (Studentid ,NameTH ,NameENG ,Nname ,Birthday ,school ,Tself ,Tparent ,Face ,Line ,county ,Class ,sex)
                 VALUES (";
                 $i = 0;
                 while($i<=10){
                    $sql .= "'".$arr[$c][$i][0]."'" . ",";
                    $i++;
                 }
                 $sql .= "'".$class."'".",";
                 $sql .= "'".$sex."'";
                 $sql .= ")";
                 
                 
                 if ($conn->multi_query($sql) === TRUE) {
                    $num_insert = 0;
                    $final = 1;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
            
        }
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>