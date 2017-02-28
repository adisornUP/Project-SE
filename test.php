<?php 
include 'connection.php';

 $sql = "INSERT INTO student(Class)  VALUES  ('0')";
 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>