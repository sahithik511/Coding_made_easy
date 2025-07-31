<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['msg'];

      // Establishing connection
      $conn = new mysqli('localhost', 'root', '', 'demo');
      if ($conn->connect_error) {
          die('Connection failed: ' . $conn->connect_error);
      } else {
          // Prepare statement
          // $stmt = $conn->prepare("INSERT INTO logindb (email, pass) VALUES (?, ?)");
          $stmt = $conn->prepare("INSERT INTO `contact`(`id`,`name`, `email`,`number`, `message`) VALUES (NULL, ?, ?, ?,?)");
          
          // Bind parameters
          $stmt->bind_param("ssss", $name, $email, $number, $message); // Assuming both email and password are strings
          // Execute statement
          $stmt->execute();
          echo "message completed successfully";
          readfile('login.html');
          // Close statement
          $stmt->close();
          // Close connection
          $conn->close();
      }
   
    }

?>