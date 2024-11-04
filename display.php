<html>
<head>
    <title>Display</title>
    <style>
            body{
                background-color: plum;
            }
            table{
                background-color: white;
            }
            .update,.delete{
            background-color: #4CAF50;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 22px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;

        }
        .delete{
            background-color: red;

        }
    </style>
</head>
</html>




<?php
$conn = new mysqli('localhost', 'root', '', 'newone');

if ($conn->connect_error) {
    echo "Connection Failed: " . $conn->connect_error;
}
$sql="SELECT *FROM  details";
$data= mysqli_query($conn,$sql);

$total= mysqli_num_rows($data);
$res= mysqli_fetch_assoc($data);


if($total !=0){
    ?>
    <h2 align="center"><mark>Welcome To All Records</mark></h2>
    <center><table border="3" cellspacing="7" width="87%">
        <tr>
        <th width="7%">ID</th>
        <th width="10%">First Name</th>
        <th width="10%">Last Name</th>
        <th width="10%">Email</th>
        <th width="10%">Phone</th>
        <th width="20%">Address</th>
        <th width="20%">Operations</th>
        </tr>
    
    <?php
    while($res= mysqli_fetch_assoc($data))
    {
         echo "<tr>
                <td>".$res['id']."</td>
                <td>".$res['firstname']."</td>
                <td>".$res['lastname']."</td>
                <td>".$res['email']."</td>
                <td>".$res['phone']."</td>
                <td>".$res['address']."</td>

                <td><a href='update.php?id=$res[id]'><input type='submit'
                value='Update' class='update'></a>

               <a href='delete.php?id=$res[id]'><input type='submit'
                value='Delete' class='delete' onclick = 'return checkdelete()'></a></td>
                </tr>
                ";
    
    }
    
}else{
    echo "No records found";
}
$conn->close();
?>
 </table>
 </center>
 <script>

    function checkdelete(){
        return confirm('Are you Sure To Delete This Data?');
    }
 </script>
