<?php
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Message = $_POST['Message'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'my_portfolio');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO contact_me(Name, Email, Subject, Message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Name, $Email, $Subject, $Message); // "ssss" represents the data types of the variables
        $execval = $stmt->execute();
        
        header("Location: index.html");
        exit;}
        
        $stmt->close();
        $conn->close();
    
?>
