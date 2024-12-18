<?php
$servername = "localhost"; 
$username = "root";        
$password = "";             
$dbname = "registration"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $pass);  // 'ss' oznacza dwa parametry typu string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        echo "Login successful!";
        
    } else {
        
        echo "Invalid username or password.";
    }

    
    $stmt->close();
    $conn->close();
}
?>
