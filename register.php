<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['c_pass'];

      // Establishing connection
      $conn = new mysqli('localhost', 'root', '', 'demo');
      if ($conn->connect_error) {
          die('Connection failed: ' . $conn->connect_error);
      } else {
          // Prepare statement
          // $stmt = $conn->prepare("INSERT INTO logindb (email, pass) VALUES (?, ?)");
          $stmt = $conn->prepare("INSERT INTO `login` (`id`,`name`, `email`, `pass`) VALUES (NULL, ?, ?, ?)");
          
          // Bind parameters
          $stmt->bind_param("sss", $name, $email, $pass); // Assuming both email and password are strings
          // Execute statement
          $stmt->execute();
          echo "Registration completed successfully";
          readfile('login.html');
          // Close statement
          $stmt->close();
          // Close connection
          $conn->close();
      }
   
    }

?>