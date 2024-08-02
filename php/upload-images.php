<?php 
session_start();
    try {
        include 'connect.php';
        if (isset($_POST['submit'])) {
            $resortID = $_SESSION['resortID'];
            $uploadFolder = "../images/resorts/";
    
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $imageFileName = uniqid() . "_" . $_FILES['images']['name'][$key];
                $targetFilePath = $uploadFolder . $imageFileName;
                move_uploaded_file($tmp_name, $targetFilePath);
    
                $sql = "INSERT INTO images(resort_ID, filepath) VALUES ('$resortID','$imageFileName')";
                $conn->query($sql);
            }
            header("Location: /tampisaw/php/Owner-Dashboard.php");
            exit();
            
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn->close();                        
?>