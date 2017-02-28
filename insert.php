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
<?php include 'submit_insert.php';?>
<?php if($final == 1) { ?>

<div class="container">
  <div class="jumbotron">
    
  <h1>INSERTED SUCCESSFULLY</h1> 

<a href="index.php" class="btn btn-info" role="button">BACK</a>
           
  </div>
</div>

<?php 
}else {?>


 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PROJECT SE</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="insert.php">INSERT DATA</a></li>
      <li><a href="select.php">SELECT DATA</a></li> 
    </ul>
  </div>
</nav>
<div class="container-fluid">
<h1>PROJECT SE</h1>
<p>57021252 THAYCHASAIN CHINNAPHONG COMPUTER SCIENCE</p>






<form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <h1></h1>   
            <label for="sel1">กรุณาเลือกจำนวนข้อมูล : </label>
            
            <select class="form-control" name="num_insert">
                 <option><?php echo $num_insert;?></option>
                 <?php for($b=1;$b<=5;$b++) {echo "<option>"; echo $b; echo "</option>" ;} ?> 
            </select>
  
            <button type="b_insert" class="btn btn-primary active">ADD</button>
     
           
            <!-- หากกดแล้ว -->
            <?php if(!empty($num_insert)) {?>
                <table class="table" >
                <thead>
                <tr>
                    <th>Studentid</th>
                    <th>Name Thai</th>
                    <th>Name English</th>
                    <th>Nickname</th>
                    <th>Birthday</th>
                    <th>School</th>
                    <th>Telephone</th>
                    <th>T-parent</th>
                    <th>Face</th>
                    <th>Line</th>
                    <th>County</th>
                    <th>Class</th>
                    <th>Sex</th>
                </tr>
                </thead>
                <tbody>
        <?php for($b=0;$b<$num_insert;$b++){?>
        <tr>
            
            <?php for($a=0;$a<10;$a++){
                ?>
                    <td>
                        <?php if($arr[$b][$a][1]==0){echo '<div class="form-group">';}
                              else if($arr[$b][$a][1]==1){echo '<div class="form-group has-error has-feedback">';}
                              else if($arr[$b][$a][1]==2){echo '<div class="form-group has-success has-feedback">';}
                        ?>
                            <input type="text" class="form-control" name="<?php echo  "input".$a."-".$b?>" value="<?php echo  $arr[$b][$a][0];?>">
                            
                        <?php if($arr[$b][$a][1]==0){echo '</div>';}
                              else if($arr[$b][$a][1]==1){echo '<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>';}
                              else if($arr[$b][$a][1]==2){echo '<span class="glyphicon glyphicon-ok form-control-feedback"></span>';}
                    ?>
                        </div>
                    </td>
                 
            <?php }?>

                <td>
                 <?php if($arr[$b][10][1]==0){echo '<div class="form-group">';}
                              else if($arr[$b][10][1]==1){echo '<div class="form-group has-error has-feedback">';}
                              else if($arr[$b][10][1]==2){echo '<div class="form-group has-success has-feedback">';}
                        ?>
                <select class="form-control" name="input10-<?php echo $b;?>">
                    <option><?php echo  $arr[$b][10][0];?></option>
                    <?php  
                    $sql = "SELECT county FROM county";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        echo "<option>"  .$row["county"].   "</option>"  ;
                    }

                    ?>
                    
                </select>
                <?php if($arr[$b][11][1]==0){echo '</div>';}
                              else if($arr[$b][10][1]==1){echo '<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>';}
                              else if($arr[$b][10][1]==2){echo '<span class="glyphicon glyphicon-ok form-control-feedback"></span>';}
                    ?>
                    </div>

                </td>




                    <td>
                    <?php if($arr[$b][11][1]==0){echo '<div class="form-group">';}
                              else if($arr[$b][11][1]==1){echo '<div class="form-group has-error has-feedback">';}
                              else if($arr[$b][11][1]==2){echo '<div class="form-group has-success has-feedback">';}
                        ?>
                        <select class="form-control" name="input11-<?php echo $b;?>">
                            <option><?php echo  $arr[$b][11][0];?></option>
                            <option>ชั้นปีที่ 1</option>
                            <option>ชั้นปีที่ 2</option>
                            <option>ชั้นปีที่ 3</option>
                            <option>ชั้นปีที่ 4</option>
                        </select>
                    <?php if($arr[$b][11][1]==0){echo '</div>';}
                              else if($arr[$b][11][1]==1){echo '<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>';}
                              else if($arr[$b][11][1]==2){echo '<span class="glyphicon glyphicon-ok form-control-feedback"></span>';}
                    ?>
                    </div>
                    </td>
                    <td>
                    <?php if($arr[$b][12][1]==0){echo '<div class="form-group">';}
                              else if($arr[$b][12][1]==1){echo '<div class="form-group has-error has-feedback">';}
                              else if($arr[$b][12][1]==2){echo '<div class="form-group has-success has-feedback">';}
                        ?>
                    <select class="form-control" name="input12-<?php echo $b;?>">
                        <option><?php echo  $arr[$b][12][0];?></option>
                        <option>หญิง</option>
                        <option>ชาย</option>
                    </select>
                    <?php if($arr[$b][12][1]==0){echo '</div>';}
                              else if($arr[$b][12][1]==1){echo '<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>';}
                              else if($arr[$b][12][1]==2){echo '<span class="glyphicon glyphicon-ok form-control-feedback"></span>';}
                    ?>
                    </td>
                    </tr>
        <?php  }?>
                </tbody>
                </table>
                <button type="submit" class="btn btn-primary active"  >INSERT</button>
           
                

<?php  } ?>
</form>

</div>
</div>
<?php }?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>
