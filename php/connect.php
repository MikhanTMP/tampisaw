<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "resortdb";

try {
    // Create connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    echo '
    ';
} catch (Exception $e) {
    echo '
        <div class="side">
            <div class="side-a">
                <p>Connection Failed</p>
            </div>
        </div>
    ';
}
?>
