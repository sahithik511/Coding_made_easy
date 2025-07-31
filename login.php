<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Establishing connection
    $conn = new mysqli('localhost', 'root', '', 'demo');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Prepare statement
        // $stmt = $conn->prepare("INSERT INTO logindb (email, pass) VALUES (?, ?)");
        $stmt = $conn->prepare("SELECT * FROM `login` where email=? and pass=?");
        
        // Bind parameters
        $stmt->bind_param("ss", $email, $pass); // Assuming both email and password are strings
        // Execute statement
        $stmt->execute();
        
        // Store the result set
        $rows = $stmt->get_result();

        echo "". $rows->num_rows ."";

        if($rows->num_rows > 0) {
            readfile('home.html');
        } else {
          echo "<script>alert('Invalid details!');</script>";
          readfile('login.html');
        }
        
        //readfile('home.html');
        // Close statement
        $stmt->close();
        // Close connection
        $conn->close();
    }
}
?>