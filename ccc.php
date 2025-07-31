<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $c_name = $_POST['c_name'];
    $c_course = $_POST['c_course'];
    

      // Establishing connection
      $conn = new mysqli('localhost', 'root', '', 'demo');
      if ($conn->connect_error) {
          die('Connection failed: ' . $conn->connect_error);
      } else {
          // Prepare statement
          // $stmt = $conn->prepare("INSERT INTO logindb (email, pass) VALUES (?, ?)");
          $stmt = $conn->prepare("INSERT INTO `ccc`(`id`,`c_name`, `c_course`) VALUES (NULL, ?, ?)");
          
          // Bind parameters
          $stmt->bind_param("ss", $c_name, $c_course); // Assuming both email and password are strings
          // Execute statement
          $stmt->execute();
          echo "message completed successfully";
          readfile('home.html');
          // Close statement
          $stmt->close();
          // Close connection
          $conn->close();
      }
   
    }

?>