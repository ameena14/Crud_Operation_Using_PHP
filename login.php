<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightpink;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
    </style>
</head>
<body>
   <div class="login-container">
        <form method="post" action="display.php">
            <div class="form-group">
                <h2>Login Here!!!</h2>
            </div>
            <div class="form-group">
                <label for="email">Enter The Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
   </div>
</body>
</html>
<?php
$conn = new mysqli('localhost', 'root', '', 'newone');

if ($conn->connect_error) {
    echo "Connection Failed: " . $conn->connect_error;
} 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM details WHERE email='$email' AND password='$password'";
    $data = mysqli_query($conn,$sql);


    if ($data) {
        $num = mysqli_num_rows($data);

        if ($num > 0) {
            echo "<script>alert('Login Successful');</script>";

        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
        
    } else {
        die("<script>alert('Connection Failed: " . $conn->connect_error . "');</script>");

    }

   
}
?>
