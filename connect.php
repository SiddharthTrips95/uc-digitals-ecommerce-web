<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    // database connection
    $conn = mysqli_connect("localhost", "root", "", "users");
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    }
    else{
        // $stmt = $conn->prepare("INSERT INTO users WHERE email = ? AND password = ?");
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        echo "New record created successfully";
        $stmt->close();
        $conn->close();
    }
?>