
<?php
$conn = new mysqli('localhost', 'root', '', 'newone');

if ($conn->connect_error) {
    echo "Connection Failed: " . $conn->connect_error;
}

$id= $_GET['id'];
$sql="SELECT *FROM  details WHERE id='$id'";
$data= mysqli_query($conn,$sql);

$total= mysqli_num_rows($data);
$res= mysqli_fetch_assoc($data)
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightpink;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        

        button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="container">
        <form action="" method="post">
            <div class="form-group">
                <h1>Update Now</h1>
            </div>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" value="<?php echo $res['firstname'];?>" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text"  value="<?php echo $res['lastname'];?>"name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?php echo $res['lastname'];?>"name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number"  value="<?php echo $res['phone'];?>"name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address"  required>
                 <?php  echo $res['address'];?>
                </textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="update">Save changes</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['update'])) {
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
   
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    $sql="UPDATE details SET firstname='$firstname',lastname='$lastname',email='$email',
    phone='$phone',address='$address' WHERE id='$id'";

    $data=mysqli_query($conn,$sql);

    if($data){
        echo "<script>alert('Updated Successfully!')</script>";
        ?>
        <meta http-equiv="refresh" content="5; 
        url=http://localhost/learn/display.php"/>
        <?php
    }
    else
    {
        echo "Failed To Updete";

    }
}
?>