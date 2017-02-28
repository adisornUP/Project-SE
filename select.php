<!DOCTYPE html>
<html lang="en">
<head>
    <title>SOFTWERE ENGINEERING</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PROJECT SE</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="insert.php">INSERT DATA</a></li>
      <li class="active"><a href="select.php">SELECT DATA</a></li> 
    </ul>
  </div>
</nav>    
    <?php include 'submit_select.php';
    header('Content-Type: text/html; charset=utf-8');?>

    <div class="container-fluid">
        <h1>PROJECT SE</h1>
        <p>57021252 THAYCHASAIN CHINNAPHONG COMPUTER SCIENCE</p>
        <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            
                <label for="idsa">รหัสนิสิต:</label>
                <input type="text" class="form-control" name="id"  value="<?php echo $ch[0];?>">
          
                <label for="sel1">จังหวัด:</label>
                <select class="form-control" name="county">
                    <option><?php echo  $ch[1];?></option>
                    <?php  
                    $sql = "SELECT county FROM county";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        echo "<option>"  .$row["county"].   "</option>"  ;
                    }

                    ?>
                    
                </select>
                <label for="sel1">ปีการศึกษา:</label>
                <select class="form-control" name="class">
                    <option><?php echo  $ch[2];?></option>
                    <option>ชั้นปีที่ 1</option>
                    <option>ชั้นปีที่ 2</option>
                    <option>ชั้นปีที่ 3</option>
                    <option>ชั้นปีที่ 4</option>
                </select>

                <label for="sel1">เพศ:</label>
                <select class="form-control" name="sex">
                    <option><?php echo  $ch[3];?></option>
                    <option>หญิง</option>
                    <option>ชาย</option>
                </select>

            <button  type="submit" class="btn btn-default">Submit</button>
  
        </form>
    <?php
    if(!empty($qly)){
        $result = $conn->query($qly);
        if ($result->num_rows > 0) { ?>

    <table class="table">
    <thead>
      <tr>
        <th>Studentid</th>
        <th>Name Thai</th>
        <th>Name English</th>
        <th>Nickname</th>
        <th>Birthday</th>
        <th>Class</th>
        <th>Sex</th>
        <th>School</th>
        <th>Telephone</th>
        <th>County</th>
        <th>Face</th>
        <th>Line</th>
      </tr>
    </thead>
    <tbody>
    <?php
 
        while($row = $result->fetch_assoc()) {
            if($row["sex"]==0)
                $se = "ชาย";
            else
                $se = "หญิง";
        
                echo "<tr><td>".$row["Studentid"]."</td>
                     <td>".$row["NameTH"]."</td>
                     <td>".$row["NameENG"]."</td>
                     <td>".$row["Nname"]."</td>
                     <td>".$row["Birthday"]."</td>
                     <td>ปี".$row["Class"]."</td>
                     <td>".$se."</td>
                     <td>".$row["School"]."</td>
                     <td>".$row["Tself"]."</td>
                     <td>".$row["county"]."</td>
                     <td>".$row["Face"]."</td>
                     <td>".$row["Line"]."</td></tr>";
            }
        }else{ ?>
                <p></p>
                <div class="alert alert-danger">
                <strong>Warning!</strong> ไม่พบข้อมูลที่คุณค้นหา
                </div>
        <?php
        } 
    
        
    } ?>
    <?php
        if($error == 1){?>
        <p></p>
        <div class="alert alert-warning">
        <strong>Warning!</strong> กรุณาใส่คำค้นหา
        </div>
    <?php }?>
    </tbody>
  </table>

    </div>
</body>
</html>