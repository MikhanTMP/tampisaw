<?php
try {
    
    // Retrieve the resortID from the session
    $resortID = $_SESSION['resortID'];
    
    // Fetch image file paths from the database for the specified resortID
    $sql = "SELECT filepath FROM images WHERE resort_ID = '$resortID'";
    $result = $conn->query($sql);

    // Create an array to store the image file paths
    $imagePaths = array();
    while ($row = $result->fetch_assoc()) {
        $imagePaths[] = $row['filepath'];
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
$conn->close();
?>