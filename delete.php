<?php
$conn = new mysqli('localhost', 'root', '', 'newone');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id= $_GET['id'];

$sql="DELETE FROM details WHERE id='$id' ";
$data=mysqli_query($conn,$sql);

if($data){
    echo "<script>alert('Deleted Successfully!')</script>";
    ?>
    <meta http-equiv="refresh" content="5; 
    url=http://localhost/learn/display.php"/>
    <?php
}else{
    echo "<script>alert('Failed To Delete')</script>";
}
?>